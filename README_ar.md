<div dir="rtl" align="justify">

<a href="https://www.php.net/"><img src="https://img.shields.io/github/languages/top/khaled-alshamaa/ar-php"/></a> <a href="https://www.php.net/manual/en/migration56.php"><img src="https://img.shields.io/packagist/php-v/khaled.alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/releases/tag/v6.3.1"><img src="https://img.shields.io/github/v/release/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/tags"><img src="https://img.shields.io/github/release-date/khaled-alshamaa/ar-php"/></a> <a href="https://www.gnu.org/licenses/lgpl-3.0.en.html"><img src="https://img.shields.io/packagist/l/khaled.alshamaa/ar-php"/></a> [![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-2.1-4baaaa.svg)](code_of_conduct.md) <a href="https://packagist.org/packages/khaled.alshamaa/ar-php/stats"><img src="https://img.shields.io/packagist/dt/khaled.alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/stargazers"><img src="https://img.shields.io/packagist/stars/khaled.alshamaa/ar-php"/></a> <a href="https://hits.seeyoufarm.com"><img src="https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2Fkhaled-alshamaa%2Far-php&count_bg=%2379C83D&title_bg=%23555555&icon=&icon_color=%23E7E7E7&title=hits&edge_flat=false"/></a><a href="https://github.com/khaled-alshamaa/ar-php/issues"><img src="https://img.shields.io/github/issues-raw/khaled-alshamaa/ar-php"/></a> <img src="https://img.shields.io/github/languages/code-size/khaled-alshamaa/ar-php"/> <a href="https://github.com/khaled-alshamaa/ar-php/commits/master"><img src="https://img.shields.io/github/commit-activity/m/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/commits/master"><img src="https://img.shields.io/github/last-commit/khaled-alshamaa/ar-php"/></a> <a href="https://github.com/khaled-alshamaa/ar-php/network/members"><img src="https://img.shields.io/github/forks/khaled-alshamaa/ar-php?style=social"/></a> <a href="https://twitter.com/arphp"><img src="https://img.shields.io/twitter/follow/arphp?style=social"></a>
<!-- https://shields.io/ -->

<img align="left" width="256" height="256" src="https://raw.githubusercontent.com/khaled-alshamaa/ar-php/master/ar-php_256.png">

# مشروع PHP واللغة العربية ([ar-php.org](http://www.ar-php.org/en_index-php-arabic.html))
#### _لغة PHP تتحدث العربية - كن مستعدا!_
_حقوق النشر © 2006-2023 خالد الشمعة._

