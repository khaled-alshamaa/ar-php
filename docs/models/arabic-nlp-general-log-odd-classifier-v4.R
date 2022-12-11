# https://atrebas.github.io/post/2019-03-03-datatable-dplyr/?s=08
library(data.table)
library(jsonlite)
library(compiler)

# load corpus data ----
# Source: https://www.kaggle.com/datasets/abedkhooli/arabic-100k-reviews

dir  <- './'
file <- 'ar_reviews_100k.tsv.gz'

data <- fread(paste0(dir, file), header = TRUE, sep = '\t', encoding = 'UTF-8')

# make sure your dataframe has two columns (text and label)
# colnames(data) <- c('text', 'label')

labels <- unique(data$label)

negation_words <- c('لا', 'ليس', 'غير', 'ما', 'لم', 'لن')
#                    'لست', 'ليست', 'ليسا', 'ليستا', 'لستما',
#                    'لسنا', 'لستم', 'ليسوا', 'لسن', 'لستن')

# source function has an issue with UTF-8
eval(parse('ar_norm-v4.R', encoding='UTF-8'))
eval(parse('score_sentiment-v4.R', encoding='UTF-8'))

#==========================================================
# counting words/stems in each category

arabic <- 'ءابتثجحخدذرزسشصضطظعغفقكلمنهوي'
arabic_chars <- strsplit(arabic, '')[[1]]

stem_matrix  <- expand.grid(first=arabic_chars, second=arabic_chars)

for(label in labels) stem_matrix[,label] <- 0

stem_matrix$stem <- paste0(stem_matrix$second, stem_matrix$first)

records <- dim(data)[1]

pb <- txtProgressBar(min = 0, max = records, initial = 0, style = 3) 
pb_step <- round(records/100)

# library(profvis)
# profvis({
# })
# system.time({
# })  

positive_col <- which(labels == 'Positive') + 2
negative_col <- which(labels == 'Negative') + 2

for(i in 1:records){
  record <- cmp_ar_norm(data[i,'text'])
  if(record == '') next
  
  words <- strsplit(record, ' ')[[1]]
  class <- as.character(data[i, 'label'])

  class_col <- which(labels == class) + 2
  is_negation <- words %in% negation_words
  
  for(j in 1:length(words)){
    pairs <- cmp_get_pairs(words[j])
    
    realClass <- class_col

    if (isTRUE(is_negation[j-1])) {
      if (class_col == positive_col) realClass <- negative_col
      if (class_col == negative_col) realClass <- positive_col
    }

    rows <- which(stem_matrix$stem %in% pairs)
    stem_matrix[rows, realClass] <- stem_matrix[rows, realClass] + 1
  }

  if(i %% pb_step == 0 | i == records) setTxtProgressBar(pb, i)
}

close(pb)

# checkpoint
saveRDS(stem_matrix, file = paste0(dir, 'stem_analysis_v4.rda'))

#==========================================================
# calculate log-odds

stem_matrix <- readRDS(file = paste0(dir, 'stem_analysis_v4.rda'))

class_col   <- 1:length(labels) + 2

total_stems <- length(stem_matrix$stem)
total_obs   <- sum(stem_matrix[, class_col])

norm <- as.list(apply(stem_matrix[, class_col], 2, sum)/total_obs)

# calculate the log odd for each category/label
for(label in labels) {
  stem_matrix[,paste0('log_odd_', label)] <- apply(stem_matrix[,class_col], 1, function(x) {log(x[label]/sum(x)) - log(norm[[label]])})
}

# handle -Inf log odd values (i.e. freq = 0)
stem_matrix[stem_matrix$log_odd_Positive == -Inf, 'log_odd_Positive'] <- -1 * stem_matrix[stem_matrix$log_odd_Positive == -Inf, 'log_odd_Negative']
stem_matrix[stem_matrix$log_odd_Negative == -Inf, 'log_odd_Negative'] <- -1 * stem_matrix[stem_matrix$log_odd_Negative == -Inf, 'log_odd_Positive']
stem_matrix[stem_matrix$log_odd_Mixed    == -Inf, 'log_odd_Mixed']    <- 0

stem_matrix$log_odd <- stem_matrix$log_odd_Positive - stem_matrix$log_odd_Negative

# calculate how a given stem is odd comparing to the unified expectation
stem_matrix$log_odd_stem <- apply(stem_matrix[, class_col], 1, function(x) {log(sum(x)/total_obs) - log(1/total_stems)})

# how to convert odds to probability
# https://sebastiansauer.github.io/convert_logit2prob/
# https://yury-zablotski.netlify.app/post/from-odds-to-probability/

saveRDS(stem_matrix, file = paste0(dir, 'stem_log_odd_v4.rda'))

