<?php declare(strict_types=1);

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
}