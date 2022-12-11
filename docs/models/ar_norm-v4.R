ar_norm <- function(text){
  # remove mentions
  text <- gsub('@\\S+', '', text)
  
  # remove hashtags
  text <- gsub('#\\S+', '', text)
  
  # normalise Alef
  chars <- 'أإآى'
  text  <- gsub(paste0('[', chars, ']'), 'ا', text)
  
  # normalise Hamza
  chars <- 'ؤئء'
  text  <- gsub(paste0('[', chars, ']'), 'ء', text)
  
  # replace taa marbouta by haa (taa maftouha)
  text <- gsub('ة', 'ه', text)
  #text  <- gsub('ة', 'ت', text)
  
  # remove longation
  text <- gsub('و+', 'و', text)
  text <- gsub('ي+', 'ي', text)
  text <- gsub('ا+', 'ا', text)
  
  # filter only Arabic text (white list)
  chars <- 'ءابتثجحخدذرزسشصضطظعغفقكلمنهوي'
  text  <- gsub(paste0('[^ ', chars, ']+'), ' ', text)
  
  # exclude one letter words
  text <- gsub('\\b\\S{1}\\b', ' ', text)
  
  # remove extra spaces
  text <- trimws(text)
  text <- gsub('\\s{2,}', ' ', text)
  
  return(text)
}

cmp_ar_norm <- cmpfun(ar_norm)

get_pairs <- function(word){
  letters <- strsplit(word, '')[[1]]
  stems   <- combn(letters, 2)
  pairs   <- paste0(stems[1,], stems[2,])
  return(pairs)
}

cmp_get_pairs <- cmpfun(get_pairs)