[![DOI](https://zenodo.org/badge/231197063.svg)](https://zenodo.org/badge/latestdoi/231197063)

[English](https://github.com/khaled-alshamaa/ar-php/blob/master/README.md)
  
### المهمة والرؤيا
كما حدث في الشرق الأقصى وأمريكا اللاتينية، كلما اتجهت الإنترنت إلى الجماهير، أرادها الناس بلغتهم الأصلية.

مهمتنا هي تطوير حلول مفتوحة المصدر وتقديم دعم احترافي لمساعدة الشركات الصغيرة والمتوسطة في مواجهة التحديات التي ترافق تطوير مواقع عربية احترافية بلغة PHP وقاعدة MySQL للبيانات، حيث تساعد المكتبة التي نطورها شركائنا على اختصار الزمن وزيادة الفعالية.

يقدم هذا المشروع مجموعة من الأدوات التي تمكن مطوري المواقع العربية من تقديم بحث وعرض ومعالجة احترافية للمحتوى العربي بلغة PHP.

> [تنصيب سهل](#مدخل-سريع)

> [لائحة بأهم الوظائف](#الوظائف-الرئيسية) 

> [سجل التعديلات](https://github.com/khaled-alshamaa/ar-php/blob/master/CHANGELOG.md)

> [التوثيق](https://ar-php.org/github/docs/classes/ArPHP-I18N-Arabic.html)

> [الانتقال من الإصدار 4.0](https://github.com/khaled-alshamaa/ar-php/blob/master/UPGRADE.md)

> [الترتيبات اللوجستية للمساهمين](https://github.com/khaled-alshamaa/ar-php/blob/master/TODO.md)

> [كيف تساهم؟](#كيف-تساهم)

> [دعم احترافي](#الدعم-الاحترافي)

### الاقتباس

إذا رغبت في الإشارة إلى مكتبة PHP واللغة العربية في عمل أكاديمي، يمكنك استخدام الاقتباس التالي:

<div dir="ltr" align="left">
  
```
K. Al-Shamaa, Ar-PHP, PHP library for website developers to process Arabic content, 
https://github.com/khaled-alshamaa/ar-php, 2023
```

</div>

أو باستخدام صيغة bibtex

<div dir="ltr" align="left">
  
```latex
@misc{ar-php,
  title={Ar-PHP, PHP library for website developers to process Arabic content},
  author={Al-Shamaa, Khaled},
  url={https://github.com/khaled-alshamaa/ar-php},
  version = {6.3.4},
  year={2023}
}
```
  
</div>

### أين تم استخدامه؟

برنامج [Akeneo](https://www.akeneo.com/): برمجية حرّة مفتوحة المصدر سهلة ومرنة لتنظيم وإثراء كتالوج منتجاتك. حزمة لارافل للتجارة الإلكترونية. [تحقق من ذلك [هنا](https://github.com/akeneo/pim-community-dev/blob/master/src/Akeneo/Pim/Enrichment/Bundle/PdfGeneration/HtmlFormatter/ArabicHtmlFormatter.php)] 

برنامج [Bagisto](https://www.bagisto.com/): حزمة لارافل للتجارة الإلكترونية. [تحقق من ذلك [هنا](https://github.com/bagisto/bagisto/blob/bf1c3f21af912800ffad5dcf68b9a486af0f6c81/packages/Webkul/Admin/src/Http/Controllers/Sales/InvoiceController.php#L159)]

برنامج [LimeSurvey](https://www.limesurvey.org/): برمجية استبيان مفتوحة المصدر. 
[تحقق من ذلك [هنا](https://github.com/LimeSurvey/LimeSurvey/blob/master/application/helpers/userstatistics_helper.php#L135) و 
[هنا](https://github.com/LimeSurvey/LimeSurvey/blob/master/application/helpers/admin/statistics_helper.php#L134)]


### اللغة العربية
لقد نما استخدام الإنترنت على المستوى العالمي بشكل هائل خلال الأعوام القليلة الماضية، وكان هذا النمو أسرع في المناطق غير الناطقة باللغة الإنجليزية وبالذات في العالم العربي. فعلى سبيل المثال، لقد نمى عدد مستخدمي الإنترنت في الشرق الأوسط بين عامي 2000 و 2020 بنسبة 9300%، في حين يقدر أن حجم المحتوى العربي على شبكة الويب يتضاعف في كل عام. إن مثل هكذا نمو أوجد حاجة إلى مصادر برمجية تساعد في تطوير مواقع الويب باللغة العربية. على كل حال، فإن مصادر تطوير مواقع الويب المتوفرة ربما لا تكون ملائمة لأنها طورت أساسا لخدمة المستخدمين الناطقين باللغة الإنجليزية.

[[اللغة العربية](https://en.wikipedia.org/wiki/Arabic)، [تقرير](https://www.internetworldstats.com/stats7.htm)]

### PHP
PHP هي لغة نصية واسعة الاستخدام وعامة الأغراض، وهي ملائمة بشكل خاص لعمليات تطوير مواقع الويب حيث يمكن تضمينها داخل شيفرة HTML. تستخدم لغة PHP في تشغيل أكثر من 79% من أعلى 10 ملايين موقع على مستوى العالم منها الفيسبوك والويكيبيديا.

[[لغة PHP](https://www.php.net/)، [تقرير](https://w3techs.com/technologies/overview/programming_language)]

### LGPL
الفارق الأساس فيما بين ترخيص GPL وترخيص LGPL هو أن هذا الأخير يمكن ربطه (وفي حالة المكتبات "استخدامه بواسطة") ببرامج لا تخضع لأي من الترخيصين GPL و LGPL، والتي يمكن أن تكون برامج حرة مفتوحة المصدر أو حتى برمجيات مغلقة المصدر. ويمكن إعادة توزيع هذه البرمجيات غير الخاضعة للترخيصين GPL و LGPL تحت أي شروط مختارة طالما أنها ليست عملا مشتقا منها.

[[ترخيص LGPL](http://www.gnu.org/licenses/lgpl-3.0.html)، [أسئلة GPL الشائعة](http://www.gnu.org/licenses/gpl-faq.html)]

### لمحة تاريخية

<a href="https://darshoaa.com/pHP-and-Arabic-language/"><img align="left" width="171" height="256" src="https://user-images.githubusercontent.com/11270404/129626204-d354e794-bfbf-4f3c-bc22-27e7fc252701.png" border="0"></a>

* الإصدار 7 من PHP على [GitHub.com](https://github.com/khaled-alshamaa/ar-php) بداية من عام 2020.
* الإصدار 5 من PHP على [SourceForge.net](https://sourceforge.net/projects/ar-php/) 2008-2016.
* الإصدار 4 من PHP على [PHPClasses.org](https://www.phpclasses.org/browse/author/189864.html) 2006-2008.

[![محاضرة افتتاحية عن تجربة بناء ادوات لدعم اللغة العربية و المشاريع مفتوحة المصدر - خالد الشمعة](https://img.youtube.com/vi/P4zV1Iu5QcE/0.jpg)](https://www.youtube.com/watch?v=P4zV1Iu5QcE)
  
[Top](#مشروع-php-واللغة-العربية-ar-phporg)

## _مدخل سريع_

### التثبيت باستخدام Composer

للتثبيت باستخدام [Composer](https://getcomposer.org/)، قم بطلب الإصدار الأحدث من هذه الحزمة.

<div dir="ltr" align="left">
  
```bash
composer require khaled.alshamaa/ar-php
```
  
</div>

تأكد من أن ملف التحميل الآلي الخاص بأداة Composer يتم تحميله. *لن تحتاج إلى أمر كهذا إن كنت تستخدم composer autoloading كا هو معمول في إطار عمل لارافل.*

<div dir="ltr" align="left">
  
```php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';
```
  
</div>

### التنزيل والتثبيت اليدوي

قم بتنزيل [الإصدار الأحدث](https://github.com/khaled-alshamaa/ar-php/releases/latest) من مكتبة PHP واللغة العربية وفك ضغطه ضمن المجلد الذي ستسخدمه فيه.

<div dir="ltr" align="left">
  
```php
require_once 'ar-php/src/Arabic.php';
```
  
</div>

### الوظائف الرئيسية
* تحليل مشاعر النص العربي ([مثال 1](https://ar-php.org/github/examples/ar_sentiment.php)، [مثال 2](https://ar-php.org/github/examples/ar_sentiment.html))
* الترجمة اللفظية بين اللغتين العربية والإنجليزية ([مثال 1](https://ar-php.org/github/examples/ar_transliteration.php)، [مثال 2](https://ar-php.org/github/examples/en_transliteration.php))
* التفقيط: كتابة الأرقام بالعربية ([مثال](https://ar-php.org/github/examples/numbers.php))
* معالجة إظهار الحروف العربية المتصلة ([مثال](https://ar-php.org/github/examples/ar_glyphs.php))
* تغيير لغة لوحة المفاتيح برمجيا ([مثال](https://ar-php.org/github/examples/keyswap.php))
* التشابه اللفظي للكلمات العربية ([مثال](https://ar-php.org/github/examples/soundex.php))
* تخمين جنس الأسماء العربية ([مثال](https://ar-php.org/github/examples/gender.php))
* البحث المتقدم بالعربية (بدلالة ساق الكلمة) ([مثال](https://ar-php.org/github/examples/ar_query.php))
* حساب أوقات صلاة المسلمين واتجاه القبلة ([مثال](https://ar-php.org/github/examples/salat.php))
* عرض التواريخ بالعربية أو الهجرية ([مثال](https://ar-php.org/github/examples/date.php))
* تحويل التاريخ الهجري إلى Uinx timestamp ([مثال](https://ar-php.org/github/examples/mktime.php))
* تحويل أي نص عربي يصف التاريخ إلى Unix timestamp ([مثال](https://ar-php.org/github/examples/strtotime.php))
* تنسيق النصوص العربية ([مثال](https://ar-php.org/github/examples/standard.php))
* التلخيص الآلي للنص العربي ([مثال](https://ar-php.org/github/examples/ar_summarize.php))
* تحديد النصوص العربية في الوثائق متعددة اللغات ([مثال](https://ar-php.org/github/examples/identifier.php))

[Top](#مشروع-php-واللغة-العربية-ar-phporg)

## _كيف تساهم؟_
نحن نرحب دوما بالمساهمين الجدد - خصوصا المبرمجين منهم. لكن بغض النظر عن مهاراتك واهتماماتك، هنالك دوما مجال لمساهمتك في تطوير مشروع Ar-PHP:

* __برمجة:__ فيما يلي بعض الأفكار للمساهمة: مراجعة قائمة المهام، إضافة ميزة جديدة، المساهمة في الوحدة المركزية، بناء إضافة، تصحيح الأخطاء.
* __ضبط الجودة:__ يعتبر ضبط الجودة أحد أهم مقومات نجاح أي مشروع برمجي. كما أن الاشتراك بهذا النشاط في متناول أي شخص. إن أردت المساعدة في تنقيح أخطاء Ar-PHP، ولم تكن مبرمجا، فلا يزال باستطاعتك المساعدة من خلال الإنضمام إلى فريق ضبط الجودة.
* __الكتابة:__ إحدى أفضل الأساليب للمساهمة في مشروع Ar-PHP هو كتابة الدروس التعليمية أو أدلة الاستخدام أو خطوات التطبيق أو الأسئلة الشائعة. فيما يلي بعض الأفكار للمساهمة: أسئلة المستخدمين المتكررة، الدروس التعليمية وخطوات التطبيق، دليل المستخدم، دليل المطور، نشر تدوينات، أو مقالة لمجلة.
* __التسويق:__ يمكنك دوما المساعدة في إشهار ونشر استخدام Ar-PHP، فيما يلي بعض الطرق للمساعدة في ذلك: انضم إلى فريق التسويق، توزيع Ar-PHP، نشرة حول مشروع Ar-PHP.
* __الفن والرسوميات:__ هل لديك أي مهارات فنية؟ إذن باستطاعتك مساعدتنا من خلال تصميم الأيقونات والشعارات والأشرطة الدعائية وخلفيات الشاشة إضافة إلى شاشات التوقف وغيرها الكثير! إن مثل هذه المساهمات ستكون ظاهرة للعيان بشكل يومي ومستخدمة في المشروع ومنتجاته.
* __مساعدة المستخدمين:__ هنالك طريقتين باستطاعتك مساعدة غيرك من المستخدمين من خلالهما هما قوائم البريد الإلكتروني للمستخدمين والمنتديات.
* __احتفل معنا!__ مهمتك هي أخذ صورة لك وأنت تدعم مشروع PHP واللغة العربية. يمكنك الذهاب إلى موقع شهير، أو مكانك المفضل في الجوار، أو أي مكان تعتقد أنه موقع مناسب لصورة ناجحة. قمنا بإنشاء بعض الملصقات الإعلانية من أجلك لتستخدمها في صورك. قم بطباعة إحدى هذه التصاميم أو قم باستخدام التصميم الخاص بك. نحن نرغب في رؤيتك أنت وموقعك بشكل واضح في الصورة، لذا لا تدع أي من هذين العنصرين يطغى على الصورة. كما يجب أن نرى أيضا الملصق الإعلاني للمشروع. حالما تكون صورك جاهزة، أرسلهم لنا بالبريد الإلكتروني. رجاء أرسل صورك بتنسيق jpg أو png وبحجم 1200 x 800 بيكسل على الأقل.

[Top](#مشروع-php-واللغة-العربية-ar-phporg)

## _الدعم الاحترافي_
كوننا مطوري مشروع PHP واللغة العربية، فباستطاعتنا مساعدة شركتك على استخلاص أقصى الإمكانيات من مكتبة Ar-PHP في خدمة أهداف أعمالك. نحن نقدم خدمات إحترافية تغطي كامل مراحل استثمار مكتبة Ar-PHP.

* __دمج مكتبة Ar-PHP:__ هل تواجه مشاكل في بدء استخدام مكتبة Ar-PHP؟ باستطاعتنا مساعدتك.
* __ترقية Ar-PHP:__ دعنا نساعدك من أجل القيام بترقية سلسة إلى آخر إصدار من مكتبة Ar-PHP.
* __إعداد وتخصيص:__ إن احتاجت أعمالك إلى وظائف تتجاوز أو تختلف عن مجموعة المزايا التي يقدمها مشروع Ar-PHP حاليا، ففريق عملنا من خبراء PHP واللغة العربية باستطاعتهم تفصيل Ar-PHP لتطابق تماما الاحتياجات المحددة لأعمالك.
* __دمج وتطبيق:__ قد يكون توطين اللغة العربية مجرد جزء من طيف أعمالك على الإنترنت. نحن نمتلك المعرفة والخبرة لدمج خدمات مكتبة Ar-PHP بكل فروع أعمالك.
* __حل المشاكل والمعايرة لأفضل أداء:__ لزيادة الأداء والخروج من عنق الزجاجة، اسمح لخبراء Ar-PHP بالنظر إلى ما هو تحت القبعة ورؤية طريقة استخدامك لمكتبة Ar-PHP وبيئة المخدم التي لديك.
* __إستشارة:__ باستطاعتك الاتصال بنا طلبا للاستشارة في أي وقت من استخدامك لمكتبة Ar-PHP. لدينا الخبرة في Ar-PHP للتأكد من كون طريقة استثمارك لهذه المكتبة تطبق أفضل الممارسات العملية في هذا المجال.
* __تدريب:__ إحصل على تدريب شامل على Ar-PHP.

[Top](#مشروع-php-واللغة-العربية-ar-phporg)

<!-- If you find this project useful, please consider making a donation. Any funds donated will be used to help further development on this project. -->
  </div>
