# Migrating from version 4.0 to 5.0

Once you include the main PHP and Arabic Language library file:

```php
require '/path/to/Arabic.php';
```

You can create an instance of that class in one standard way regardless of the sub-class functionalities that you are going to call:

```php
$Arabic = new \ArPHP\I18N\Arabic();
```

This line of code replaced all the following varieties of new constructor calls to create an object of this library class:

|Version 4.0 Constructor Calls|
|-------------|
|$Arabic = new I18N_Arabic();|
|$Arabic = new I18N_Arabic('AutoSummarize');|
|$Arabic = new I18N_Arabic('Date');|
|$Arabic = new I18N_Arabic('Gender');|
|$Arabic = new I18N_Arabic('Glyphs');|
|$Arabic = new I18N_Arabic('Identifier');|
|$Arabic = new I18N_Arabic('KeySwap');|
|$Arabic = new I18N_Arabic('Mktime');|
|$Arabic = new I18N_Arabic('Numbers');|
|$Arabic = new I18N_Arabic('Query');|
|$Arabic = new I18N_Arabic('Salat');|
|$Arabic = new I18N_Arabic('Soundex');|
|$Arabic = new I18N_Arabic('Standard');|
|$Arabic = new I18N_Arabic('StrToTime');|
|$Arabic = new I18N_Arabic('Transliteration');|

> *Version 5.0 has no static methods anymore, so if you have any call of type `I18N_Arabic::methodName();` then you have to replace it by `$Arabic->methodName();` after creating an object instance like the way mentioned before.*

Once you update the way of constructing your Arabic object, the rest of your code should work transparently with no changes but if you have any of the following listed cases:

> Please note that changes mainly occurred on the method name only keeping parameters type and order as they are, to minimize the required migration efforts. AutoSummarize methods are the only exception to this rule.

### *Changes in the Transliteration methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->arNum($int);|~~Deprecated~~|
|$Arabic->enNum($int);|~~Deprecated~~|

### *Changes in the Date methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->setMode($int);|$Arabic->setDateMode($int);|
|$Arabic->getMode();|$Arabic->getDateMode();|

### *Changes in the Numbers methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->setFeminine($int);|$Arabic->setNumberFeminine($int);|
|$Arabic->setFormat($int);|$Arabic->setNumberFormat($int);|
|$Arabic->setOrder($int);|$Arabic->setNumberOrder($int);|
|$Arabic->getFeminine();|$Arabic->getNumberFeminine();|
|$Arabic->getFormat();|$Arabic->getNumberFormat();|
|$Arabic->getOrder();|$Arabic->getNumberOrder();|

### *Changes in the Soundex methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->setLen($int);|$Arabic->setSoundexLen($int);|
|$Arabic->selLang($str);|$Arabic->selSoundexLang($str);|
|$Arabic->setCode($str);|$Arabic->setSoundexCode($str);|
|$Arabic->getLen();|$Arabic->getSoundexLen();|
|$Arabic->getLang();|$Arabic->getSoundexLang();|
|$Arabic->getCode();|$Arabic->getSoundexCode();|

### *Changes in the Glyphs methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->a4MaxChars($font);|~~Deprecated~~|
|$Arabic->a4Lines($str, $font);|~~Deprecated~~|

### *Changes in the Query methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->setArrFields($arrConfig);|$Arabic->setQueryArrFields($arrConfig);|
|$Arabic->setStrFields($strConfig);|$Arabic->setQueryStrFields($strConfig);|
|$Arabic->setMode($mode);|$Arabic->setQueryMode($mode);|
|$Arabic->getArrFields();|$Arabic->getQueryArrFields();|
|$Arabic->getStrFields();|$Arabic->getQueryStrFields();|
|$Arabic->getMode();|$Arabic->getQueryMode();|
|$Arabic->getWhereCondition($arg);|$Arabic->getQueryWhereCondition($arg);|
|$Arabic->getOrderBy($arg);|$Arabic->getQueryOrderBy($arg);|
|$Arabic->allForms($arg);|$Arabic->allQueryForms($arg);|

### *Changes in the Salat methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->setDate($m, $d, $y);|$Arabic->setSalatDate($m, $d, $y);|
|$Arabic->setLocation($l1, $l2, $z, $e);|$Arabic->setSalatLocation($l1, $l2, $z, $e);|
|$Arabic->setConf($sch, $sunriseArc, $ishaArc, $fajrArc, $view);|$Arabic->setSalatConf($sch, $sunriseArc, $ishaArc, $fajrArc, $view);|
|$Arabic->coordinate2deg($value);|$Arabic->dms2dd($value);|

### *Changes in the AutoSummarize methods:*

| Version 4.0 | Version 5.0 |
|-------------|:------------|
|$Arabic->loadExtra();|$Arabic->arSummaryLoadExtra();|
|$Arabic->getMetaKeywords($str, $int);|$Arabic->arSummaryKeywords($str, $int);|
|$Arabic->doSummarize($str, $int, $keywords);|$Arabic->arSummary($str, $keywords, $int, 1, 1);|
|$Arabic->doRateSummarize($str, $rate, $keywords);|$Arabic->arSummary($str, $keywords, $int, 2, 1);|
|$Arabic->highlightSummary($str, $int, $keywords, $style);|$Arabic->arSummary($str, $keywords, $int, 1, 2, $style);|
|$Arabic->highlightRateSummary($str, $rate, $keywords, $style);|$Arabic->arSummary($str, $keywords, $int, 2, 2, $style);|

### *Changes in the Identifier methods:*

| Version 4.0 | Version 5.1 |
|-------------|:------------|
|$Arabic->identify($str);|$Arabic->arIdentify($str);|

### *Deprecated sub-classes:*

| Version 4.0 | Version 5.1 |
|-------------|:------------|
|$Arabic = new I18N_Arabic('Stemmer');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('WordTag');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('CharsetD');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('CompressStr');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('Hiero');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('Normalise');|~~Deprecated~~|
|$Arabic = new I18N_Arabic('Phoenician');|~~Deprecated~~|

> All the functionalities/methods of deprecated sub-classes have been removed from the library entirely and are not supported anymore. If you believe that any of them deserves to migrate into the latest version of the library, then please [let us know](https://github.com/khaled-alshamaa/ar-php/issues).