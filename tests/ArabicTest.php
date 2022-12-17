<?php

namespace ArPHP\I18N\Test;

use PHPUnit\Framework\TestCase;

final class ArabicTest extends TestCase
{  
    public function testTheInternalInitializedProperties(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $status = array();
        $status[] = $Arabic->getDateMode();
        $status[] = $Arabic->getNumberFeminine();
        $status[] = $Arabic->getNumberFormat();
        $status[] = $Arabic->getNumberOrder();
        $status[] = $Arabic->getSoundexLen();
        $status[] = $Arabic->getSoundexLang();
        $status[] = $Arabic->getSoundexCode();
        $status[] = $Arabic->getQueryMode();
        
        $Arabic->setQueryStrFields('abc,xyz');
        $status[] = $Arabic->getQueryArrFields();
        
        $Arabic->setQueryArrFields(['foo','bar']);
        $status[] = $Arabic->getQueryStrFields();

        $this->assertEquals(
            [1, 1, 1, 1, 4, 'en', 'soundex', 0, ['abc','xyz'], 'foo,bar'],
            $status
        );
    }

    public function testSpellNumbersInTheArabicIdiom(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);

        $expected[] = 'مئة وواحد وأربعون مليار وخمسمئة واثنان وتسعون مليون وستمئة وثلاثة وخمسون ألف وخمسمئة وتسعة وثمانون';
        $actual[]   = $Arabic->int2str(141592653589);

        $expected[] = 'صفر صفر تسعمئة وثلاثة وستون فاصلة صفر واحد وثلاثون';
        $actual[]   = $Arabic->int2str('00963.031');

        $expected[] = 'صفر';
        $actual[]   = $Arabic->int2str(0);