#==========================================================
# report overall stats

dir    <- './'
file   <- 'ar_reviews_100k.tsv.gz'
labels <- c('Positive', 'Mixed', 'Negative')

stem_matrix <- readRDS(file = paste0(dir, 'stem_log_odd_v4.rda'))
stem_matrix <- stem_matrix[order(stem_matrix$log_odd_stem),]

data <- fread(paste0(dir, file), header = TRUE, sep = '\t', encoding = 'UTF-8')

# source function has an issue with UTF-8
eval(parse('ar_norm-v4.R', encoding='UTF-8'))
eval(parse('score_sentiment-v4.R', encoding='UTF-8'))

records <- dim(data)[1]

library(foreach)
library(doSNOW)

cl <- makeCluster(parallel::detectCores()[1]-1)
registerDoSNOW(cl)

pb <- txtProgressBar(min = 0, max = records, style = 3) 
op <- list(progress = function(n) setTxtProgressBar(pb, n))

results <- foreach(i=1:records, .combine=rbind, .options.snow = op) %dopar% {
  record <- cmp_ar_norm(data[i,'text'])
  result <- data[i,]
  
  if (record == '') {
    predict <- 0
    p.value <- 0
  } else {
    class <- result$label
    score <- cmp_score_sentiment(record)
    
    log_odd <- sum(score[,'Score'], na.rm = TRUE)
    
    predict <- if(log_odd > 0) 'Positive' else 'Negative'
    p.value <- exp(log_odd) / (1 + exp(log_odd))
  }
  
  result$predict <- predict
  result$p.value <- p.value
  
  return(result)
}

close(pb)
stopCluster(cl)

length(subset(results, results$label == results$predict & results$label != 'Mixed')$label)*100/length(subset(results, results$label != 'Mixed')$label)

saveRDS(results, file = paste0(dir, 'final_predictions_v4.rda'))

#==========================================================
# Check using different dataset (HARD)
# Ref: https://github.com/elnagara/HARD-Arabic-Dataset

dir    <- './'
file   <- 'HARD-balanced-reviews.csv.gz'
labels <- c('Positive', 'Mixed', 'Negative')

stem_matrix <- readRDS(file = paste0(dir, 'stem_log_odd_v4.rda'))
stem_matrix <- stem_matrix[order(stem_matrix$log_odd_stem),]

data <- fread(paste0(dir, file), header = TRUE, encoding = 'UTF-8')
data <- as.data.frame(data)

# source function has an issue with UTF-8
eval(parse('ar_norm-v4.R', encoding='UTF-8'))
eval(parse('score_sentiment-v4.R', encoding='UTF-8'))

data$label <- ifelse(data$rating > 3, 'Positive', 'Negative')
score <- data.frame(Word=character(), Stem=character(), Score=double())

records <- dim(data)[1]

pb <- txtProgressBar(min = 0, max = records, initial = 0, style = 3) 
pb_step <- round(records/100)

for(i in 1:records){
  record <- cmp_ar_norm(data[i,'review'])
  if(record == '') next
  
  class <- data[i, 'label']
  score <- cmp_score_sentiment(record)

  log_odd <- sum(score[,'Score'], na.rm = TRUE)
  
  predict <- if(log_odd > 0) 'Positive' else 'Negative'
  p.value <- exp(log_odd) / (1 + exp(log_odd))
  
  data[i, 'predict'] <- predict
  data[i, 'p.value'] <- p.value
  
  if(i %% pb_step == 0 | i == records) setTxtProgressBar(pb, i)
}

close(pb)

length(subset(data, data$label == data$predict)$label)*100/length(data$label)

#==========================================================
# Accuracy, Precision, Recall & F1 Score: Interpretation of Performance Measures

# Confusion Matrix (True Positive, True Negative, False Positive - Type 1 error, False Negative - Type 2 error)
TP <- length(subset(data, data$label == 'Positive' & data$predict == 'Positive')$label)
TN <- length(subset(data, data$label == 'Negative' & data$predict == 'Negative')$label)
FP <- length(subset(data, data$label == 'Negative' & data$predict == 'Positive')$label)
FN <- length(subset(data, data$label == 'Positive' & data$predict == 'Negative')$label)

(Accuracy <- (TP + TN) / (TP + TN + FP + FN))

# Precision tells us how many of the correctly predicted cases actually turned out to be positive
(Precision <- TP / (TP + FP))

# Recall tells us how many of the actual positive cases we were able to predict correctly with our model
(Recall <- TP / (TP + FN))

# F1-score is a harmonic mean of Precision and Recall
(F1.Score <- (2 * Precision * Recall) / (Precision + Recall))
