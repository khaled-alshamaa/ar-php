<a href="https://www.php.net/"><img src="https://img.shields.io/github/languages/top/khaled-alshamaa/ar-php"/></a> <a href="https://www.php.net/manual/en/migration54.php"><img src="https://img.shields.io/packagist/php-v/khaled.alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/releases/tag/v5.1.0"><img src="https://img.shields.io/github/v/release/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/tags"><img src="https://img.shields.io/github/release-date/khaled-alshamaa/ar-php"/></a> <a href="https://www.gnu.org/licenses/lgpl-3.0.en.html"><img src="https://img.shields.io/packagist/l/khaled.alshamaa/ar-php"/></a> <a href="https://packagist.org/packages/khaled.alshamaa/ar-php/stats"><img src="https://img.shields.io/packagist/dt/khaled.alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/stargazers"><img src="https://img.shields.io/packagist/stars/khaled.alshamaa/ar-php"/></a>

<a href="https://github.com/khaled-alshamaa/ar-php/issues"><img src="https://img.shields.io/github/issues-raw/khaled-alshamaa/ar-php"/></a> <img src="https://img.shields.io/github/languages/code-size/khaled-alshamaa/ar-php"/> <a href="https://github.com/khaled-alshamaa/ar-php/commits/master"><img src="https://img.shields.io/github/commit-activity/m/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/commits/master"><img src="https://img.shields.io/github/last-commit/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/network/members"><img src="https://img.shields.io/github/forks/khaled-alshamaa/ar-php?style=social"/></a> <a href="https://twitter.com/arphp"><img src="https://img.shields.io/twitter/follow/arphp?style=social"></a>
<!-- https://shields.io/ -->

# Ar-PHP Project ([ar-php.org](http://www.ar-php.org/en_index-php-arabic.html))
#### _PHP Speaks Arabic - Be Ready!_
_Copyright © 2006-2021 Khaled Al-Sham'aa._

### Mission & Vision
As has happened in the Far East and Latin America, as the Internet goes to the masses, people want it in their native language.

Our mission is to develop open source solutions and provides professional support helps small and medium size companies meet the challenges of developing professional Arabic websites in the PHP/MySQL environment, the library that we develop helps our partners in save time and increase productivity.

This project provides a set of tools that enable Arabic website developers to serve professional search, present and process Arabic content in PHP.

