score_sentiment <- function(text){
  words <- strsplit(text, ' ')[[1]]
  score <- data.frame(Word=character(), Stem=character(), Score=double())
  
  is_negation <- words %in% negation_words
  
  for(j in 1:length(words)){
    pairs <- cmp_get_pairs(words[j])
    
    # exclude 2-letters stem of the same letter
    if((length(pairs) == 1 & substr(pairs[1],1,1) == substr(pairs[1],2,2))) next
    
    pairs_scores <- stem_matrix[which(stem_matrix$stem %in% pairs),]
    
    qualified <- pairs_scores[1, c('stem', 'log_odd')]
    
    if (isTRUE(is_negation[j-1])) {
      # switch positive/negative sentiment because of negation word effect
      qualified[1, 'log_odd'] <- -1 * qualified[1, 'log_odd']
    }
    
    score[nrow(score)+1, ] <- c(words[j], qualified)
  }

  return(score)
}

cmp_score_sentiment <- cmpfun(score_sentiment)
