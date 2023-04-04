# ArPHP Library - Change Log

* Version [6.3.4](#whats-new-in-arphp-634-release-date-apr-5-2023) _(release date: Apr 5, 2023)_
* Version [6.3.3](#whats-new-in-arphp-633-release-date-apr-1-2023) _(release date: Apr 1, 2023)_
* Version [6.3.2](#whats-new-in-arphp-632-release-date-jan-21-2023) _(release date: Jan 21, 2023)_
* Version [6.3.1](#whats-new-in-arphp-631-release-date-dec-18-2022) _(release date: Dec 18, 2022)_
* Version [6.3.0](#whats-new-in-arphp-630-release-date-jun-18-2022) _(release date: Jun 18, 2022)_
* Version [6.2.0](#whats-new-in-arphp-620-release-date-jun-20-2021) _(release date: Jun 20, 2021)_
* Version [6.1.0](#whats-new-in-arphp-610-release-date-may-1-2021) _(release date: May 1, 2021)_
* Version [6.0.0](#whats-new-in-arphp-600-release-date-feb-15-2021) _(release date: Feb 15, 2021)_
* Version [5.5.2](#whats-new-in-arphp-552-release-date-jan-26-2021) _(release date: Jan 26, 2021)_
* Version [5.5.1](#whats-new-in-arphp-551-release-date-dec-18-2020) _(release date: Dec 18, 2020)_
* Version [5.1.0](#whats-new-in-arphp-510-release-date-jun-27-2020) _(release date: Jun 27, 2020)_
* Version [5.0.0](#whats-new-in-arphp-500-release-date-jan-25-2020) _(release date: Jan 25, 2020)_
* Version [4.0.0](#whats-new-in-arphp-400-release-date-jan-8-2016) _(release date: Jan 8, 2016)_
* Version [3.6.0](#whats-new-in-arphp-360-release-date-jan-20-2013) _(release date: Jan 20, 2013)_
* Version [3.5.0](#whats-new-in-arphp-350-release-date-sep-1-2012) _(release date: Sep 1, 2012)_
* Version [3.0.0](#whats-new-in-arphp-300-release-date-feb-5-2012) _(release date: Feb 5, 2012)_
* Version [2.8.0](#whats-new-in-arphp-280-release-date-apr-14-2011) _(release date: Apr 14, 2011)_
* Version [2.7.1](#whats-new-in-arphp-271-release-date-aug-23-2010) _(release date: Aug 23, 2010)_
* Version [2.7.0](#whats-new-in-arphp-270-release-date-aug-15-2010) _(release date: Aug 15, 2010)_
* Version [2.6.0](#whats-new-in-arphp-260-release-date-mar-15-2010) _(release date: Mar 15, 2010)_
* Version [2.5.2](#whats-new-in-arphp-252-release-date-sep-16-2009) _(release date: Sep 16, 2009)_
* Version [2.5.1](#whats-new-in-arphp-251-release-date-aug-19-2009) _(release date: Aug 19, 2009)_
* Version [2.5.0](#whats-new-in-arphp-250-release-date-aug-5-2009) _(release date: Aug 5, 2009)_
* Version [2.0.0](#whats-new-in-arphp-200-release-date-jul-7-2009) _(release date: Jul 7, 2009)_
* Version [1.8.0](#whats-new-in-arphp-180-release-date-feb-15-2009) _(release date: Feb 15, 2009)_
* Version [1.7.0](#whats-new-in-arphp-170-release-date-jan-5-2009) _(release date: Jan 5, 2009)_
* Version [1.6.0](#whats-new-in-arphp-160-release-date-aug-25-2008) _(release date: Aug 25, 2008)_
* Version [1.4.0](#whats-new-in-arphp-140-release-date-jul-23-2008) _(release date: Jul 23, 2008)_
* Version [1.3.0](#whats-new-in-arphp-130-release-date-may-18-2008) _(release date: May 18, 2008)_
* Version [1.2.0](#whats-new-in-arphp-120-release-date-apr-8-2008) _(release date: Apr 8, 2008)_
* Version [1.1.0](#whats-new-in-arphp-110-release-date-mar-10-2008) _(release date: Mar 10, 2008)_
* Version [1.0.0](#whats-new-in-arphp-100-release-date-feb-24-2008) _(release date: Feb 24, 2008)_


## What's new in ArPHP 6.3.4 _(release date: Apr 5, 2023)_

* Hotfix the [reported XSS vulnerability](https://github.com/khaled-alshamaa/ar-php/issues/62) in the qibla example. Thanks to [thabetrighi](https://github.com/thabetrighi) for reporting it. 

* Fix the notice error of undefined array key if the string starts by لل, thanks to [thabetrighi](https://github.com/thabetrighi) for [reporting it](https://github.com/khaled-alshamaa/ar-php/issues/60).

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.3.3 _(release date: Apr 1, 2023)_

* Hotfix the [reported XSS vulnerability](https://github.com/khaled-alshamaa/ar-php/issues/61) in the ar_query example. Thanks to [Carsten Schmitz](https://github.com/c-schmitz), the Founder & CEO at [LimeSurvey](https://www.limesurvey.org/) for reporting it. 

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.3.2 _(release date: Jan 21, 2023)_

* Fix the [reported bug](https://github.com/khaled-alshamaa/ar-php/issues/57) in the utf8Glyphs function when the text has ALEF after double LAMs. Thanks to [Fakiri25](https://github.com/fakiri25) for reporting and [Moutaz Al Khatib](https://github.com/muotaz) for the investigation. 

* Hotfix for the date function to make it compatible with PHP 8.2. Thanks to [Mohannad Najjar](https://github.com/MohannadNaj) for the [fix](https://github.com/khaled-alshamaa/ar-php/pull/58).

* Optimise PNG images using `optipng -o7 -zm9` images. Thanks to [Дилян Палаузов](https://github.com/dilyanpalauzov) for the [suggestion](https://github.com/khaled-alshamaa/ar-php/pull/51). 

[Top](#arphp-library---change-log)



## What's new in ArPHP 6.3.1 _(release date: Dec 18, 2022)_

* Add new functionality to normalize digits styles in the arNormalizeText() function by setting the symbol's type used to represent numerical digits (Arabic, Hindu, or Persian). Thanks to [Taha Zerrouki](https://github.com/linuxscout) for his [suggestion](https://github.com/khaled-alshamaa/ar-php/issues/31).

* Add the new [diffForHumans](https://khaled-alshamaa.github.io/ar-php/classes/ArPHP-I18N-Arabic.html#method_diffForHumans) method to get the difference between 2 timestamps in a human-readable format. Thanks to [Watheq Alshowaiter](https://github.com/WatheqAlshowaiter) for requesting this functionality.

* Improve example scripts by adding anchor links to the internal sections and links to the related reference documentation.

* Fix the issue of the masculine names formed by adding special feminine characters to the end (e.g., علاء, أسامة, زكريا, مصطفى). Thanks to [Alaa Najmi](https://twitter.com/Alaa_Najmi) for reporting this.

* Fix the issue of handling HARAKAT before SHADDA properly, including the overlapping SHADDA with HARAKAT. Thanks to [Said Bakr](https://github.com/saidbakr) for reporting [#33](https://github.com/khaled-alshamaa/ar-php/issues/33) and contributing to [fixing](https://github.com/khaled-alshamaa/ar-php/pull/36) it.

* Fix the issue of singular feminine numbers. Thanks to [Jeremy Varnham](https://github.com/jvarn) and Saudi ADHD Society for the [fix](https://github.com/khaled-alshamaa/ar-php/pull/49).

* Fix the bug [#34](https://github.com/khaled-alshamaa/ar-php/issues/34) of the undefined array key when the string starts by LAM-ALEF in the arGlyphs() function. Thanks to [Tarun Saini](https://github.com/tsaini530) for the [fix](https://github.com/khaled-alshamaa/ar-php/pull/35).

* Fix the bug [#47](https://github.com/khaled-alshamaa/ar-php/issues/47) of handling Arabic-Indic digits in the arGlyphs() function. Thanks to [Mohammed Anas Al-Mahdi](https://github.com/mamprogr) for [reporting it](https://github.com/khaled-alshamaa/ar-php/issues/47).

* Make sure that the required calendar extension is enabled. Thanks to [Marwane Chaoui](https://github.com/moghwan) for the [fix](https://github.com/khaled-alshamaa/ar-php/pull/45).

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.3.0 _(release date: Jun 18, 2022)_

* Add Arabic text normalization method (e.g., Alef, Hamza, Taa, Alef Lam, etc.). Thanks to [Watheq Alshowaiter](https://github.com/WatheqAlshowaiter) for the [request](https://github.com/khaled-alshamaa/ar-php/issues/18).

* Rewrite the Arabic glyphs mechanism for more flexibility and performance, and resolve reported issue [#25](https://github.com/khaled-alshamaa/ar-php/issues/25) with some fonts like Cairo and Tajawal by using standard UTF-8 code for isolated letters instead of the Arabic Presentation Forms-B. Thanks to [Firas Darwish](https://github.com/firasdarwish) for reporting this issue and [Khaled Hosny](https://github.com/khaledhosny) for help in fixing it.

* Fix issues of handling glyphs of LAM-ALEF and SHADDA with HARAKAT properly. Thanks to [Said Bakr](https://twitter.com/saidbakr) for reporting these issues and [Khaled Hosny](https://github.com/khaledhosny) for help in fixing it.

* Improve the arIdentify method by adding an option to ignore the HTML tags (active by default).

* Improve the way that the keyboard swap function handles لا case (i.e., b vs. gh option) using a probability model.

* Improve sentiment analysis model by optimise system parameters and calculate probability method.

* Improve the code performance by replacing str_replace function with strtr function (arSummary can handle 145% of requests per second compared to the previous version).

* Account for the spelling difference of using Yaa' instead of Hamza Ala Nabrah in the arQueryAllForms() and arQueryWhereCondition() methods. Thanks to [Hamad Adhbiyah](https://github.com/Q8hma) for mentioning it in [this issue](https://github.com/khaled-alshamaa/ar-php/issues/26).

* Fix the issue of Hijri date correction not behaving consistently when the Hijri month end on 29th. Thanks to [Socotoly](https://github.com/Socotoly) for the [fix](https://github.com/khaled-alshamaa/ar-php/pull/22).

* Fix the internal method to clean common words by making sure to remove the whole words only.

* Fix PHP notices in handling some extreme cases in glyphs algorithm. Thanks to [Denis Chenu](https://github.com/Shnoulle) from [LimeSurvey](https://github.com/LimeSurvey/LimeSurvey) team.

* Fix the range of Arabic chars in the UTF-8 table and define it properly to include all extended Arabic chars. Thanks to [sakai ryota](https://github.com/sakairyota) for mentioning it in [this issue](https://github.com/khaled-alshamaa/ar-php/issues/29).

* Fix minor issues in the utf8Glyphs method when handling Arabic and non Arabic chars in the same line which [reported](https://github.com/khaled-alshamaa/ar-php/issues/29) by [sakai ryota](https://github.com/sakairyota).

* Improve the code quality by fix all issues reported by the [PHPStan.org](https://phpstan.org) (PHP Static Analysis Tool) up to the [rule level 6](https://phpstan.org/user-guide/rule-levels).

* Use version 0.114 of the Amiri font ([changes in this release](https://github.com/aliftype/amiri/releases/tag/0.114)).

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.2.0 _(release date: Jun 20, 2021)_

* Improve the usability of the arSentiment method by changing the returned value to be an array of two elements: isPositive (boolean, positive if true and negative if false), and probability (float, ranged from 0 to 1). Thanks to [Zaid Alyafeai](https://github.com/zaidalyafeai) and fruitful brainstorming with [ARBML team](https://github.com/ARBML/Research/issues/1).

* Improve the arSentiment method by adding a simple rule-based mechanism to handle the case of having negation words. Thanks to [Zaid Alyafeai](https://github.com/zaidalyafeai) and fruitful brainstorming with [ARBML team](https://github.com/ARBML/Research/issues/1).

* Add noDots method to get Arabic text written using letters without dots and Hamzat including Progressive Web App (PWA) example.

* Add basic support to transliterate Arabizi (Franco-Arabic) into Arabic text in the en2ar method.

* Improve the stripHarakat method by make it able to remove the last Harakat alone. Thanks to [Tameem Ahmad](https://github.com/tameemahmad) for his [suggestion](https://github.com/khaled-alshamaa/ar-php/issues/11).

* Remove extra space after the WAW letter (and) when spelling numbers in the Arabic idiom.

* Optimize the big SVG files of country flags using the [SVGO web app](https://jakearchibald.github.io/svgomg/) tool, which saved ~70 kb.

* Add JavaScript version of the Arabic sentiment analysis model and query algorithm to the examples directory.

* A few bug fixes in handling leading zeros in int2str, 1 and 2 in str2int, and midnight calculation in getPrayTime.

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.1.0 _(release date: May 1, 2021)_

* Rewrite the utf8Glyphs method using arIdentify for better performance and bidi handling logic.

* Improve slow methods performance including "arIdentify", "arSummaryRankSentences", "checkAr" and "checkEn". They are now faster as per Xdebug profiler (x10, x7, x4 and x4 respectively).

* Fix the [issue #5](https://github.com/khaled-alshamaa/ar-php/issues/5) that reported in the money2str method. Thanks to [Ahmed Fawky](https://github.com/ahmedfawky).

* Test the Arabic Glyphs algorithm against long text examples from Wikipedia and fix few small bugs that occur in some special cases (e.g., [issue #6](https://github.com/khaled-alshamaa/ar-php/issues/6) of a string starts by Lam with Alef, Thanks to [Ahmed Heik](https://github.com/ahmedkheikal)).

* Improve examples by enhancing the associated description.

[Top](#arphp-library---change-log)


## What's new in ArPHP 6.0.0 _(release date: Feb 15, 2021)_

* Add the new "arSentiment" method for Arabic sentiment analysis to determine the tone (i.e., positive or negative) of the text (e.g., comments, reviews, etc.).

* Fix the issue of extra space at the end of returned string in the "ar2en" and "en2ar" methods. Thanks to [Hamoud Alhoqbani](https://github.com/alhoqbani).

* Fix the issue of ignoring the punctuation marks when coming in the Arabic text context for more robust segmentation using the "arIdentify" method. Thanks to [Fahad Khan](https://github.com/bagisto/bagisto/pull/4462#issuecomment-765555768) notification.

* Add the new "arPlural" method to get proper plural form depends on the item count. Thanks to [Arabeyes](https://arabeyes.org/Plural_Forms) Wiki.

* Improve the plural form of the currancy name in the "money2str" method.

* Add the new "stripHarakat" method to clean given Arabic string from Harakat. You can include/exclude Tatweel, Tanwen, Shadda, and Last Harakat.

* Adding support for 5 extra Persian letters (Peh), (Tcheh), (Jeh), (Gaf), and (Yeh) to the "utf8Glyphs" method. Thanks to Yossi Beck <yosbeck@gmail.com>.

* Add the new "addGlyphs" method to insert any new / not supported letter into the existing Glyphs rules.

* Add methods "dd2olc", "olc2dd", and "volc" to encode, decode, and validate location coordinates (latitude and longitude in WGS84) in the [Open Location Code](https://github.com/google/open-location-code/blob/master/docs/specification.md) format.

* Review and simplify the isFemale method.

* Use the [Amiri font](https://www.amirifont.org/) in the glyphs example. Thanks to [Khaled Hosny](https://github.com/khaledhosny).

* Remove the tests of execution time and memory allocated in all examples for more robust benchmarking reporting using the Apache ab tool.

[Top](#arphp-library---change-log)


## What's new in ArPHP 5.5.2 _(release date: Jan 26, 2021)_

* Rename the class file to comply with the [PSR-4 for Autoloading Standards](https://www.php-fig.org/psr/psr-4/) to support Composer 2.0 and fix [this](https://github.com/khaled-alshamaa/ar-php/issues/4) reported issue. Thanks to [bagisto](https://github.com/bagisto/bagisto) team.

* Fix the issue in spell numbers in the Arabic idiom that reported [here](https://github.com/khaled-alshamaa/ar-php/issues/2). Thanks to [ATablas](https://github.com/ATablas).

[Top](#arphp-library---change-log)


## What's new in ArPHP 5.5.1 _(release date: Dec 18, 2020)_

* Profiling the library script using [Xdebug](https://xdebug.org), that helps in detect and resolve a bottleneck in the __construct method. It now takes only %25 of processing time on loading/initialize the library, and it is 15% faster comparing to the previous version.

* Write unit tests in the tests/ArabicTest.php script that covers all examples functionalities using the [PHPUnit](https://phpunit.de) framework.

* Add class documentation in the docs folder using the [phpDocumentor](https://www.phpdoc.org) documentation application for PHP projects.

* Improve the code quality by fix all errors reported in the [PHPStan.org](https://phpstan.org) (PHP Static Analysis Tool) up to the [rule level 5](https://phpstan.org/user-guide/rule-levels).

* Pass the compatibility testing with the new version of PHP 8.0 (released on Nov 26, 2020) successfully.

* Move demo scripts to the examples folder instead of the tests folder.

[Top](#arphp-library---change-log)


## What's new in ArPHP 5.1.0 _(release date: Jun 27, 2020)_

* Use JSON instead of XML for data files to improve the performance (this version can handle 175% of requests per seconds comparing to version 5.0.0).

* Migrate the arIdentify method from version 4.0.0 to extract the Arabic text segments in a given UTF-8 multi language document.

* Add "dd2dms" method to convert coordinates from decimal degrees to degrees, minutes, seconds format.

* Handle the complement day of Hijri month in a proper way when $correction value is not 0. Thanks to Mohamed Abdallah <treviews7@gmail.com>.

* Fix the "int2str" method bug in the output of ordering numbers for values 2-10, 20, 30, etc. Thanks to Said Bakr <said_fox@yahoo.com>.

* Fix the issue of replacing & by &; in the utf8Glyphs method. Thanks to Ramon Leenders <https://github.com/ramonleenders>.

* Improve English soundex example using metaphone function as it knows the basic rules of English pronunciation (e.g. C of Clinton Pronounces K).

[Top](#arphp-library---change-log)


## What's new in ArPHP 5.0.0 _(release date: Jan 25, 2020)_

* Simplify the whole library structure and re-build it to be cross-version compatibility for PHP 5.3 and above including PHP 7.4 in one class and single file using UTF-8 charset encoding and define its Namespace as ArPHP\I18N.

* Compliance with coding standards including [PSR-1 for Basic Coding Standard](https://www.php-fig.org/psr/psr-1/) and [PSR-12 for Extended Coding Style](https://www.php-fig.org/psr/psr-12/).

* New hosting and distribution platform using GitHub, Composer and Packagist.

[Top](#arphp-library---change-log)


## What's new in ArPHP 4.0.0 _(release date: Jan 8, 2016)_

* Implement the lazy loading technique (i.e. include/load sub class file automatically when detect first time call for any related method).

* Rewrite "KeySwap" sub class to move data out of the code. It is now supporting AZERTY French keyboard layout/mapping where we add two methods "swapAf" and "swapFa".

* Add "fixKeyboardLang" method to the "KeySwap" sub class to detect the language automatically of content supplied, currently it supports only Arabic and English language.

* Add new option to the "date" method in the "Date" sub class which presents date in Hijri format from (i.e. Islamic calendar) using in English language. Thanks to Cédric Dupont <lunarok@gmail.com>.

* Deprecate "CharsetC" sub class and simplify the internal chartset conversion mechanism using "iconv" function to be more efficient.
  
* Fix the "en2ar" method in the "Transliteration" sub class when a character isn't plan ASCII, it will be approximated through one or several similarly looking characters.

* Fix the "money2str" method in the "Numbers" sub class to omit print money units when basic or fraction value is zero. Thanks to Abdulmajeed Alharbi <abosami2000@gmail.com>.

* Fix "CompressStr" sub class bug related to implement charset encoding conversion on binary input/output arguments in the "compress", "decompress", "search", and "length" methods.

* Fix the compatibility issues with PHP 5.3, 5.4, and 5.5 reported by PHP_CodeSniffer using PHPCompatibility standards.

* Fix an issue of static methods use reference to $this object! Thanks to Damien Seguy <damien.seguy@gmail.com> to highlight this bug.
  
* Fix the "getPrayTime" method in the "Salat" sub class to avoid wired negative time resulted in some cases (e.g. Mar 21 and 22). Thanks to Mawakitt developers <mawakitt@gmail.com>.

* Fix the bug of not always defined $chars[$i + 1] in the method "preConvert" at "Glyphs.php" file. Thanks to Mustapha Al-Sahli <mustapha.sahli.1993@gmail.com>.

* Check and fix warnings of the PEAR coding standard.

* Improve "City" example by add link to show city location at Google maps.

* Fix deprecated functions issue in both "Query" sub class and "SafeUploadTransliter" example.

* Upgrade FPDF library from version 1.52 to 1.7 which used in the glyphs PDF example.

[Top](#arphp-library---change-log)


## What's new in ArPHP 3.6.0 _(release date: Jan 20, 2013)_

* Implement more accurate algorithm to convert from/to Hijri calendar (published in the [Islamic Crescents' Observation Project](http://www.icoproject.org)) in both "Mktime" and "Date" sub classes, thanks to Mohammed Al-Shehri <moh.alshehri@gmail.com>.
  
* Extend the "Numbers" sub class functionality by add "money2str" method to spell provided price in Arabic idiom by define value, Arabic currency ISO code, and language. Thanks to <msme@arabteam2000-forum.com> who developed the first draft.

* Add "str2int" method to the "Numbers" sub class to convert Arabic string back into integer, (output limits are +/- 2.15e+9 on 32-bit platforms and +/- 9.22e+18 on 64-bit platforms).

* Add one more method to the "Mktime" sub class called "hijriMonthDays" returns how many days are there in a given Hijri month, thanks to Mouayed Al-Mohammadi for the idea.
  
* Fix the "Glyphs" sub class bug when renders the shape of the first letter in the input string just like letter in the middle of word! Thanks to Shady Massalha <massalha@yahoo.com>.
  
* Fix the "Glyphs" sub class bug when we have Tashkeel within لا, لآ, لأ, or لإ which rendered incorrectly by add extra Lam before it, thanks to Said Bakr <saidbakr2@users.sourceforge.net> who reported this bug and help in fix it.

* Fix the "Glyphs" sub class bug when handle the Arabic letter superscript Alef if it is supported by used the font (i.e. just like what we have in مُوسَىٰ وَعِيسَىٰ) which was presented as Tanween before!

* Extend writing error rules using in the "ArQuery" sub class by add cases to handle extended Arabic letters (i.e. ژ, ڨ, پ, چ, گ, and ڪ), thanks to Ammar Abdelhamid <flashpack@gmail.com> who suggest this.

* Reduce the size of the "Salat" sub class by 20%, removed deprecated "getPrayTime" method, that method name is now just an alias of the new "getPrayTime2" method.

* Drop the "pregPattern" method from the main "I18N_Arabic" class, it is too basic to handle it in a standalone method, instead of that users may consult this [FAQ page](http://www.ar-php.org/faq-php-arabic.html#regexp).

* Minor library examples enhancements include: 
    - Check for MING extension in the "Glyphs_SWF" example.
    - Check for SQLite PDO driver in the "City" example.
    - Some SQL example implements Celko visitation model features in the "City" example.
    - "SafeUpload" example will show how to upload file but keep the example directory clean.
    - Rename "SafeUpload" example as "SafeUploadTransliteration" to refer to the used sub class.
    - Remove "Glyphs_SVG example" because current browsers don't have Arabic Glyphs problem anymore.
    - "Moon" example has day default value now.

[Top](#arphp-library---change-log)

  
## What's new in ArPHP 3.5.0 _(release date: Sep 1, 2012)_

* More accurate gender detection by add some formats like إفتعال and إفعال as well as check the list of most common irregular Arabic female names.

* Transliteration from Arabic to English supports now: UNGEGN, UNGEGN+ (i.e. with diacritical marks), RJGC, SES, and ISO 233 standards.

* Enhance "Numbers" sub class to spell ordering numbers in Arabic idiom also.
  
* Add two extra methods to the "CharsetC" sub class to convert Arabic text from UTF-8 and ISO-8859-6 charset into HTML entities named as "iso2html" and "utf2html".
  
* "Salat" sub class delivers now extra output format by present times in UNIX timestamp to provide users more flexibility in handle it.

* Tag HTML content if it is belonging to a forum using the new "isForum" method in the main "I18N_Arabic" class, currently it recognize only vBulletin.
  
* Fix the transliteration issue of ال precedes a word beginning with one of the "sun letters", and issue of ة when it used in combined words to be Romanized as t instead of h.

* Fix the question mark issue in the "swapEa" method in the "KeySwap" sub class, thanks to [Al-Kindi project](http://www.ar-php.org/stats/al-kindi) team who reported this bug.

* Fix the losing new line issue in the "standard" method in the "Standard" sub class, thanks to [Al-Kindi project](http://www.ar-php.org/stats/al-kindi) team who reported this bug.

* Move out "js" sub directory and keyboard example to keep ArPHP pure PHP library.

* Replace PNG version of Arabic countries flags by higher resolution SVG version from Wikipedia.

* Add countries full/long name to the "arab_countries.xml" file.
  
* Convert time presented in the "Info.php" example to GMT based on the server time zone offset.

[Top](#arphp-library---change-log)

  
## What's new in ArPHP 3.0.0 _(release date: Feb 5, 2012)_

* Implement PEAR structure and naming style.

* Convert all internal encoding for sub classes into UTF-8.
  
* Standardize "Salat" sub class methods, the "setDate" method parameters order (it is now: Month, Day, and Year), and the "setLocation" method parameters order (it is now: Latitude, Longitude, and Zone).

* Review Salat time's calculations in the "getPrayTimes2" method and fix few bugs (i.e. missing decimals in rounded numbers, RA rounded rule), we also added elevation parameter which may affect sunrise and sunset estimation in the high lands.
  
* Add new method "int2indic" to the "Numbers" sub class to represent integer numbers in Arabic-Indic digits using HTML entities.

* Add new method "header" to the main "I18N_Arabic" class to set/send output charset in several output media in a proper way (this includes http, html, text_email, html_email, mysql, mysqli, and pdo).

* Add new method "getBrowserLang" to the main "I18N_Arabic" class to detect chosen/default browser language using ISO 639-1 2-letter codes (i.e ar, en, fr, ...).

* Enhance "Normalise" sub class by import set of Taha Zerrouki <taha.zerrouki@gmail.com> PyArabic library functions (this includes: isTashkeel, isHaraka, isShortharaka, isTanwin, isLigature, isHamza, isAlef, isWeak, isYehlike, isWawlike, isTehlike, isSmall, isMoon, isSun, and charName).

* Add "pregPattern" method to render regular expression pattern using an enhanced version of syntax and semantics to support Arabic language by specify generic character sets.

* Better ratio estimation in the "AutoSummarize" sub class build on number of chars instead of number of sentences.

* New Glyphs/SVG example has been added (this fix bidi bug on some browsers like Firefox 3.6 but not others like Chrome 10).
  
* Better example for "Normalise" and "AutoSummarize" sub classes.

* Enhance "Date" sub class example by show tonight moon phase image.

* New Libyan flag in the images/flags directory, and update Sudan cities information in the data/cities.db.

* Fix Qibla direction calculation in the "Salat" sub class.

* Fix issue of handle left zeros after decimal point in the "Numbers" sub class, thanks to Jnom <jnom23@gmail.com> who referred to this bug and provides its solution.

* Fix Tanwin Dam and Kaser issue in the "Transliteration" sub class, they are Romanized now as "un" and "in" respectively.
  
* Fix render issue of digits attached to English letters in the "Glyphs" sub class, they were converted into Hindo style before!

* Fix grammar configuration bug for number 12 in the "ArNumbers.xml" file.

* Add Arabic to Arabizi mapping XML file into "Arabic/data/charset" directory.
  
* Back to the use "heredoc" in the examples as string delimiter instead of the "nowdoc" that used in the version 2.8 examples, this will keep examples compatible with all PHP 5 versions before 5.3 when "nowdoc" string delimiter introduced.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.8.0 _(release date: Apr 14, 2011)_

* Add more accurate method called "getPrayTime2" to the "Salat" sub class to calculate Salat times using algorithm presented by [Hamid Zarrabi-Zadeh](http://www.praytimes.org).

* Add support to the Phoenician language in the "Hiero" sub class.

* Convert internal encoding of the following sub classes into UTF-8: "ArGender", "Hiero", "ArStemmer", "ArSoundex", "ArCompressStr", and "ArCharsetD".
  
* Improve writing error rules used in the "ArQuery" sub class by add case to handle confusing between ظ and ض.

* Improve the "ArIdentifier" sub class by ignoring the following symbols `! " # $ % & ' ( ) * + , - . / 0 1 2 3 4 5 6 7 8 9 :` if they come in the Arabic context, thanks to Emiel Polman <e1polman@live.nl>.

* Update stopwords list provided by Taha Zerrouki <taha.zerrouki@gmail.com>.

* Fix issues of TAB "\t" and URL rendering in the "ArGlyphs" sub class (i.e. http://www.example.com).

* Fix Qibla angle calculation from the north direction for locations exists above Makkah latitude line, then add a small script in the "Examples" directory to enhance "Salat" example and present this information in SVG visual format.
  
* Fix strict error standards of accessing static property in the "ArGlyphs" sub class as non-static.

* Fix all reported notices error in the classes.

* Add comments/documentation to the XML files in the sub/data directory.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.7.1 _(release date: Aug 23, 2010)_

* Fix name of extra charset files in the "ArCharsetC" sub class.

* Fix calculation of time zone adjusted by summer time in the "Info" example.

* Fix re-declares issue of the "ArCharsetC" sub class in the main "Arabic" class.

* Fix declaration of static $bin property in the "ArCompressStr" sub class.

* Fix static properties declaration in the "ArKeySwap" sub class.

* Fix calculation bug of Hijri calendar correction using Ummulqura calendar information on Linux/UNIX servers.

* Fix the "ArGlyphs" sub class bug when English words have dots in between (e.g. domain name).

* Replace all the `__DIR__` magic constant (which added in PHP 5.3.0) by "dirname" function for the `__FILE__` magic constant to keep compatible with all PHP 5 versions.
  
* Replace "split" function by "explode" function because it has been DEPRECATED as of PHP 5.3.0.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.7.0 _(release date: Aug 15, 2010)_

* The "ArNumbers" sub class can handle now numbers exceeds 2^31 (integer limit), it is supports now numbers up to 15 digits (i.e. Trillions).

* The "ArNumbers" sub class supports now negative numbers.

* Fix Algerian time zone and add summer time information (including start and end dates in the strtotime text format) into the "arab_countries.xml" file, thanks to [El-Bachiri](http://www.bp.ma).

* Improve the accuracy of the "ArStrToTime" sub class.

* Set methods returns now $this object to build a fluent interface, thanks to [Till Klampaeckel](http://pear.php.net/user/till) for his advice.

* Merge "EnTransliteration" and "ArTransliteration" sub classes in one sub class called "Transliteration".

* Add compatible mechanism to map old classes/methods naming style to the new style required by PEAR migration process, if you are using the new naming style then you can switch compatibility off to save some execution time.

* Support Arabic language in the Hiero sub class.
  
* Check and fix many violations of the PEAR coding standard.

* Implement cleaner way to convert between different Arabic character sets, this makes sub classes independent from main Arabic class by define input and output character set for each method. 

* Improve Hieroglyphics symbols resolution and enable set background color (default is transparent), it also supports now writing direction [ltr, rtl, ttb and btt].

* Fix the "ArGlyphs" sub class bug when English words have dash in between or when sentence starts or ends by English word.

* Fix Makkah province information (KSA) in the cities SQLite database file (in total 21 cities), thanks to Daif Alotaibi <daif@daif.net> to highlight this issue.
  
* Fix character set files by add missing Arabic "dammah", thanks to Jalal Al-Deen Omary <jalalaldeen@gmail.com> to highlight this issue.

* Fix autoload functionality and use "spl_autoload_register".

* Fix the usage way of Ummulqura correction value in the date example (it is third parameter not fourth one).

* Add "getClassPath" private method to have more control on the mapping between class name and the path to the file that we have to include.

* Push data arrays into external documented XML files.

> _Warning:_ Many people reported problems in the ArGlyphs_GD example, it's a bug in PHP 5.3.1 binary build; PHP 5.3.2 no longer misses chars or throws a warning. It's also been working fine in several setups up to PHP 5.3.0 and problems started when it run under PHP 5.3.1 where all non-ASCII characters are replaced by the hollow rectangle that represents missing or unknown chars.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.6.0 _(release date: Mar 15, 2010)_

* Add new sub class "ArNormalise" developed by Djihed Afifi <djihed@gmail.com>, this class performs text normalization through various stages.
  
* Refactoring the "ArGlyphs" sub class, it is now 2 times faster!

* Improve "isNoun" method in the "ArWordTag" sub class using Taha Zerrouki <taha.zerrouki@gmail.com> advices.
  
* Add Ummulqura correction functions to the both "ArDate" and "ArMktime" sub classes using information sent by Daif Alotaibi <daif@daif.net>.
  
* Improve the "ArQuery" sub class by handle Arabic Tatwilah case "_".

* Add two additional Arabic months naming style to the "ArDate" sub class, the Algerian/Tunisian style and the Moroccan style.

* You can pass CSS style name as a second parameter in the "highlightText" method in the "ArWordTag" sub class instead of the background color for more flexibility.

* Optimize the "ArWordTag" sub class; it is now 10% faster.

* "useAutoload" and "useException" become optional constructor parameters instead of global variables, both of autoload and error handler methods become static within main "Arabic" class itself.

* Add "arNum" method to the "ArTransliteration" sub class to render numbers in a given string using HTML entities that will show them as an Indian digit (i.e. ١, ٢, ٣, etc...) whatever browser language settings are.

* Add "enNum" method to the "EnTransliteration" sub class to render numbers in a given string using HTML entities that will show them as an Arabic digit (i.e. 1, 2, 3, etc...) whatever browser language settings are.
  
* Add one more "ArGlyphs" example using Flash Art (MING) named "ArGlyphs_SWF.php".

* Fix the "getWhereCondition" method in the "ArQuery" sub class when search string includes extra spaces.

* Fix warning message of undefined offset in the "ArNumbers" sub class when input number is a complete hundred (e.g. 1200, 2500, or 123400).
  
* Fix am and pm Arabic replacement in "ArDate" sub class when mode is 1 (i.e. Hijri format).
  
* Make Arabic countries flags available in the "sub/lists" directory.

* Add 200 Egyptian cities information to the lists.db SQLite database and rename it as cities.db

* New XML file "sub/lists/arab_countries.xml" contains country name in Arabic and English, capital name in Arabic and English as well as its coordinates (latitude and longitude), ISO 3166 codes, time zone, dial code, and currency name in Arabic, English, and ISO currency code.
  
* Remove previous currency XML file and SQLite table in lists as well as currency example and replace it by new Info.php example that demonstrate how to use new arab_countries.xml file.

* Enhance keyboard example by show the virtual keyboard just below selected input item (when "justBelow" JavaScript variable set to true).

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.5.2 _(release date: Sep 16, 2009)_

* Add new sub class called "Hiero" that translate English words into Hieroglyphics.

* Add "getQibla" method to the "Salat" sub class to calculate Qibla direction.

* Convert "ArStemmer" and "ArStandard" sub classes methods and properties to Static for better performance and memory utilize.

* Fix charset conversion of the "swap_ae" method input in the "ArKeySwap" sub class.

* Pack a database of more than 2500 cities in the Arab world, available information includes Arabic and English name as well as latitude and longitude coordination.

* Pack a virtual JavaScript keyboard with Arabic customization (originally developed by [Dmitry Khudorozhkov](http://www.codeproject.com/KB/scripting/jvk.aspx) and we provide the Arabic customization for it)
  
* Pack an Arabic and English list of Arab countries currencies in both XML and SQLite format.

* Convert Private properties in all sub classes into Protected for more flexibility when class extended.
  
* Update examples by add a link to related section in the class documentation in each example file.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.5.1 _(release date: Aug 19, 2009)_

* Refactoring the "ArAutoSummarize" sub class, it is now 2 times faster!

* Check the iconv output, if it is empty then use internal "ArCharsetC" converter.

* Add singleton pattern to the "ArCharsetC" sub class as an option, implementing this pattern allows a programmer to make this single instance easily accessible by many other objects. 

* Default charset loaded in the "ArCharsetC" sub class become only Windows-1256 and UTF-8 for more optimization.
  
* ArabicTest source code becomes compliant to the PEAR Coding Standards.

* You can pass CSS style name as fourth parameter in both "highlightSummary" and "highlightRateSummary" methods in the "ArAutoSummary" sub class instead of setting the background color for more flexibility (see related example).

* Fix charset name for Windows-1256 in the iconv command (convert to CP1256) in the core Arabic class and append "//TRANSLIT" to the output charset.

* Fix warning message in the "ArAutoSummarize" sub class when $word is empty.

* Fix charset conversion of the "swap_ae" method input in the "ArKeySwap" sub class. 

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.5.0 _(release date: Aug 5, 2009)_

* Add "ArStandard" sub class, it has "standard" method which standardize Arabic text to follow writing standards (just like magazine rules).
  
* Add simple and rough "ArStemmer" sub class, it has "stem" method which returns the Arabic stem for any given Arabic word (http://arabtechies.net/node/83), algorithm provides by Taha Zerrouki <taha.zerrouki@gmail.com>.
  
* The "cleanCommon" method in the "ArAutoSummarize" sub class become public now.

* Add "loadExtra" method to the "ArAutoSummarize" sub class to load an enhanced Arabic stop words list.

* Apply semi-factory pattern by using PHP reflection and magic methods to reduce the Arabic.php core file size from 43 KB to 9 KB (allocated now 63% of memory comparing to the previous version and it is 3% faster).
  
* You can load different sub class dynamically using load method, no need to have a new instance for this purpose any more.

* No need to access sub classes anymore, all methods are available now in the core Arabic class level (still previous mode supported and compatible).
  
* It is required now to name the sub class you would like to load when create an instance from the main Arabic class, and mode 'All' is not supported any more.

* Fix using auto load Boolean switch inside Arabic class constructor by use global $use_autoload (thanks to Taha Zerrouki to refer to this issue).

* Fix Arabic numbers bidi when followed by Arabic comma or Arabic question mark in the "ArGlyphs" sub class.

* Class source code become compliant to the PEAR Coding Standards.

* Check compatibility with PHP 6.0.0-dev, MySQL 6.0.4-alpha, and cloud computing.

[Top](#arphp-library---change-log)


## What's new in ArPHP 2.0.0 _(release date: Jul 7, 2009)_

> _Many thanks to all Arab Techies Code Sprint participants who provides valuable assist and advices: [http://www.arabtechies.net/participants/codesprint](https://web.archive.org/web/20090714054243/http://www.arabtechies.net/participants/codesprint)_

* "ArStrToTime" sub class supports now Hijri date format.

* Add "isArabic" static method to the "ArIdentifier" sub class.

* Improve the "getCharset" method in the "ArCharsetD" sub class by add regular expression to extract HTML page charset from meta tag if there is any! 

* Implement better mechanism to get most possible Arabic lexical forms for a given word in the "allForms" method in the "ArQuery" sub class.

* Enable "ArDate" and "ArMktime" sub classes to accept correction factor (+/- 1-2) to the standard hijri calendar.

* Use PHP exception is optional now and disabled by default for ease of implement in other applications, you can configure it in the Arabic.php file.

* Use PHP `__autoload` function is optional now and disabled by default for ease of implement in other applications, you can configure it in the Arabic.php file.

* Handle decimal numbers in the "ArNumber" sub class.

* Implement better garbage collection mechanism by release child objects directly. 

* Add "win2html" method to the "ArCharsetC" sub class to convert Arabic string from Windows-1256 to HTML entities format.

* Improve current stop words list that used in the "ArAutoSummary" sub class, we used the list that collected by Taha, Walid, Riham and Linuxawy during the Arab Techies Code Sprint in 2009 in addition to MySQL stop words list of full-text search for English language.  

* Cleaner Salat calculation and equations provided by Mansoor Magdy. 

* Fix bug of exception thrown when empty string sent to "int2str" method in the "ArNumber" sub class.

* Fix bug of exception thrown when all keywords sent to "getWhereCondition" method in "ArQuery" sub class are two letters words.

* Fix Salat Al-Asr calculation that may affect some locations (thanks to Mansoor and Salim from qasweb.org).
 
* Support share-nothing architecture (stateless) where input/output character set can optionally pass to each method (to be ready for large scale applications and clustering).

* No need to have "./" in the PHP include_path (to be ready for large scale applications and clustering).

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.8.0 _(release date: Feb 15, 2009)_

* Core Arabic charset converter become 4 times faster and used only 70% of RAM comparing to the previous version, we are using now iconv function instead of ArCharsetC sub class when it is possible.

* Optimize "ArIdentifier" sub class; it is now 2 times faster.

* Optimize "ArGender" sub class; it is now 10% faster.

* Optimize "ArCompressStr" sub class; it is now 10% faster.

* Optimize "ArSoundex" sub class; it is now 5% faster.

* Optimize "ArTransliteration" sub class; it is now 5% faster.

* Update the class documentation and examples to show how you can optimize classes load by specify the functionality you are looking for; this will reduce RAM usage to 25% in average and reduce execution time by 10% in average.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.7.0 _(release date: Jan 5, 2009)_

* Convert all of "ArTransliteration", "EnTransliteration", "ArGender", "ArKeySwap", "ArWordTag", "ArStrToTime", and "ArCompressStr" into Static classes for better performance and memory utilize.

* Better documentation.

* Convert class errors into Exceptions (ArabicException).

* Optimize the "ArKeySwap" sub class, it is now 25% faster and takes only 74% of RAM comparing to the previous version.

* Optimize the "ArTransliteration" sub class, it is now 37% faster and takes only 80% of RAM comparing to the previous version.

* Optimize the "EnTransliteration" sub class, it is now 15% faster and takes only 87% of RAM comparing to the previous version.

* Optimize the "ArCompressStr" sub class, it is now 17% faster and takes only 94% of RAM comparing to the previous version.

* Optimize the "ArGlyphs" sub class, it is now 10% faster and takes only 85% of RAM comparing to the previous version.

* Clean the list of Arabic common words, add a list of English common and important words, and update the "ArAutoSummarize" sub class to handle English text also.

* Fix English sentences separator and reading process for common/important lists from external files in the "ArAutoSummarize" sub class.

* Fix the "jd_to_greg" method in the "ArMktime" sub class.

* Cleaner code generates much less PHP Notices.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.6.0 _(release date: Aug 25, 2008)_

* Core Arabic charset converter becomes 35% faster and takes only 40% of RAM comparing to the previous version.

* Add new "ArCompressStr" sub class for Arabic Huffman zipping.

* Add new method "allForms" to the "ArQuery" sub class which returns all possible word forms to search instead of regular expression format.

* Returns WHERE condition alone in the "ArQuery" sub class (no order by combination for more flexibility).

* Add new stand alone "getOrderBy" public method to the "ArQuery" sub class.

* Field names will not enclosed now by ` eternally, so you can use "table.field" style when you list fields name in the "ArQuery" sub class.

* Add documentation for "greg_to_jd" and "jd_to_greg" methods in the "ArDate" and "ArMktime" sub classes and make returned values identical to the PHP calendar functions.

* Support Libyan date format in the "ArDate" sub class.

* Capitalize the English letter come after - like Al- case in EnTransliteration sub class.

* Fix "Mktime" conversion issue from Hijri to Gregorian date.

* Fix strip slashes issue in the "ArKeySwap" sub class (affect Arabic tah letter). 

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.4.0 _(release date: Jul 23, 2008)_

* Add new "StrToTime" sub class to implement the similar PHP functionality for Arabic language.

* Enhance the security of the "getWhereCondition" method in the "ArQuery" sub class by using the "unescaped_string" function, so it is safe now to place method output in the SQL queries. That method will also ignore now the punctuation as well as words of less than 3 chars if they are not in exact phrase portion.

* No need to compile PHP with --enable-calendar to get ArPHP date function working. We also fixed the "ArMktime" sub class methods visibility.

* Improve performance by replace "preg_replace" function by "str_replace" function when it is possible ("ArAutoSummarize" is 200% faster now).

* Fix "ArAutoSummarize" bug in define sentences and words borders where I miss handle the comma as a separator just like spaces.

* Fix $hindo parameter bug in the "utf8Glyphs" method (did not accept false value to output Arabic digits instead of Hindo digits).

* Fix ArabicTest (the PHPUnit script for automating tests) and add test cases for ArStrToTime sub class methods.

* Add a new batch file for Apache ab stress test.

* Change library license to LGPL instead of GPL.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.3.0 _(release date: May 18, 2008)_

* Class size now is 75% of previous version and ArCharset sub class will not be loaded unless we need it.
  
* More optimization for memory usage.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.2.0 _(release date: Apr 8, 2008)_

* Implement Saleh Al-Matrafe <mr.saphp@gmail.com> update on ArQuery sub class by using "CASE WHEN" statement in ORDER BY section for more relevant ordering.
  
* Fix SQL example file by define table charset, collection, and use GET method instead of POST.

* Minimize class memory footprint by use dynamic instantiation of objects at runtime.
  
* Start working on fix library script standards to implement PEAR coding style.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.1.0 _(release date: Mar 10, 2008)_

* Reflects new updates on system documentation and examples.

* You can define now the bgcolor in highlight procedure in both ArAutoSummaries and ArWordTag sub classes.

[Top](#arphp-library---change-log)


## What's new in ArPHP 1.0.0 _(release date: Feb 24, 2008)_

* First beta code of this Arabic class which is collection of sub classes published before in phpclasses.org repository: http://kshamaa.users.phpclasses.org/browse/author/189864.html but this has more comments in code block as well as standard code format and better character set handles for input and output. The strategic aim of this is to rich PEAR standards to add this class into that library.

* Add ArQuery, ArMktime, ArAutoSummarize, ArWordTag, ArGlyphs, and ArSoundex sub classes.

* Add examples scripts.

* Add the first draft of standard documentation.

[Top](#arphp-library---change-log)
