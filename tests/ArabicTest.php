<?php declare(strict_types=1);
# covered examples: date, numbers, ar_transliteration, en_transliteration, gender, keyswap 
# glyphs, mktime, salat, standard, strtotime, soundex

use PHPUnit\Framework\TestCase;

final class ArabicTest extends TestCase
{  
    public function testSpellNumbersInTheArabicIdiomExample1(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);

        $integer = 141592653589;

        $text = $Arabic->int2str($integer);
        
        $this->assertEquals(
            'مئة و واحد و أربعون مليار و خمسمئة و إثنان و تسعون مليون و ستمئة و ثلاث و خمسون ألف و خمسمئة و تسع و ثمانون',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample2(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);

        $integer = 141592653589;
        
        $text = $Arabic->int2str($integer);
    
        $this->assertEquals(
            'مئة و واحدة و أربعين مليار و خمسمئة و إثنتين و تسعين مليون و ستمئة و ثلاثة و خمسين ألف و خمسمئة و تسعة و ثمانين',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample3(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);
        
        $integer = '-2749.317';
        
        $text = $Arabic->int2str($integer);
    
        $this->assertEquals(
            'سالب ألفين و سبعمئة و تسعة و أربعين فاصلة ثلاثمئة و سبعة عشر',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample4(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);
        
        $number = 24.7;
        $text   = $Arabic->money2str($number, 'KWD', 'ar');
    
        $this->assertEquals(
            'أربع و عشرون دينار و سبعمئة فلس',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample5(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $string = '1975/8/2 9:43 صباحا';
        $text   = $Arabic->int2indic($string);
    
        $this->assertEquals(
            '&#1633;&#1641;&#1639;&#1637;/&#1640;/&#1634; &#1641;:&#1636;&#1635; صباحا',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample6(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);
        $Arabic->setNumberOrder(2);
        
        $integer = '17';
        
        $text = $Arabic->int2str($integer);
    
        $this->assertEquals(
            'السابعة عشرة',
            $text
        );
    }

    public function testSpellNumbersInTheArabicIdiomExample7(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $string  = 'مليار و مئتين و خمسة و ستين مليون و ثلاثمئة و ثمانية و خمسين ألف و تسعمئة و تسعة و سبعين';

        $integer = $Arabic->str2int($string);
    
        $this->assertEquals(
            1265358979,
            $integer
        );
    }

    public function testDateOfHijriFormatInIslamicCalendar(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $correction = $Arabic->dateCorrection ($time);
        $date = $Arabic->date('l j F Y h:i:s A', $time, $correction);
    
        $this->assertEquals(
            'الأحد 20 ذو القعدة 1438 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfHijriFormatInIslamicCalendarInEnglish(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();
        $Arabic->setDateMode(8);
        
        $correction = $Arabic->dateCorrection ($time);
        $date = $Arabic->date('l j F Y h:i:s A', $time, $correction);
    
        $this->assertEquals(
            "Sunday 20 Dhu al-Qi'dah 1438 08:29:10 PM",
            $date
        );
    }

    public function testDateOfArabicMonthNamesUsedInMiddleEastCountries(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(2);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 آب 2017 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfArabicTransliterationOfGregorianMonthNames(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(3);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 أغسطس 2017 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfArabicMonthNamesAndGregorianTransliterationTogether(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(4);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 آب/أغسطس 2017 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfLibyanWay(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(5);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 هانيبال 1385 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfAlgeriaAndTunisStyle(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(6);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 أوت 2017 08:29:10 مساءً',
            $date
        );
    }

    public function testDateOfMoroccoStyle(): void
    {
        date_default_timezone_set('GMT');
        $time = 1502656150;
        
        $Arabic = new \ArPHP\I18N\Arabic();

        $Arabic->setDateMode(7);
        
        $date = $Arabic->date('l j F Y h:i:s A', $time);
    
        $this->assertEquals(
            'الأحد 13 غشت 2017 08:29:10 مساءً',
            $date
        );
    }

    public function testEnglishToArabicTransliteration15Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $en_terms = array('George Bush', 'Paul Wolfowitz', 'Silvio Berlusconi?', 'Guantanamo', 
                          'Arizona', 'Maryland', 'Oracle', 'Yahoo', 'Google', 'Formula1', 
                          'Boeing', 'Caviar', 'Telephone', 'Internet', "Côte d'Ivoire");
        
        $ar_terms = array();
        
        foreach ($en_terms as $term){
            array_push($ar_terms, trim($Arabic->en2ar($term)));
        }
    
        $this->assertEquals(
            ['جورج بوش','باول وولفوويتز','سيلفيو برلوسكوني','غوانتانامو','اريزونه','ماريلاند','اوراكل','ياهو','غوغل','فورمولا1','بوينغ','كافيار','تلفون','انترنت','كوت ديفوير'],
            $ar_terms
        );
    }

    public function testArabicToEnglishTransliteration19Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $ar_terms = array('خالِد الشَمعَة', 'جُبران خَليل جُبران', 'كاظِم الساهِر',
            'ماجِدَة الرُومِي', 'نِزار قَبَّانِي', 'سُوق الحَمِيدِيَّة؟', 'مَغارَة جَعِيتَا', 
            'غُوطَة دِمَشق', 'حَلَب الشَهبَاء', 'جَزيرَة أَرواد', 'بِلاد الرافِدَين',
            'أهرامات الجِيزَة', 'دِرْع', 'عِيد', 'عُود', 'رِدْء', 'إِيدَاء', 'هِبَة الله', 'قاضٍ');
            
        $en_terms = array();
        
        foreach ($ar_terms as $term){
            array_push($en_terms, trim($Arabic->ar2en($term)));
        }
    
        $this->assertEquals(
            ["Khalid Ash-Sham'ah","Jubran Khalyl Jubran","Kazim As-Sahir","Majidat Ar-Roumi","Nizar Qab'bani","Souq Al-Hameidei'iah?","Magharat Ja'eita","Ghoutat Dimashq","Halab Ash-Shahba'a","Jazyrat Aarwad","Bilad Ar-Rafidan","Ahramat Al-Jeizah","Dira","Eid","Oud","Rid'a","Eida'a","Hibat Al-Lh","Qadin"],
            $en_terms
        );
    }

    public function testGenderGuessForArabicNames35Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $names = array('أحمد بشتو','أحمد منصور','الحبيب الغريبي','المعز بو لحية',
                          'توفيق طه','جلنار موسى','جمال  ريان','جمانة نمور',
                          'جميل عازر','حسن جمول','حيدر عبد الحق','خالد صالح',
                          'خديجة بن قنة','ربى خليل','رشا عارف','روزي عبده',
                          'سمير سمرين','صهيب الملكاوي','عبد الصمد ناصر','علي الظفيري',
                          'فرح البرقاوي','فيروز زياني','فيصل القاسم','لونه الشبل',
                          'ليلى الشايب','لينا زهر الدين','محمد البنعلي',
                          'محمد الكواري','محمد خير البوريني','محمد كريشان',
                          'منقذ العلي','منى سلمان','ناجي سليمان','نديم الملاح',
                          'وهيبة بوحلايس');

        $gender = array();
        
        foreach ($names as $name){
            array_push($gender, $Arabic->isFemale($name));
        }
    
        $this->assertEquals(
            [false,false,false,false,false,true,false,true,false,false,false,false,true,true,true,false,false,false,false,false,true,true,false,true,true,true,false,false,false,false,false,true,false,false,true],
            $gender
        );
    }

    public function testSwapEnglishKeyboardToArabic(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $str = "Hpf lk hgkhs hglj'vtdkK Hpf hg`dk dldg,k f;gdjil Ygn ,p]hkdm hgHl,v tb drt,k ljv]]dk fdk krdqdk>";
    
        $this->assertEquals(
            $Arabic->swapEa($str),
            'أحب من الناس المتطرفين، أحب الذين يميلون بكليتهم إلى وحدانية الأمور فلا يقفون مترددين بين نقيضين.'
        );
    }

    public function testSwapFrenchKeyboardToArabic(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $str = 'Hpf lk hgkhs hgljùvtdkK Hpf hg²dk dldg;k fmgdjil Ygn ;p$hkd, hgHl;v tb drt;k ljv$$dk fdk krdadk/';
    
        $this->assertEquals(
            $Arabic->swapFa($str),
            'أحب من الناس المتطرفين، أحب الذين يميلون بكليتهم إلى وحدانية الأمور فلا يقفون مترددين بين نقيضين.'
        );
    }

    public function testSwapArabicKeyboardToEnglish(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $str = "ِىغ هىفثممهلثىف بخخم ؤشى ةشنث فاهىلس لاهللثق ةخقث ؤخةحمثء شىي ةخقث رهخمثىفز ÷ف فشنثس ش فخعؤا خب لثىهعس شىي ش مخف خب ؤخعقشلث فخ ةخرث هى فاث خححخسهفث يهقثؤفهخىز";
    
        $this->assertEquals(
            $Arabic->swapAe($str),
            'Any intelligent fool can make things ghigger more complex and more violent. It takes a touch of genius and a lot of courage to move in the opposite direction.'
        );
    }

    public function testAutoDetectAndFixKeyboardLanguage4Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $examples = array("ff'z g;k fefhj", "FF'Z G;K FEFHJ", 'ٍمخصمغ لاعف سعقثمغ', 'sLOWLY BUT SURELY');

        $fixed = array();
        
        foreach ($examples as $example){
            array_push($fixed, $Arabic->fixKeyboardLang($example));
        }
    
        $this->assertEquals(
            $fixed,
            ['ببطئ لكن بثبات', 'ببطئ لكن بثبات', 'Slowly ghut surely', 'Slowly but surely']
        );
    }

    public function testArabicGlyphs(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $str = 'بسم الله الرحمن الرحيم';
    
        $this->assertEquals(
            $Arabic->utf8Glyphs($str),
            'ﻢﻴﺣﺮﻟﺍ ﻦﻤﺣﺮﻟﺍ ﻪﻠﻟﺍ ﻢﺴﺑ'
        );
    }

    public function testHijriDateMakeTime(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $correction = $Arabic->mktimeCorrection(9, 1429);
        $time = $Arabic->mktime(0, 0, 0, 9, 1, 1429, $correction);
    
        $this->assertEquals(
            $time,
            1220227200
        );
    }

    public function testDaysCountOfHijriMonth(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $days = $Arabic->hijriMonthDays(9, 1429);
    
        $this->assertEquals(
            $days,
            30
        );
    }

    public function testGetQiblaDirection(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setSalatLocation(33.52, 36.31);
        $direction = $Arabic->getQibla();
    
        $this->assertEquals(
            $direction,
            164.70473621919
        );
    }

    public function testMuslimPrayerTimes(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setSalatLocation(33.52, 36.31, 3, 691);
        $Arabic->setSalatDate(11, 19, 2020);
        $Arabic->setSalatConf('Shafi', -0.833333, -17.5, -19.5, 'Sunni');
    
        $this->assertEquals(
            $Arabic->getPrayTime(),
            ["5:36","7:05","12:20","15:10","17:37","18:54","17:35","0:20","5:26",
            [1605764160.0,1605769500.0,1605788400.0,1605798600.0,1605807420.0,1605812040.0,1605807300.0,1605831600.0,1605763560.0]]
        );
    }

    public function testArabicTextStandardize(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
$content = <<<END
هذا نص عربي ، و فيه علامات ترقيم بحاجة إلى ضبط و معايرة !و كذلك نصوص( بين 
أقواس )أو حتى مؤطرة"بإشارات إقتباس "أو- علامات إعتراض -الخ......
<br>
لذا ستكون هذه المكتبة أداة و وسيلة لمعالجة مثل هكذا حالات، بما فيها الواحدات 1 
Kg أو مثلا MB 16 وسواها حتى النسب المؤية مثل 20% أو %50 وهكذا ...
END;

$check = <<<END
هذا نص عربي، وفيه علامات ترقيم بحاجة إلى ضبط ومعايرة! وكذلك نصوص (بين 
أقواس) أو حتى مؤطرة "بإشارات إقتباس" أو -علامات إعتراض- الخ...
<br>
لذا ستكون هذه المكتبة أداة و وسيلة لمعالجة مثل هكذا حالات، بما فيها الواحدات 1 
Kg أو مثلا <span dir="ltr">16 MB</span> وسواها حتى النسب المؤية مثل %20 أو %50 وهكذا...
END;

        $this->assertEquals(
            $Arabic->standard($content),
            $check
        );
    }

    public function testArabicStringToTime7Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $time  = 1605793969;
        $dates = array('الخميس القادم', 'الأحد الماضي', 'بعد أسبوع و ثلاثة أيام', 'منذ تسعة أيام', 
                          'قبل إسبوعين', '2 آب 1975', '1 رمضان 1429');
        
        $timestamp = array();
        
        foreach ($dates as $date){
            array_push($timestamp, $Arabic->strtotime($date, $time));
        }
    
        $this->assertEquals(
            [1606348800,1605398400,1606657969,1605016369,1604584369,176169600,1220227200],
            $timestamp
        );
    }

    public function testArabicSoundex14Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $words = array('كلينتون', 'كلينتن', 'كلينطون', 'كلنتن', 'كلنتون', 'كلاينتون', 'كلينزمان',
                       'ميلوسيفيتش', 'ميلوسفيتش', 'ميلوزفيتش', 'ميلوزيفيتش', 'ميلسيفيتش', 'ميلوسيفتش', 'ميلينيوم');
        
        $indices = array();
        
        foreach ($words as $word){
            array_push($indices, $Arabic->soundex($word));
        }
    
        $this->assertEquals(
            ['K453','K453','K453','K453','K453','K453','K452','M421','M421','M421','M421','M421','M421','M455'],
            $indices
        );
    }

    public function testArabicSoundexInArabicLength5(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $Arabic->setSoundexLen(5);
        $Arabic->setSoundexLang('ar');
    
        $this->assertEquals(
            $Arabic->soundex('ميلوسيفيتش'),
            'م4213'
        );
    }
}