> [How to Contribute?](#how-to-contribute)

> [Professional Support](#professional-support)

### Arabic Language
Worldwide Internet use has grown tremendously in recent years, most rapidly in non-English speaking regions especially in Arab world. For example, from 2000 to 2019, the online populations grew by more than 8,900 %. Meanwhile, Arabic Web content was estimated to be doubling every year. Such growth has created demand for better websites developing resources in Arabic language. However, existing websites developing resources may be unable to meet it because they primarily serve English-speaking users.

[[Arabic language](https://en.wikipedia.org/wiki/Arabic), [Internet world stats](https://www.internetworldstats.com/stats7.htm)]

### PHP
PHP is a widely-used general-purpose scripting language that is especially suited for web development and can be embedded into HTML. PHP runs more than 75% of all the top 10 million worldwide web sites a few very good examples are Facebook and Wikipedia.

[[PHP language](https://www.php.net/), [Server-side languages report](https://w3techs.com/technologies/overview/programming_language)]

### LGPL
The main difference between the GPL and the LGPL is that the latter can be linked to (in the case of a library, 'used by') a non-(L)GPLed program, which may be free software or proprietary software. This non-(L)GPLed program can then be distributed under any chosen terms if it is not a derivative work.

[[LGPL](http://www.gnu.org/licenses/lgpl-3.0.html), [GNU FAQ](http://www.gnu.org/licenses/gpl-faq.html)]

### History
* PHP 7 at [GitHub.com](https://github.com/khaled-alshamaa/ar-php) starting in 2020.
* PHP 5 at [SourceForge.net](https://sourceforge.net/projects/ar-php/) 2008-2016.
* PHP 4 at [PHPClasses.org](https://www.phpclasses.org/browse/author/189864.html) 2006-2008.
* [PHP and Arabic Language](https://darshoaa.com/pHP-and-Arabic-language/) book, 2007.

## _Main Functionalities_
* [English-Arabic Transliteration](#english-arabic-transliteration)
* [Spell Numbers in the Arabic Idiom](#spell-numbers-in-the-arabic-idiom)
* [Arabic Glyphs to Render Arabic Text](#arabic-glyphs-to-render-arabic-text)
* [Arabic Keyboard Swapping Language](#arabic-keyboard-swapping-language)
* [Arabic Soundex](#arabic-soundex)
* [Arabic Gender Guesser](#arabic-gender-guesser)
* [Arabic SQL Queary](#arabic-sql-queary)
* [Muslim Prayer Times](#muslim-prayer-times)
* [Qibla Determination](#qibla-determination)
* [Arabic/Hijri Date](#arabichijri-date)
* [Arabic/Hijri Maketime](#arabichijri-maketime)
* [Arabic StrToTime](#arabic-strtotime)
* [Arabic Text Standardize](#arabic-text-standardize)
* [Arabic Auto Summarize](#arabic-auto-summarize)
* [Arabic Segments Identifier](#arabic-segments-identifier)


### English-Arabic Transliteration
Transliterate English words into Arabic by render them in the orthography of the Arabic language and vise versa.
   
Out of vocabulary (OOV) words are a common source of errors in cross language information retrieval. Bilingual dictionaries are often limited in their coverage of named entities, numbers, technical terms and acronyms. There is a need to generate translations for these "on-the-fly" or at query time.

A significant proportion of OOV words are named entities and technical terms. Typical analyses finds around 50% of OOV words to be named entities. Yet these can be the most important words in the queries. Cross language retrieval performance (average precision) reduced more than 50% when named entities in the queries were not translated.

When the query language and the document language share the same alphabet it may be sufficient to use the OOV word as its own translation. However, when the two languages have different alphabets, the query term must somehow be rendered in the orthography of the other language. The process of converting a word from one orthography into another is called transliteration.

Foreign words often occur in Arabic text as transliteration. This is the case for many categories of foreign words, not just proper names but also technical terms such as caviar, telephone and internet.

```php
$obj = new \ArPHP\I18N\Arabic();
    
$ar_word_1 = $obj->en2ar($en_word_1);
$en_word_2 = $obj->ar2en($ar_word_2);
```

[Back to the list](#main-functionalities)

### Spell Numbers in the Arabic Idiom
Spell numbers in the Arabic idiom. This function is very useful for e-Commerce applications in Arabic for example. It accepts almost any numeric value and convert it into an equivalent string of words in written Arabic language and take care of feminine and Arabic grammar rules.
   
If you ever have to create an Arabic PHP application built around invoicing or accounting, you might find this method useful. Its sole reason for existence is to help you translate integers into their spoken-word equivalents in Arabic language.

How is this useful? Well, consider the typical invoice: In addition to a description of the work done, the date, and the hourly or project cost, it always includes a total cost at the end, the amount that the customer is expected to pay.
  
To avoid any misinterpretation of the total amount, many organizations (mine included) put the amount in both words and figures; for example, $1,200 becomes "one thousand and two hundred dollars." You probably do the same thing every time you write a check.

Now take this scenario to a Web-based invoicing system. The actual data used to generate the invoice will be stored in a database as integers, both to save space and to simplify calculations. So when a printable invoice is generated, your Web application will need to convert those integers into words, this is more clarity and more personality.

```php
$obj = new \ArPHP\I18N\Arabic();

$obj->setNumberFeminine(1);
$obj->setNumberFormat(1);

$int  = 141592653589;
$text = $obj->int2str($int);
echo "$int - $text</ br>";

$cost = 24.7;
$text = $obj->money2str($cost, 'KWD', 'ar');
echo "$cost - $text</ br>";

$obj->setNumberFeminine(2);
$obj->setNumberFormat(2);
$obj->setNumberOrder(2);

$order = '17';
$text  = $obj->int2str($order);
echo "$order - $text</ br>";

$string  = 'مليار و مئتين و خمسة و ستين مليون و ثلاثمئة و ثمانية و خمسين ألف و تسعمئة و تسعة و سبعين';
$integer = $obj->str2int($string);
echo "$string - $integer</ br>";
```

[Back to the list](#main-functionalities)

### Arabic Glyphs to Render Arabic Text
Takes Arabic text as an input and performs Arabic glyph joining on it and outputs a UTF-8 hexadecimals stream that is no longer logically arranged but in a visual order which gives readable results when formatted with a simple Unicode rendering just like GD and PDF libraries that does not handle basic connecting glyphs of Arabic language yet but simply outputs all stand alone glyphs in left-to-right order.

```php
header("Content-type: image/png");

$image = @imagecreatefromgif('/path/to/images/bg.gif');
$black = imagecolorallocate($image, 0, 0, 0);
$font  = '/path/to/fonts/ae_AlHor.ttf';

$obj  = new \ArPHP\I18N\Arabic();

$text = 'بسم الله الرحمن الرحيم';
$text = $obj->utf8Glyphs($text);

imagettftext($image, 20, 0, 250, 100, $black, $font, $text);
```

[Back to the list](#main-functionalities)

### Arabic Keyboard Swapping Language
Convert keyboard language between English/French and Arabic programmatically. This function can be helpful in dual language forms when users miss change keyboard language while they are entering data.

If you wrote an Arabic sentence while your keyboard stays in English mode by mistake, you will get a non-sense English text on your screen. In that case you can use this method to make a kind of magic conversion to swap that odd text by original Arabic sentence you meant when you type on your keyboard.

Please note that magic conversion in the opposite direction (if you type English sentences while your keyboard stays in Arabic mode) is also available, but it is not reliable as much as previous case because in Arabic keyboard we have some keys provide a short-cut to type two chars in one click (these keys include: b, B, G and T).

Well, we try to come over this issue by suppose that user used optimum way by using short-cut keys when available instead of assemble chars using stand alone keys, but if (s)he does not then you may have some typo chars in converted text.

```php
$obj = new \ArPHP\I18N\Arabic();

$str = "Hpf lk hgkhs hglj'vtdkK Hpf hg`dk dldg,k f;gdjil Ygn ,p]hkdm ...";

echo "<h4>Before - English Keyboard:</h4>$str";

$txt = $obj->swapEa($str);

echo "<h4>After - Fixed Text:</h4>$txt";

$examples = array("ff'z g;k fefhj", "FF'Z G;K FEFHJ", 'ٍمخصمغ لاعف سعقثمغ', 'sLOWLY BUT SURELY');

foreach ($examples as $example) {
    $fix = $obj->fixKeyboardLang($example);

    echo '<font color="red">' . $example . '</font> => ';
    echo '<font color="blue">' . $fix . '</font><br />';
}
```

[Back to the list](#main-functionalities)

### Arabic Soundex
Takes Arabic word as an input and produces a character string which identifies a set words of those are (roughly) phonetically alike.

Terms that are often misspelled can be a problem for database designers. Names, for example, are variable length, can have strange spellings, and they are not unique. Words can be misspelled or have multiple spellings, especially across different cultures or national sources.

To solve this problem, we need phonetic algorithms which can find similar sounding terms and names. Just such a family of algorithms exists and is called SoundExes, after the first patented version.

A Soundex search algorithm takes a word, such as a person's name, as input and produces a character string which identifies a set of words that are (roughly) phonetically alike. It is very handy for searching large databases when the user has incomplete data.

The original Soundex algorithm was patented by Margaret O'Dell and Robert C. Russell in 1918. The method is based on the six phonetic classifications of human speech sounds (bilabial, labiodental, dental, alveolar, velar, and glottal), which in turn are based on where you put your lips and tongue to make the sounds.

Soundex function is available in PHP, but it has been limited to English and other Latin-based languages. This function described in PHP manual as the following: Soundex keys have the property that words pronounced similarly produce the same soundex key, and can thus be used to simplify searches in databases where you know the pronunciation but not the spelling. This soundex function returns string of 4 characters long, starting with a letter.

We develop this method as an Arabic counterpart to English Soundex, it handles an Arabic input string to return Soundex key equivalent to normal soundex function in PHP even for English and other Latin-based languages because the original algorithm focus on phonetically characters alike not the meaning of the word itself.

```php
$obj = new \ArPHP\I18N\Arabic();

$clinton = array('كلينتون', 'كلينتن', 'كلينطون', 'كلنتن', 'كلنتون', 'كلاينتون');

foreach ($clinton as $name) {
    $soundex = $obj->soundex($name);
    echo "$name - $soundex<br />";
}

echo 'Clinton - ' . soundex('Clinton');
```

[Back to the list](#main-functionalities)

### Arabic Gender Guesser
Attempts to guess the gender of Arabic names. Arabic nouns are either masculine or feminine. Usually when referring to a male, a masculine noun is usually used and when referring to a female, a feminine noun is used. In most cases the feminine noun is formed by adding a special characters to the end of the masculine noun. Its not just nouns referring to people that have gender. Inanimate objects (doors, houses, cars, etc.) is either masculine or feminine. Whether an inanimate noun is masculine or feminine is mostly arbitrary.  

```php
$obj = new \ArPHP\I18N\Arabic();

if ($obj->isFemale($name) == true) { 
   echo "$name is (Female)";
}else{
   echo "$name is (Male)";
} 
```

[Back to the list](#main-functionalities)

### Arabic SQL Queary
Build WHERE condition for SQL statement using MySQL REGEXP and Arabic lexical rules.
   
With the exception of the Qur'an and pedagogical texts, Arabic is generally written without vowels or other graphic symbols that indicate how a word is pronounced. The reader is expected to fill these in from context. Some of the graphic symbols include sukuun, which is placed over a consonant to indicate that it is not followed by a vowel; shadda, written over a consonant to indicate it is doubled; and hamza, the sign of the glottal stop, which can be written above or below (alif) at the beginning of a word, or on (alif), (waaw), (yaa'), or by itself on the line elsewhere. Also, common spelling differences regularly appear, including the use of (haa') for (taa' marbuuta) and (alif maqsuura) for (yaa'). These features of written Arabic, which are also seen in Hebrew as well as other languages written with Arabic script (such as Farsi, Pashto, and Urdu), make analyzing and searching texts quite challenging. In addition, Arabic morphology and grammar are quite rich and present some unique issues for information retrieval applications.

There are essentially three ways to search an Arabic text with Arabic queries: literal, stem-based or root-based.

A literal search, the simplest search and retrieval method, matches documents based on the search terms exactly as the user entered them. The advantage of this technique is that the documents returned will without a doubt contain the exact term for which the user is looking. But this advantage is also the biggest disadvantage: many, if not most, of the documents containing the terms in different forms will be missed. Given the many ambiguities of written Arabic, the success rate of this method is quite low. For example, if the user searches for (kitaab, book), he or she will not find documents that only contain (al-kitaabu, the book).

Stem-based searching, a more complicated method, requires some normalization of the original texts and the queries. This is done by removing the vowel signs, unifying the hamza forms and removing or standardizing the other signs. Additionally, grammatical affixes and other constructions which attach directly to words, such as conjunctions, prepositions, and the definite article, should be identified and removed. Finally, regular and irregular plural forms need to be identified and reduced to their singular forms. Performing this type of stemming leads to more successful searches, but can be problematic due to over-generation or incorrect generation of stems.

A third method for searching Arabic texts is to index and search for the root forms of each word. Since most verbs and nouns in Arabic are derived from triliteral (or, rarely, quadriliteral) roots, identifying the underlying root of each word theoretically retrieves most of the documents containing a given search term regardless of form. However, there are some significant challenges with this approach. Determining the root for a given word is extremely difficult, since it requires a detailed morphological, syntactic and semantic analysis of the text to fully disambiguate the root forms. The issue is complicated further by the fact that not all words are derived from roots. For example, loan words (words borrowed from another language) are not based on root forms, although there are even exceptions to this rule. For example, some loans that have a structure similar to triliteral roots, such as the English word film, are handled grammatically as if they were root-based, adding to the complexity of this type of search. Finally, the root can serve as the foundation for a wide variety of words with related meanings. The root (k-t-b) is used for many words related to writing, including (kataba, to write), (kitaab, book), (maktab, office), and (kaatib, author). But the same root is also used for regiment/battalion, (katiiba). As a result, searching based on root forms results in very high recall, but precision is usually quite low.

While search and retrieval of Arabic text will never be an easy task, relying on linguistic analysis tools and methods can help make the process more successful. Ultimately, the search method you choose should depend on how critical it is to retrieve every conceivable instance of a word or phrase and the resources you have to process search returns in order to determine their true relevance.

_Reference: Volume 13 Issue 7 of MultiLingual Computing & Technology published by MultiLingual Computing, Inc., 319 North First Ave., Sandpoint, Idaho, USA, 208-263-8178, Fax: 208-263-6310._

```php
$obj = new \ArPHP\I18N\Arabic();
    
echo $obj->arQueryAllForms($_GET['keyword']);

$keyword = $_GET['keyword'];
$keyword = str_replace('\"', '"', $keyword);

$obj->setQueryStrFields('field');
$obj->setQueryMode($_GET['mode']);

$strCondition = $obj->arQueryWhereCondition($keyword);
$strOrderBy   = $obj->arQueryOrderBy($keyword);

$SQL = "SELECT `field` FROM `table` WHERE $strCondition ORDER BY $strOrderBy";
```

[Back to the list](#main-functionalities)

### Muslim Prayer Times
Calculate the time of Muslim prayer according to the geographic location.

The five Islamic prayers are named Fajr, Zuhr, Asr, Maghrib and Isha. The timing of these five prayers varies from place to place and from day to day. It is obligatory for Muslims to perform these prayers at the correct time.

The prayer times for any given location on earth may be determined mathematically if the latitude and longitude of the location are known. However, the theoretical determination of prayer times is a lengthy process. Much of this tedium may be alleviated by using computer programs.

Definition of prayer times:

- FAJR starts with the dawn or morning twilight. Fajr ends just before sunrise.
- ZUHR begins after midday when the trailing limb of the sun has passed the meridian. For convenience, many published prayer timetables add five minutes to mid-day (zawal) to obtain the start of Zuhr. Zuhr ends at the start of Asr time.
- The timing of ASR depends on the length of the shadow cast by an object. According to the Shafi school of jurisprudence, Asr begins when the length of the shadow of an object exceeds the length of the object. According to the Hanafi school of jurisprudence, Asr begins when the length of the shadow exceeds TWICE the length of the object. In both cases, the minimum length of shadow (which occurs when the sun passes the meridian) is subtracted from the length of the shadow before comparing it with the length of the object.
- MAGHRIB begins at sunset and ends at the start of isha.
- ISHA starts after dusk when the evening twilight disappears.

```php
$obj = new \ArPHP\I18N\Arabic();

// Latitude, Longitude, Time Zone, and Elevation
$obj->setSalatLocation(33.52, 36.31, 3, 691);

// Month, Day, and Year
$obj->setSalatDate(date('n'), date('j'), date('Y'));

// Salat calculation configuration: Egyptian General Authority of Survey
$obj->setSalatConf('Shafi', -0.833333,  -17.5, -19.5, 'Sunni');

echo "<b>Damascus, Syria</b> ".date('l F j, Y')."<br /><br />";

$times = $obj->getPrayTime();

echo "<b>Imsak:</b> {$times[8]}<br />";
echo "<b>Fajr:</b> {$times[0]}<br />";
echo "<b>Sunrise:</b> {$times[1]}<br />";
echo "<b>Dhuhr:</b> {$times[2]}<br />";
echo "<b>Asr:</b> {$times[3]}<br />";
echo "<b>Sunset:</b> {$times[6]}<br />";
echo "<b>Maghrib:</b> {$times[4]}<br />";
echo "<b>Isha:</b> {$times[5]}<br />";
echo "<b>Midnight:</b> {$times[7]}<br /><br />";
```

[Back to the list](#main-functionalities)

### Qibla Determination
The problem of qibla determination has a simple formulation in spherical trigonometry. A is a given location, K is the Ka'ba, and N is the North Pole. The great circle arcs AN and KN are along the meridians through A and K, respectively, and both point to the north. The qibla is along the great circle arc AK. The spherical angle q = NAK is the angle at A from the north direction AN to the direction AK towards the Ka'ba, and so q is the qibla bearing to be computed. Let F and L be the latitude and longitude of A, and FK and LK be the latitude and longitude of K (the Ka'ba). If all angles and arc lengths are measured in degrees, then it is seen that the arcs AN and KN are of measure 90 - F and 90 - FK, respectively. Also, the angle ANK between the meridians of K and A equals the difference between the longitudes of A and K, that is, LK - L, no matter what the prime meridian is. Here we are given two sides and the included angle of a spherical triangle, and it is required to determine one other angle. One of the simplest solutions is given by the formula:

                      -1              sin(LK - L)
               q = tan   ------------------------------------------
                             cos F tan FK - sin F cos(LK - L) 

In this Equation, the sign of the input quantities are assumed as follows: latitudes are positive if north, negative if south; longitudes are positive if east, negative if west. The quadrant of q is assumed to be so selected that sin q and cos q have the same sign as the numerator and denominator of this Equation. With these conventions, q will be positive for bearings east of north, negative for bearings west of north.

_Reference: The Correct Qibla, S. Kamal Abdali <k.abdali@acm.org>_ 

_PDF version in http://www.patriot.net/users/abdali/ftp/qibla.pdf_

```php
$obj = new \ArPHP\I18N\Arabic();

$obj->setLocation(33.513,36.292,2);

$direction = $obj->getQibla();

echo "<b>Qibla Direction (from the north direction):</b> $direction<br />";
```

[Back to the list](#main-functionalities)

### Arabic/Hijri Date
Arabic and Islamic customization of PHP date function. It can convert UNIX timestamp into string in Arabic as well as convert it into Hijri calendar

#### _The Islamic Calendar_
The Islamic calendar is purely lunar and consists of twelve alternating months of 30 and 29 days, with the final 29 day month extended to 30 days during leap years. Leap years follow a 30 year cycle and occur in years 1, 5, 7, 10, 13, 16, 18, 21, 24, 26, and 29. The calendar begins on Friday, July 16th, 622 C.E. in the Julian calendar, Julian day 1948439.5, the day of Muhammad's separate from Mecca to Medina, the first day of the first month of year 1 A.H. "Anno Hegira".

Each cycle of 30 years thus contains 19 normal years of 354 days and 11 leap years of 355, so the average length of a year is therefore ((19 x 354) + (11 x 355)) / 30 = 354.365... days, with a mean length of month of 1/12 this figure, or 29.53055... days, which closely approximates the mean synodic month (time from new Moon to next new Moon) of 29.530588 days, with the calendar only slipping one day with respect to the Moon every 2525 years. Since the calendar is fixed to the Moon, not the solar year, the months shift with respect to the seasons, with each month beginning about 11 days earlier in each successive solar year.

The convert presented here is the most commonly used civil calendar in the Islamic world; for religious purposes months are defined to start with the first observation of the crescent of the new Moon.

#### _The Julian Calendar_
The Julian calendar was proclaimed by Julius Casar in 46 B.C. and underwent several modifications before reaching its final form in 8 C.E. The Julian calendar differs from the Gregorian only in the determination of leap years, lacking the correction for years divisible by 100 and 400 in the Gregorian calendar. In the Julian calendar, any positive year is a leap year if divisible by 4. (Negative years are leap years if when divided by 4 a remainder of 3 results.) Days are considered to begin at midnight.

In the Julian calendar the average year has a length of 365.25 days. compared to the actual solar tropical year of 365.24219878 days. The calendar thus accumulates one day of error with respect to the solar year every 128 years. Being a purely solar calendar, no attempt is made to synchronise the start of months to the phases of the Moon.

#### _The Gregorian Calendar_
The Gregorian calendar was proclaimed by Pope Gregory XIII and took effect in most Catholic states in 1582, in which October 4, 1582 of the Julian calendar was followed by October 15 in the new calendar, correcting for the accumulated discrepancy between the Julian calendar and the equinox as of that date. When comparing historical dates, it's important to note that the Gregorian calendar, used universally today in Western countries and in international commerce, was adopted at different times by different countries. Britain and her colonies (including what is now the United States), did not switch to the Gregorian calendar until 1752, when Wednesday 2nd September in the Julian calendar dawned as Thursday the 14th in the Gregorian.

The Gregorian calendar is a minor correction to the Julian. In the Julian calendar every fourth year is a leap year in which February has 29, not 28 days, but in the Gregorian, years divisible by 100 are not leap years unless they are also divisible by 400. How prescient was Pope Gregory! Whatever the problems of Y2K, they won't include sloppy programming which assumes every year divisible by 4 is a leap year since 2000, unlike the previous and subsequent years divisible by 100, is a leap year. As in the Julian calendar, days are considered to begin at midnight.

The average length of a year in the Gregorian calendar is 365.2425 days compared to the actual solar tropical year (time from equinox to equinox) of 365.24219878 days, so the calendar accumulates one day of error with respect to the solar year about every 3300 years. As a purely solar calendar, no attempt is made to synchronise the start of months to the phases of the Moon.

```php
date_default_timezone_set('GMT');

$obj  = new \ArPHP\I18N\Arabic();
$time = time();

$correction = $obj->dateCorrection ($time);
echo $obj->date('l j F Y h:i:s A', $time, $correction);

echo '<br />';

$obj->setDateMode(4);
echo $obj->date('l j F Y h:i:s A', $time);
```

[Back to the list](#main-functionalities)

### Arabic/Hijri Maketime
Arabic and Islamic customization of PHP mktime function. It can convert Hijri date into UNIX timestamp format.

#### _UNIX timestamp_
Development of the Unix operating system began at Bell Laboratories in 1969 by Dennis Ritchie and Ken Thompson, with the first PDP-11 version becoming operational in February 1971. Unix wisely adopted the convention that all internal dates and times (for example, the time of creation and last modification of files) were kept in Universal Time, and converted to local time based on a per-user time zone specification. This far-sighted choice has made it vastly easier to integrate Unix systems into far-flung networks without a chaos of conflicting time settings.

The machines on which Unix was developed and initially deployed could not support arithmetic on integers longer than 32 bits without costly multiple-precision computation in software. The internal representation of time was therefore chosen to be the number of seconds elapsed since 00:00 Universal time on January 1, 1970 in the Gregorian calendar (Julian day 2440587.5), with time stored as a 32 bit signed integer (long in the original C implementation).

The influence of Unix time representation has spread well beyond Unix since most C and C++ libraries on other systems provide Unix-compatible time and date functions. The major drawback of Unix time representation is that, if kept as a 32 bit signed quantity, on January 19, 2038 it will go negative, resulting in chaos in programs unprepared for this. Modern Unix and C implementations define the result of the time() function as type time_t, which leaves the door open for remediation (by changing the definition to a 64 bit integer, for example) before the clock ticks the dreaded doomsday second.

```php
date_default_timezone_set('UTC');

$obj = new \ArPHP\I18N\Arabic();

$fix  = $obj->mktimeCorrection(9, 1429);
$time = $obj->mktime(0, 0, 0, 9, 1, 1429, $fix);
  
echo "Calculated first day of Ramadan 1429 unix timestamp is: $time<br>";
```

[Back to the list](#main-functionalities)

### Arabic StrToTime
Parse about any Arabic textual datetime description into a Unix timestamp.

The function expects to be given a string containing an Arabic date format and will try to parse that format into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT), relative to the timestamp given in now, or the current time if none is supplied.

```php
date_default_timezone_set('UTC');

$obj  = new \ArPHP\I18N\Arabic();
$time = time();

$str1 = 'الخميس القادم';
$int1 = $obj->strtotime($str1, $time);

$str2 = 'الأحد الماضي';
$int2 = $obj->strtotime($str2, $time);

$str3 = 'بعد أسبوع و ثلاثة أيام';
$int3 = $obj->strtotime($str3, $time);

$str4 = 'منذ تسعة أيام';
$int4 = $obj->strtotime($str4, $time);

$str5 = 'قبل إسبوعين';
$int5 = $obj->strtotime($str5, $time);

$str6 = '2 آب 1975';
$int6 = $obj->strtotime($str6, $time);

$str7 = '1 رمضان 1429';
$int7 = $obj->strtotime($str7, $time);
```

[Back to the list](#main-functionalities)

### Arabic Text Standardize
Standardize Arabic text just like rules followed in magazines and newspapers like spaces before and after punctuations, brackets and units etc ...

```php
$obj = new \ArPHP\I18N\Arabic();
    
$content = <<<END
هذا نص عربي ، و فيه علامات ترقيم بحاجة إلى ضبط و معايرة !و كذلك نصوص( بين 
أقواس )أو حتى مؤطرة"بإشارات إقتباس "أو- علامات إعتراض -الخ......
<br />
لذا ستكون هذه المكتبة أداة و وسيلة لمعالجة مثل هكذا حالات، بما فيها الواحدات 1 
Kg أو مثلا MB 16 وسواها حتى النسب المؤية مثل 20% أو %50 وهكذا ...
END;

$str = $obj->standard($content);

echo $str;
```

[Back to the list](#main-functionalities)

### Arabic Auto Summarize
Determines key points by analyzing Arabic document and assigning a score to each sentence. Sentences that contain words used frequently in the document are given a higher score. You can then choose a percentage of the highest-scoring sentences to display in the summary. It works best on well-structured documents such as reports, articles, and scientific papers.

It cuts wordy copy to the bone by counting words and ranking sentences. First, it identifies the most common words in the document and assigns a "score" to each word, the more frequently a word is used, the higher the score.

Then, it "averages" each sentence by adding the scores of its words and dividing the sum by the number of words in the sentence, the higher the average, the higher the rank of the sentence. It can summarize texts to specific number of sentences or percentage of the original copy.

We use statistical approach, with some attention apparently paid to:

* Location: leading sentences of paragraph, title, introduction, and conclusion.
* Fixed phrases: in-text summaries.
* Frequencies of words, phrases, proper names.
* Contextual material: query, title, headline, initial paragraph.

The motivation for this class is the range of applications for key phrases:

* Mini-summary: Automatic key phrase extraction can provide a quick mini-summary for a long document. For example, it could be a feature in a web sites; just click the summarize button when browsing a long web page.
* Highlights: It can highlight key phrases in a long document, to facilitate skimming the document.
* Author Assistance: Automatic key phrase extraction can help an author or editor who wants to supply a list of key phrases for a document. For example, the administrator of a web site might want to have a key phrase list at the top of each web page. The automatically extracted phrases can be a starting point for further manual refinement by the author or editor.
* Text Compression: On a device with limited display capacity or limited bandwidth, key phrases can be a substitute for the full text. For example, a web page could be reduced for display on a Twitter post.

```php
$obj = new \ArPHP\I18N\Arabic();

$file = '/path/to/file.txt';
$rate = 20;

$fhandle = fopen($file, "r");
$content = fread($fhandle, filesize($file));
fclose($fhandle);

$summary = $obj->doRateSummarize($content, $rate);

echo '<h2>Summary:</h2><p dir="rtl" align="justify">'.$summary.'</p>';
echo '<h2>Full Text:</h2><p dir="rtl" align="justify">'.$content.'</p>';
```

[Back to the list](#main-functionalities)

### Arabic Segments Identifier
This method will identify Arabic text in a given UTF-8 multi-language document and return an array of start and end positions for Arabic text segments.

Understanding the language and encoding of a given document is an essential step in working with unstructured multilingual text. Without this basic knowledge, applications such as information retrieval and text mining cannot accurately process data, and important information may be completely missed or misrouted.

Any application that works with Arabic in multiple languages documents can benefit from this functionality. Applications can use it to take a fully automated approach to process Arabic text by quickly and accurately determining Arabic text segments within multiple languages document.

```php
$obj = new \ArPHP\I18N\Arabic();

$p = $obj->arIdentify($html);

for ($i = count($p)-1; $i >= 0; $i-=2) {
    $arbic   = substr($html, $p[$i-1], $p[$i] - $p[$i-1]);
    $replace = '<span style="background-color: #EEEE80">' . $arabic . '</span>';
    $html    = substr_replace($html, $replace, $p[$i-1], $p[$i] - $p[$i-1]);
}
```

[Back to the list](#main-functionalities)


## _How to Contribute?_
We always welcome new contributors – especially new programmers. But no matter what your skills and interests are, there is a place where you can participate to improve Ar-PHP project:

### Programming
Here are some ideas for contribution:
* Review the To-Dos.
* Add a feature.
* Contribute to a core module.
* Create an extension.
* Fix a bug.
 
### Quality Assurance
Quality Assurance (QA) is one of the most important but understated elements of any software community project. It is also something most people can do. If you want to help fix Ar-PHP bugs, and you are not a programmer, you can still help by joining the QA team.
 
### Writing
One of the best ways to contribute to Ar-PHP is to write tutorials, guides, HOWTOs and FAQs. Here are some ideas for contribution:
* User FAQs
* HOW-Tos and Tutorials
* User Guide
* Development Primer
* Blog Posts
* Article for a Magazine
 
### Marketing
You can always help promote the use of Ar-PHP. Here are two ways you can help:
* Join the marketing events
* Distribute Ar-PHP
* Ar-PHP brochure
 
### Graphics and Art
Have any art skills? Then you can help us create icons, logos, banners, labels, wallpapers, screen savers, and more! These will be seen every day and used throughout the project and its products.
 
### Helping Users
There are two ways you can help other users:
* Users mailing list
* Forums
 
### Celebrate with us!
Your task is to take a picture of yourself sporting PHP and Arabic language project. You can go to a famous landmark, your favorite place nearby, or anywhere you think will make for a great photo.

We've created some posters for you to use in your pictures. Print out one of these designs or design your own.

We want to see you and your location prominently displayed in the picture, so don't let one of them dominate the photo. And we should clearly see your Ar-PHP poster too.

Once you have your photos ready to submit, email them to us. Please send your photos in .jpg or .png formats and at least 1200 x 800 pixels in size.

[Top](#ar-php-project-ar-phporg)

## _Professional Support_
As the developers of Ar-PHP project, we can help your company leverage the maximum power of Ar-PHP to achieve your business goals. We offer professional services that span the full life-cycle of Ar-PHP implementation.

### Ar-PHP Library Integration
Having trouble getting started with Ar-PHP? We can help.
 
### Ar-PHP Upgrades
For smooth upgrade to a newer version of Ar-PHP, let us assist you.
 
### Customization and Configuration
If your business requires functionality beyond or different from that of the feature set of Ar-PHP, our team of PHP and Arabic language experts can fully tailor Ar-PHP to meet your specific business needs.
 
### Integration Analysis and Implementation
Arabic localization may be just a component of your entire online business operation. We have the knowledge and experience to integrate Ar-PHP with all the arms of your operation.
 
### Troubleshooting, Optimization and Performance Tuning
For increased performance and bottleneck resolution let an Ar-PHP expert look under the hood of your Ar-PHP implementation and server environment.
 
### Consulting
At any point in the implementation of Ar-PHP you can call upon a Ar-PHP expert to verify that your implementation follows industry best practices.
 
### Training
Get comprehensive training for Ar-PHP.

[Top](#ar-php-project-ar-phporg)