        $expected[] = 'مليون وأربعة آلاف وثلاثمئة وواحد وعشرون';
        $actual[]   = $Arabic->int2str(1004321);

        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);

        $expected[] = 'مئة وواحدة وأربعين مليار وخمسمئة واثنتين وتسعين مليون وستمئة وثلاث وخمسين ألف وخمسمئة وتسع وثمانين';
        $actual[]   = $Arabic->int2str(141592653589);

        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);
        
        $expected[] = 'سالب ألفين وسبعمئة وتسع وأربعين فاصلة ثلاثمئة وسبع عشرة';
        $actual[]   = $Arabic->int2str('-2749.317');

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);
        
        $expected[] = 'سبعة دنانير ومئتان وخمسون فلسا';
        $actual[]   = $Arabic->money2str(7.25, 'KWD', 'ar');
        
        $expected[] = '7 Dinar and 250 Fils';
        $actual[]   = $Arabic->money2str(7.25, 'KWD', 'en');
        
        $expected[] = '&#1633;&#1641;&#1639;&#1637;/&#1640;/&#1634; &#1641;:&#1636;&#1635; صباحا';
        $actual[]   = $Arabic->int2indic('1975/8/2 9:43 صباحا');

        $Arabic->setNumberFeminine(2);
        $Arabic->setNumberFormat(2);
        $Arabic->setNumberOrder(2);
        
        $expected[] = 'السابعة عشرة';
        $actual[]   = $Arabic->int2str(17);
        
        $expected[] = 'الثالثة والعشرين';
        $actual[]   = $Arabic->int2str(23);
        
        $expected[] = 'الأولى';
        $actual[]   = $Arabic->int2str(1);

        $Arabic->setNumberFeminine(1);
        $Arabic->setNumberFormat(1);
        $Arabic->setNumberOrder(2);

        $expected[] = 'الأول';
        $actual[]   = $Arabic->int2str(1);
        
        $expected[] = 'السابع';
        $actual[]   = $Arabic->int2str(7);
        
        $expected[] = 'المئة والسابع عشر';
        $actual[]   = $Arabic->int2str(117);

        $expected[] = 1265358979;
        $actual[]   = $Arabic->str2int('مليار ومئتين وخمسة وستين مليون وثلاثمئة وثمانية وخمسين ألف وتسعمئة وتسعة وسبعين');

        $expected[] = -52;
        $actual[]   = $Arabic->str2int('سالب اثنان وخمسون');

        $expected[] = 6000;
        $actual[]   = $Arabic->str2int('ستة آلاف');

        $expected[] = 2000;
        $actual[]   = $Arabic->str2int('ألفان');

        $expected[] = 2000;
        $actual[]   = $Arabic->str2int('ألفين');

        $this->assertEquals($expected, $actual);
    }

    public function testDateOfHijriFormatInIslamicCalendar(): void
    {
        date_default_timezone_set('GMT');
        
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();

        $time = 1502656150;
        
        $correction = $Arabic->dateCorrection ($time);
        $date = $Arabic->date('l j F Y h:i:s A', $time, $correction);
        
        $expected[] = 'الأحد 20 ذو القعدة 1438 08:29:10 مساءً';
        $actual[]   = $date;
        
        $expected[] = 'الأربعاء 29 شوال 1443';
        $actual[]   = $Arabic->date('l j F Y', strtotime('2022-06-01'), -2);
        
        $expected[] = 'الثلاثاء 1 ذو القعدة 1443';
        $actual[]   = $Arabic->date('l j F Y', strtotime('2022-05-31'), 2);
    
        $this->assertEquals($expected, $actual);
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
                          'Boeing', 'Caviar', 'Telephone', 'Internet', "Côte d'Ivoire", 
                          'ana raye7 el jam3a el sa3a 3 el 39r', 'Al-Ahli');
        
        $ar_terms = array();
        
        foreach ($en_terms as $term){
            array_push($ar_terms, $Arabic->en2ar($term));
        }
    
        $this->assertEquals(
            ['جورج بوش','باول وولفوويتز','سيلفيو برلوسكوني','غوانتانامو','اريزونه','ماريلاند','اوراكل','ياهو','غوغل','فورمولا1','بوينغ','كافيار','تلفون','انترنت','كوت ديفوير',
            'انه رايح الجامعه الساعه 3 العصر', 'الاهلي'],
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
            array_push($en_terms, $Arabic->ar2en($term));
        }
    
        $this->assertEquals(
            ["Khalid Ash-Sham'ah","Jubran Khalyl Jubran","Kazim As-Sahir","Majidat Ar-Roumi","Nizar Qab'bani","Souq Al-Hameidei'iah?","Magharat Ja'eita","Ghoutat Dimashq","Halab Ash-Shahba'a","Jazyrat Aarwad","Bilad Ar-Rafidan","Ahramat Al-Jeizah","Dira","Eid","Oud","Rid'a","Eida'a","Hibat Al-Lh","Qadin"],
            $en_terms
        );
    }

    public function testArabicToEnglishTransliterationDifferentStandards(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $text = 'لغة الضاد';

        $expected[] = 'Lght Al-ḑad';
        $actual[]   = $Arabic->ar2en($text, 'UNGEGN+');
        
        $expected[] = 'Lght Al-ḏad';
        $actual[]   = $Arabic->ar2en($text, 'RJGC');
        
        $expected[] = 'Lght Al-ḍad';
        $actual[]   = $Arabic->ar2en($text, 'SES');
        
        $expected[] = 'Lġt Al-ḍad';
        $actual[]   = $Arabic->ar2en($text, 'ISO233');

        $this->assertEquals($expected, $actual);
    }

    public function testGenderGuessForArabicNames36Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $names = array('أحمد بشتو','أحمد منصور','الحبيب الغريبي','المعز بو لحية',
                          'توفيق طه','جلنار موسى','جمال  ريان','جمانة نمور',
                          'جميل عازر','حسن جمول','حيدر عبد الحق','خالد صالح',
                          'خديجة بن قنة','ربى خليل','رشا عارف','روزي عبده',
                          'سمير سمرين','صهيب الملكاوي','عبد الصمد ناصر','علي الظفيري',
                          'فرح البرقاوي','فيروز زياني','فيصل القاسم','لونة الشبل',
                          'ليلى الشايب','لينا زهر الدين','محمد البنعلي',
                          'محمد الكواري','محمد خير البوريني','محمد كريشان',
                          'منقذ العلي','منى سلمان','ناجي سليمان','نديم الملاح',
                          'وهيبة بوحلايس');
        
        // to improve the code coverage of this unit test
        $names[] = 'إسعاد يونس';

        $gender = array();
        
        foreach ($names as $name){
            array_push($gender, $Arabic->isFemale($name));
        }
    
        $this->assertEquals(
            [false,false,false,false,false,true,false,true,false,false,false,false,true,true,true,false,false,false,false,false,true,true,false,true,true,true,false,false,false,false,false,true,false,false,true,true],
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
    
    public function testSwapArabicKeyboardToFrench(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $str = "}ث شعه ىعهف ض م'عى يعهف ض م'ضعفقث";
        
        $this->assertEquals(
            $Arabic->swapAf($str),
            "Ce qui nuit a l'un duit a l'autre"
        );
    }
        

    public function testAutoDetectAndFixKeyboardLanguage4Cases(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $examples = array("ff'z g;k fefhj", "FF'Z G;K FEFHJ", 'ٍمخصمغ لاعف سعقثمغ', 'sLOWLY BUT SURELY', 'أثهلاف');

        $fixed = array();
        
        foreach ($examples as $example){
            array_push($fixed, $Arabic->fixKeyboardLang($example));
        }
    
        $this->assertEquals(
            $fixed,
            ['ببطئ لكن بثبات', 'ببطئ لكن بثبات', 'Slowly but surely', 'Slowly but surely', 'Height']
        );
    }

    public function testArabicGlyphs(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $expected[] = 'ﻢﻴﺣﺮﻟا ﻦﻤﺣﺮﻟا ﻪﻠﻟا ﻢﺴﺑ';
        $actual[]   = $Arabic->utf8Glyphs('بسم الله الرحمن الرحيم');

        $expected[] = '٢٠٠٦ مﺎﻌﻟا ﺬﻨﻣ أﺪﺑ ﺔّﻴﺑﺮﻌﻟا ﺔﻐﻠﻟاو PHP عوﺮﺸﻣ
ًاﺮﻤﺘﺴﻣ لاﺰﻳﻻو';
        $actual[]   = $Arabic->utf8Glyphs('مشروع PHP واللغة العربيّة بدأ منذ العام 2006 ولايزال مستمراً');

        $expected[] = 'ﱞﻦﺴﻣ ٌﻞﺟر اًّﺪﺟ ًﺎﻌَﻣ ِﺔﳲﻗﱢﺮﻟا ﻰَﻬَﺘْﻨُﻣ';
        $actual[]   = $Arabic->utf8Glyphs('مُنْتَهَى الرِّقَّةِ مَعاً جدًّا رجلٌ مسنٌّ');

        // #29 test case 1 (ascii + arabic)
        $expected[] = 'aب ﺐﺒﺑ'; // a \u0628 sp \uFE90 \uFE92 \uFE91
        $actual[]   = $Arabic->utf8Glyphs('aببب ب'); // a \u0628 \u0628 \u0628 sp \u0628

        // #29 test case 2 (multibyte char + arabic)
        $expected[] = 'あب'; //
        $actual[]   = $Arabic->utf8Glyphs('あب');

        $Arabic->addGlyphs('ٱ', 'FB50FB51FB50FB51', false, true);

        // #29 test case 3
        $expected[] = 'بﭐ'; // \u0628 \u0671
        $actual[]   = $Arabic->utf8Glyphs('ٱب'); // \u0671 \u0628

        $this->assertEquals($expected, $actual);
    }

    public function testHijriDateMakeTime(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $expected = array();
        $actual   = array();
        
        $correction = $Arabic->mktimeCorrection(9, 1429);
        
        $actual[]   = $Arabic->mktime(0, 0, 0, 9, 1, 1429, $correction);
        $expected[] = 1220227200;

        $actual[]   = $Arabic->mktimeCorrection(9, 1400);
        $expected[] = 0;
    
        $this->assertEquals($expected, $actual);
    }

    public function testDaysCountOfHijriMonth(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $expected = array();
        $actual   = array();
        
        $expected[] = 30;
        $actual[]   = $Arabic->hijriMonthDays(9, 1429);
        
        $expected[] = 30;
        $actual[]   = $Arabic->hijriMonthDays(12, 1442, false);
        
        $expected[] = false;
        $actual[]   = $Arabic->hijriMonthDays(1, 1500, false);
        
        $this->assertEquals($expected, $actual);
    }

    public function testDecimalDegreeAndDegreeMinuteSecondConversion(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $expected = array();
        $actual   = array();
        
        $expected[] = '-12°34\'55.92"';
        $actual[]   = $Arabic->dd2dms(-12.5822);
        
        $expected[] = '12°04\'04.8"';
        $actual[]   = $Arabic->dd2dms('12.068');
        
        $expected[] = -12.575;
        $actual[]   = $Arabic->dms2dd('12°34\'30"S');

        $this->assertEquals($expected, $actual);
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

        $expected = array();
        $actual   = array();
        
        $Arabic->setSalatLocation(33.52, 36.31, 3, 691);
        $Arabic->setSalatDate(11, 19, 2020);
        $Arabic->setSalatConf('Shafi', -0.833333, -17.5, -19.5, 'Sunni');

        $expected[] = ["5:36","7:05","12:20","15:10","17:37","18:54","17:35","0:20","5:26",
                      [1605764160.0,1605769500.0,1605788400.0,1605798600.0,1605807420.0,1605812040.0,1605807300.0,1605831600.0,1605763560.0]];
        $actual[]   = $Arabic->getPrayTime();
        
        $Arabic->setSalatLocation(36.22, 37.13, 2, 380);
        $Arabic->setSalatDate(1, 25, 2021);
        $Arabic->setSalatConf('Hanafi', -0.833333, -17.5, -19.5, 'Shia');

        $expected[] = ["5:01","6:34","11:44","15:11","17:07","18:17","16:54","22:57","4:51",
                      [1611550860.0,1611556440.0,1611575040.0,1611587460.0,1611594420.0,1611598620.0,1611593640.0,1611615420.0,1611550260.0]];
        $actual[]   = $Arabic->getPrayTime();
    
        $this->assertEquals($expected, $actual);
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
                       'ميلوسيفيتش', 'ميلوسفيتش', 'ميلوزفيتش', 'ميلوزيفيتش', 'ميلسيفيتش', 'ميلوسيفتش', 'ميلينيوم', 'مؤرخ');
        
        $indices = array();
        
        foreach ($words as $word){
            array_push($indices, $Arabic->soundex($word));
        }
        
        // to improve the code coverage of this unit test
        $Arabic->setSoundexCode('phonix');
        $indices[] = $Arabic->soundex('كلينزمان');

        $Arabic->setSoundexCode('soundex');
        $indices[] = $Arabic->soundex('كلينزمان');
    
        $this->assertEquals(
            ['K453','K453','K453','K453','K453','K453','K452','M421','M421','M421','M421','M421','M421','M455', 'M620', 'K458','K452'],
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

    public function testArabicSegmentsIdentifierOneWordCase(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $text = 'Peace سلام שלום Hasîtî शान्ति Barış 和平 Мир';
        $mark = $Arabic->arIdentify($text);
        
        $word = substr($text, $mark[0], $mark[1]-$mark[0]);

        $this->assertEquals(
            $mark,
            [6, 14]
        );
    }

    public function testArabicSegmentsIdentifierMultiWordsCase(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $text = 'فريد عدلي Farid Adly, Editor in Chief, Italian-Arab News Agency ANBAMED (Notizie dal Mediterraneo - أنباء البحر المتوسط), Acquedolci (Italy)';
        $mark = $Arabic->arIdentify($text);
        
        $word1 = substr($text, $mark[0], $mark[1]-$mark[0]);
        $word2 = substr($text, $mark[2], $mark[3]-$mark[2]);
    
        $this->assertEquals(
            $mark,
            [0, 17, 108, 146]
        );
    }

    public function testArabicSegmentsIdentifierHTML(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $text = '<abbr title="رسالة ترحيب">مرحبا بالعالم</abbr>';
        $mark = $Arabic->arIdentify($text);
        
        $word = substr($text, $mark[0], $mark[1]-$mark[0]);

        $this->assertEquals(
            $mark,
            [36, 61]
        );
    }

    public function testArabicQuearyGetAllWordForms(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $expected = array();
        $actual   = array();
        
        $expected[] = 'عرب فلسطينيون فلسطيني فلسطينية فلسطينيتين فلسطينيين فلسطينيان فلسطينيات فلسطينيوا';
        $actual[]   = $Arabic->arQueryAllForms('عرب فلسطينيون');
        
        $expected[] = 'السعودية سعودية سعودي سعود سعوديه سعوديت سعوديات';
        $actual[]   = $Arabic->arQueryAllForms('السعودية');
        
        $expected[] = 'ديارنا ديار دياري ديارك دياركما ديارهما دياركم دياركن ديارها ديارهم ديارهن مستقلة مستقل مستقله مستقلت مستقلات';
        $actual[]   = $Arabic->arQueryAllForms('ديارنا مستقلة');
        
        $expected[] = 'مرحى مرحا تعليقهما تعليق تعليقكما';
        $actual[]   = $Arabic->arQueryAllForms('مرحى تعليقهما');

        $expected[] = 'عائشة عائش عائشه عائشت عائشات عايشة عايش عايشه عايشت عايشات';
        $actual[]   = $Arabic->arQueryAllForms('عائشة');

        $expected[] = 'عصاتين عصا عصاة عصاتينة عصات عصاتة عصاتتين عصاتون عصاتان عصاتات عصاتوا';
        $actual[]   = $Arabic->arQueryAllForms('عصاتين');
        
        $this->assertEquals($expected, $actual);
    }

    public function testArabicQuearyGetSqlStatementByFieldsStr(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $keyword = 'فلسطينيون "أصيلون"';

        $Arabic->setQueryStrFields('field');
        $Arabic->setQueryMode(0);

        $strCondition = $Arabic->arQueryWhereCondition($keyword);
        $strOrderBy   = $Arabic->arQueryOrderBy($keyword);

        $StrSQL = "SELECT `field` FROM `table` WHERE $strCondition ORDER BY $strOrderBy";
        
        $this->assertEquals(
            $StrSQL,
            "SELECT `field` FROM `table` WHERE (field LIKE 'أصيلون\') OR ( REPLACE(field, 'ـ', '') REGEXP 'فلسطيني(ون)?') OR ( REPLACE(field, 'ـ', '') REGEXP '\') ORDER BY ((field LIKE 'أصيلون') + (CASE WHEN  REPLACE(field, 'ـ', '') REGEXP 'فلسطيني(ون)?' THEN 1 ELSE 0 END)) DESC"
        );
    }

    public function testArabicQuearyGetSqlStatementByFieldsStrAndLogic(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $keyword = 'ثقب أسود';

        $Arabic->setQueryStrFields('field');
        $Arabic->setQueryMode(1);

        $strCondition = $Arabic->arQueryWhereCondition($keyword);
        $strOrderBy   = $Arabic->arQueryOrderBy($keyword);

        $StrSQL = "SELECT `field` FROM `table` WHERE $strCondition ORDER BY $strOrderBy";
        
        $this->assertEquals(
            $StrSQL,
            "SELECT `field` FROM `table` WHERE ( REPLACE(field, 'ـ', '') REGEXP 'ثقب') AND ( REPLACE(field, 'ـ', '') REGEXP '(ا|أ|إ|آ)سود') ORDER BY ((CASE WHEN  REPLACE(field, 'ـ', '') REGEXP 'ثقب' THEN 1 ELSE 0 END) + (CASE WHEN  REPLACE(field, 'ـ', '') REGEXP '(ا|أ|إ|آ)سود' THEN 1 ELSE 0 END)) DESC"
        );
    }

    public function testArabicQuearyGetSqlStatementByFieldsArray(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();

        $keyword = 'عرب فلسطينيون';

        $Arabic->setQueryArrFields(['field']);
        $Arabic->setQueryMode(0);

        $strCondition = $Arabic->arQueryWhereCondition($keyword);
        $strOrderBy   = $Arabic->arQueryOrderBy($keyword);

        $StrSQL = "SELECT `field` FROM `table` WHERE $strCondition ORDER BY $strOrderBy";
        
        $this->assertEquals(
            $StrSQL,
            "SELECT `field` FROM `table` WHERE ( REPLACE(field, 'ـ', '') REGEXP 'عرب') OR ( REPLACE(field, 'ـ', '') REGEXP 'فلسطيني(ون)?') ORDER BY ((CASE WHEN  REPLACE(field, 'ـ', '') REGEXP 'عرب' THEN 1 ELSE 0 END) + (CASE WHEN  REPLACE(field, 'ـ', '') REGEXP 'فلسطيني(ون)?' THEN 1 ELSE 0 END)) DESC"
        );
    }
    
    public function testIsArabicFunction(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $test = array();
        
        $test[] = $Arabic->isArabic('خالد الشمعة');
        $test[] = $Arabic->isArabic('Khaled Al-Shamaa');
        
        $this->assertEquals(
            $test,
            [true, false]
        );
    }

    public function testArabicAutoSummarizeGeneral(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $rate = 25;
$fulltext = <<<END
قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة 
أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون. 
وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها 
جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق 
الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي. 
وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض 
بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون 
قبل 13.7 مليار سنة. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد 
عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها. 
ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا. 
وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود 
الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير 
ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد 
من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة 
"يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون 
في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة 
أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010. 
وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته 
عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية 
مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح 
مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف 
مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز 
أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز 
الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم. 
ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية 
وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على 
وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة 
التي يعتقد أنها تمثل حوالي 70 في المئة من الكون. ويقول علماء الفلك أن تجارب 
المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة 
تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض 
ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير 
الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم 
لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم. 
وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة 
الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت 
إلى 14 تيرا الكترون فولت. وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه 
المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري 
المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.
END;
        $fulltext = str_replace("\n", ' ', $fulltext);
        $summary = $Arabic->arSummary($fulltext, '', $rate, 1, 1);
    
        $this->assertEquals(
            $summary,
            '   وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها  جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق  الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي.  وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد  عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها.  ومزيد  من البيانات يعني إمكانية أكبر للكشف.   ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية  وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على  وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة  التي يعتقد أنها تمثل حوالي 70 في المئة من الكون.   وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة  الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت  إلى 14 تيرا الكترون فولت.'
        );
    }

    public function testArabicAutoSummarizeGeneralHighlighted(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $rate = 25;
$fulltext = <<<END
قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة
أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون. 
وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها 
جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق 
الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي. 
وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض 
بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون 
قبل 13.7 مليار سنة. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد 
عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها. 
ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا. 
وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود 
الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير 
ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد 
من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة 
"يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون 
في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة 
أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010. 
وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته 
عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية 
مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح 
مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف 
مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز 
أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز 
الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم. 
ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية 
وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على 
وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة 
التي يعتقد أنها تمثل حوالي 70 في المئة من الكون. ويقول علماء الفلك أن تجارب 
المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة 
تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض 
ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير 
الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم 
لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم. 
وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة 
الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت 
إلى 14 تيرا الكترون فولت. وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه 
المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري 
المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.
END;
        $fulltext = str_replace("\n", ' ', $fulltext);
        $summary = $Arabic->arSummary($fulltext, '', $rate, 1, 2);
    
        $this->assertEquals(
            $summary,
            'قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون.<mark>  وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها  جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق  الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي.</mark>  وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض  بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون  قبل 13.<mark> وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد  عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها.</mark>  ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا.  وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود  الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير  ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات،<mark> ومزيد  من البيانات يعني إمكانية أكبر للكشف.</mark>" وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة  "يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون  في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة  أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010.  وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته  عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية  مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح  مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف  مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز  أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز  الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم.<mark>  ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية  وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على  وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة  التي يعتقد أنها تمثل حوالي 70 في المئة من الكون.</mark> ويقول علماء الفلك أن تجارب  المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة  تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض  ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير  الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم  لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم.<mark>  وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة  الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت  إلى 14 تيرا الكترون فولت.</mark> وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه  المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري  المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.'
        );
    }

    public function testArabicAutoSummarizeForSpecificWord(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $rate = 25;
$fulltext = <<<END
قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة
أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون. 
وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها 
جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق 
الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي. 
وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض 
بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون 
قبل 13.7 مليار سنة. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد 
عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها. 
ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا. 
وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود 
الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير 
ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد 
من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة 
"يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون 
في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة 
أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010. 
وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته 
عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية 
مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح 
مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف 
مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز 
أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز 
الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم. 
ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية 
وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على 
وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة 
التي يعتقد أنها تمثل حوالي 70 في المئة من الكون. ويقول علماء الفلك أن تجارب 
المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة 
تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض 
ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير 
الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم 
لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم. 
وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة 
الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت 
إلى 14 تيرا الكترون فولت. وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه 
المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري 
المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.
END;
        $fulltext = str_replace("\n", ' ', $fulltext);
        $summary = $Arabic->arSummary($fulltext, 'هيجنز', $rate, 1, 1);
    
        $this->assertEquals(
            $summary,
            ' قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون.  ومن بين أهداف  مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز  أو بوزون هيجز موجود فعليا.  ويحمل الجسيم إسم العالم البريطاني بيتر هيجز  الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم.   ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية  وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على  وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة  التي يعتقد أنها تمثل حوالي 70 في المئة من الكون.  وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه  المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري  المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.'
        );
    }

    public function testArabicAutoSummarizeForSpecificWordHighlighted(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $rate = 25;
$fulltext = <<<END
قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة
أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون. 
وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها 
جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق 
الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي. 
وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض 
بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون 
قبل 13.7 مليار سنة. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد 
عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها. 
ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا. 
وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود 
الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير 
ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد 
من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة 
"يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون 
في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة 
أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010. 
وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته 
عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية 
مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح 
مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف 
مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز 
أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز 
الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم. 
ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية 
وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على 
وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة 
التي يعتقد أنها تمثل حوالي 70 في المئة من الكون. ويقول علماء الفلك أن تجارب 
المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة 
تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض 
ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير 
الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم 
لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم. 
وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة 
الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت 
إلى 14 تيرا الكترون فولت. وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه 
المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري 
المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.
END;
        $fulltext = str_replace("\n", ' ', $fulltext);
        $summary = $Arabic->arSummary($fulltext, 'هيجنز', $rate, 1, 2, 'summary');
    
        $this->assertEquals(
            $summary,
            '<mark>قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون.</mark>  وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها  جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق  الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي.  وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض  بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون  قبل 13. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد  عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها.  ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا.  وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود  الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير  ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد  من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة  "يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون  في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة  أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010.  وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته  عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية  مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح  مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم.<mark> ومن بين أهداف  مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز  أو بوزون هيجز موجود فعليا.</mark><mark> ويحمل الجسيم إسم العالم البريطاني بيتر هيجز  الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم.</mark><mark>  ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية  وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على  وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة  التي يعتقد أنها تمثل حوالي 70 في المئة من الكون.</mark> ويقول علماء الفلك أن تجارب  المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة  تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض  ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير  الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم  لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم.  وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة  الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت  إلى 14 تيرا الكترون فولت.<mark> وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه  المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري  المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.</mark>'
        );
    }

    public function testArabicAutoSummarizeKeywords(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $rate = 25;
$fulltext = <<<END
قال علماء في مركز أبحاث الفيزياء التابع للمنظمة الأوروبية للابحاث النووية يوم الجمعة
أنهم حققوا تصادما بين جسيمات بكثافة قياسية في إنجاز مهم في برنامجهم لكشف أسرار الكون. 
وجاء التطور في الساعات الأولى بعد تغذية مصادم الهدرونات الكبير بحزمة أشعة بها 
جسيمات أكثر بحوالي ستة في المئة لكل وحدة بالمقارنة مع المستوى القياسي السابق 
الذي سجله مصادم تيفاترون التابع لمختبر فرميلاب الأمريكي العام الماضي. 
وكل تصادم في النفق الدائري لمصادم الهدرونات البالغ طوله 27 كيلومترا تحت الأرض 
بسرعة أقل من سرعة الضوء يحدث محاكاة للانفجار العظيم الذي يفسر به علماء نشوء الكون 
قبل 13.7 مليار سنة. وكلما زادت "كثافة الحزمة" أو ارتفع عدد الجسيمات فيها زاد 
عدد التصادمات التي تحدث وزادت أيضا المادة التي يكون على العلماء تحليلها. 
ويجري فعليا انتاج ملايين كثيرة من هذه "الانفجارات العظيمة المصغرة" يوميا. 
وقال رولف هوير المدير العام للمنظمة الاوروبية للأبحاث النووية ومقرها على الحدود 
الفرنسية السويسرية قرب جنيف أن "كثافة الحزمة هي الأساس لنجاح مصادم الهدرونات الكبير 
ولذا فهذه خطوة مهمة جدا"، وأضاف "الكثافة الأعلى تعني مزيدا من البيانات، ومزيد 
من البيانات يعني إمكانية أكبر للكشف." وقال سيرجيو برتولوتشي مدير الأبحاث في المنظمة 
"يوجد إحساس ملموس بأننا على أعتاب كشف جديد". وفي حين زاد الفيزيائيون والمهندسون 
في المنظمة كثافة حزم الأشعة على مدى الأسبوع المنصرم قال جيمس جيليه المتحدث باسم المنظمة 
أنهم جمعوا معلومات تزيد على ما جمعوه على مدى تسعة أشهر من عمل مصادم الهدرونات في 2010. 
وتخزن تلك المعلومات على آلاف من أقراص الكمبيوتر. ويمثل المصادم البالغة تكلفته 
عشرة مليارات دولار أكبر تجربة علمية منفردة في العالم وقد بدأ تشغيله في نهاية 
مارس آذار 2010. وبعد الإغلاق الدائم لمصادم تيفاترون في الخريف القادم سيصبح 
مصادم الهدرونات المصادم الكبير الوحيد الموجود في العالم. ومن بين أهداف 
مصادم الهدرونات الكبير معرفة ما إذا كان الجسيم البسيط المعروف بإسم جسيم هيجز 
أو بوزون هيجز موجود فعليا. ويحمل الجسيم إسم العالم البريطاني بيتر هيجز 
الذي كان أول من افترض وجوده كعامل أعطي الكتلة للجسيمات بعد الإنفجار العظيم. 
ومن خلال متابعة التصادمات على أجهزة الكمبيوتر في المنظمة الأوروبية للأبحاث النووية 
وفي معامل في أنحاء العالم مرتبطة بها يأمل العلماء أيضا أن يجدوا دليلا قويا على 
وجود المادة المعتمة التي يعتقد أنها تشكل حوالي ربع الكون المعروف وربما الطاقة المعتمة 
التي يعتقد أنها تمثل حوالي 70 في المئة من الكون. ويقول علماء الفلك أن تجارب 
المنظمة الأوروبية للأبحاث النووية قد تلقي الضوء أيضا على نظريات جديدة بازغة 
تشير إلى أن الكون المعروف هو مجرد جزء من نظام لأكوان كثيرة غير مرئية لبعضها البعض 
ولا توجد وسائل للتواصل بينها. ويأملون أيضا أن يقدم مصادم الهدرونات الكبير 
الذي سيبقى يعمل على مدى عقد بعد توقف فني لمدة عام في 2013 بعض الدعم 
لدلائل يتعقبها باحثون آخرون على أن الكون المعروف سبقه كون آخر قبل الانفجار العظيم. 
وبعد التوقف عام 2013 يهدف علماء المنظمة الأوروبية للأبحاث النووية إلى زيادة 
الطاقة الكلية لكل تصادم بين الجسيمات من الحد الاقصى الحالي البالغ 7 تيرا الكترون فولت 
إلى 14 تيرا الكترون فولت. وسيزيد ذلك أيضا من فرصة التوصل لاكتشافات جديدة فيما تصفه 
المنظمة بأنه "الفيزياء الجديدة" بما يدفع المعرفة لتجاوز ما يسمى النموذج المعياري 
المعتمد على نظريات العالم البرت اينشتاين في اوائل القرن العشرين.
END;
        $fulltext = str_replace("\n", '', $fulltext);
        
        $Arabic->arSummaryLoadExtra();
        
        $keywords = $Arabic->arSummaryKeywords($fulltext, 10);
    
        $this->assertEquals(
            $keywords,
            '2010، 2013'
        );
    }
    
    public function testArabicPluralForms(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $number = 0;
        $expected[] = 'لا تعليقات';
        $text       = $Arabic->arPlural('تعليق', $number);
        $actual[]   = str_replace('%d', $number, $text);
        
        $number = 1;
        $expected[] = 'تعليق واحد';
        $text       = $Arabic->arPlural('تعليق', $number);
        $actual[]   = str_replace('%d', $number, $text);
        
        $number = 2;
        $expected[] = 'تعليقان';
        $text       = $Arabic->arPlural('تعليق', $number);
        $actual[]   = str_replace('%d', $number, $text);
        
        $number = 9;
        $expected[] = '9 تعليقات';
        $text       = $Arabic->arPlural('تعليق', $number);
        $actual[]   = str_replace('%d', $number, $text);
        
        $number = 16;
        $expected[] = '16 صندوقا';
        $text       = $Arabic->arPlural('صندوق', $number, 'صندوقان', 'صناديق', 'صندوقا');
        $actual[]   = str_replace('%d', $number, $text);        
        
        $number = 101;
        $expected[] = '101 صندوق';
        $text       = $Arabic->arPlural('صندوق', $number, 'صندوقان', 'صناديق', 'صندوقا');
        $actual[]   = str_replace('%d', $number, $text);        
        
        $this->assertEquals($actual, $expected);
    }
    
    public function testStripArabicHarakat(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $text = 'إذا رُمتَ أنْ تَحيا سَليماً مِن الأذى ... وَ دينُكَ مَوفورٌ وعِرْضُكَ صَيِنُّ';
        $expected[] = 'إذا رمت أن تحيا سليما من الأذى ... و دينك موفور وعرضك صين';
        $actual[]   = $Arabic->stripHarakat($text);
        
        $text = 'لِســـــــانُكَ لا تَذكُرْ بِهِ عَورَةَ امرئٍ ... فَكُلُّكَ عَوراتٌ وللنّاسِ ألسُنُ';
        $expected[] = 'لسانك لا تذكر به عورة امرئ ... فكلك عورات وللناس ألسن';
        $actual[]   = $Arabic->stripHarakat($text);
        
        $text = 'إذا رُمتَ أنْ تَحيا سَليماً مِن الأذى ... وَ دينُكَ مَوفورٌ وعِرْضُكَ صَيِنُّ';
        $expected[] = 'إذا رمتَ أنْ تحيا سليماً من الأذى ... وَ دينكَ موفورٌ وعرضكَ صينُّ';
        $actual[]   = $Arabic->stripHarakat($text, false, false, false, false);
        
        $text = 'لِســـــــانُكَ لا تَذكُرْ بِهِ عَورَةَ امرئٍ ... فَكُلُّكَ عَوراتٌ وللنّاسِ ألسُنُ';
        $expected[] = 'لســـــــانكَ لا تذكرْ بهِ عورةَ امرئٍ ... فكلّكَ عوراتٌ وللنّاسِ ألسنُ';
        $actual[]   = $Arabic->stripHarakat($text, false, false, false, false);
        
        $Arabic->setNorm('all', true);

        $actual[] = $Arabic->getNorm('stripTatweel');
        $actual[] = $Arabic->getNorm('stripTanween');
        $actual[] = $Arabic->getNorm('stripShadda');
        $actual[] = $Arabic->getNorm('stripLastHarakat');
        $actual[] = $Arabic->getNorm('stripWordHarakat');
        $actual[] = $Arabic->getNorm('normaliseLamAlef');
        $actual[] = $Arabic->getNorm('normaliseAlef');
        $actual[] = $Arabic->getNorm('normaliseHamza');
        $actual[] = $Arabic->getNorm('normaliseTaa');
        $actual[] = $Arabic->getNorm('notExist');
        
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = true;
        $expected[] = false;

        $this->assertEquals($expected, $actual);
    }
    
    public function testOpenLocationCode(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $expected[] = true;
        $actual[]   = $Arabic->volc('8G6RM7C7+PF');
        
        $expected[] = false;
        $actual[]   = $Arabic->volc('8G6RM7C7-PF');
        
        $expected[] = false;
        $actual[]   = $Arabic->volc('8G6RM7C7+PA');
        
        $expected[] = false;
        $actual[]   = $Arabic->volc('8G6RM7C7+PF2');
        
        $expected[] = '8G6RM7C7+PF';
        $actual[]   = $Arabic->dd2olc(34.67175, 36.263625);
        
        $expected[] = array(34.67175, 36.263625);
        $actual[]   = $Arabic->olc2dd('8G6RM7C7+PF');
        
        $expected[] = array(null, null);
        $actual[]   = $Arabic->olc2dd('8G6RM7C7-PF');
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testArabicSentimentAnalysis(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $expected[] = false;
        $actual[]   = $Arabic->arSentiment('الخدمة كانت بطيئة')['isPositive'];
        
        $expected[] = true;
        $actual[]   = $Arabic->arSentiment('الإطلالة رائعة والطعام لذيذ')['isPositive'];
        
        $expected[] = false;
        $actual[]   = $Arabic->arSentiment('التبريد لا يعمل والواي فاي ضعيفة')['isPositive'];
        
        $expected[] = true;
        $actual[]   = $Arabic->arSentiment('النظافة مميزة وموظفي الاستقبال متعاونين')['isPositive'];
        
        $expected[] = false;
        $actual[]   = $Arabic->arSentiment('جاءت القطعة مكسورة والعلبة مفتوحة')['isPositive'];
        
        $expected[] = true;
        $actual[]   = $Arabic->arSentiment('المنتج مطابق للمواصفات والتسليم سريع')['isPositive'];
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testArabicNoDots(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $text = 'هل تعلم أن النقاط تم إختراعها للعجم وليس للعرب، حتى أن العرب قديما كانوا لا يستخدمون النقاط وأنت كذلك يمكنك أن تقرأ مقاطع كاملة بدون نقاط كما كان يفعل الأسلاف، وكانوا يفهمون الكلمات من سياق الجملة وأبسط مثال على ذلك أنك تقرأ هذا المقطع من دون مشاكل.';
        $expected[] = 'هل ٮعلم اں الٮٯاط ٮم احٮراعها للعحم ولىس للعرٮ، حٮى اں العرٮ ٯدىما كاٮوا لا ىسٮحدموں الٮٯاط واٮٮ كدلک ىمكٮک اں ٮٯرا مٯاطع كامله ٮدوں ٮٯاط كما كاں ىڡعل الاسلاڡ، وكاٮوا ىڡهموں الكلماٮ مں سىاٯ الحمله واٮسط مٮال على دلک اٮک ٮٯرا هدا المٯطع مں دوں مساكل.';
        $actual[]   = $Arabic->noDots($text);
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testNormalizeText(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();
        
        $text = 'آسِفـــةٌ لا تَنَبُّؤْ 456';
        
        $expected[] = 'اسفه لا تنبء 456';
        $actual[]   = $Arabic->arNormalizeText($text);
        
        $expected[] = 'اسفه لا تنبء 456';
        $actual[]   = $Arabic->arNormalizeText($text, 'Arabic');
        
        $expected[] = 'اسفه لا تنبء ٤٥٦';
        $actual[]   = $Arabic->arNormalizeText($text, 'Hindu');
        
        $expected[] = 'اسفه لا تنبء ۴۵۶';
        $actual[]   = $Arabic->arNormalizeText($text, 'Persian');
        
        $this->assertEquals($expected, $actual);
    }
    
    public function testDiffForHumans(): void
    {
        $Arabic = new \ArPHP\I18N\Arabic();
        
        $expected = array();
        $actual   = array();

        $time  = time();
        $other = $time - 1.618 * 3600 * 24 * 365;

        $expected[] = 'بعد سنة واحدة و 7 أشهر';
        $actual[]   = $Arabic->diffForHumans($time, $other);

        $expected[] = 'بعد سنة واحدة و 7 أشهر و إسبوعين';
        $actual[]   = $Arabic->diffForHumans($time, $other, 3);

        $expected[] = 'بعد سنة واحدة و 7 أشهر و 3 أسابيع';
        $actual[]   = $Arabic->diffForHumans($time, $other, 3, false);

        $expected[] = 'قبل سنة واحدة و 7 أشهر و إسبوعين و يوم واحد و 13 ساعة و 40 دقيقة و 48 ثانية';
        $actual[]   = $Arabic->diffForHumans($other, $time, 7);

        $this->assertEquals($expected, $actual);
    }
}
