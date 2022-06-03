## NLP Toolkit for Arabic Language
* Detect Dialect (e.g., 'انا هاخد ده لو سمحت' -> ['Egypt', 0.984]).

* Detect Emotion (e.g., 'الله عليكي و انتي دائما مفرحانا' -> ['happy', 0.879]).

* Detect Gender  (e.g., 'الله عليكي و انتي دائما مفرحانا' -> ['female', 0.926]).

* Name-Entity Recognition: Recognise whether a word represents a person, location or names in the text.

* Text Classification / Topic Categories: Classifying text based on the criteria (e.g., Toxic-words and Hate-speech filtering).

## To-Do List
* Develop an Arabic version of the PHP [similar_text](https://www.php.net/manual/en/function.similar-text.php) function to handle Harakat issue properly.

* [ALA-LC Arabic Romanization](https://www.loc.gov/catdir/cpso/romanization/arabic.pdf) and test it via http://romanize-arabic.camel-lab.com/.

* [Setup PHP in GitHub Actions](https://github.com/marketplace/actions/setup-php-action) for CI/CD (e.g. [php-actions/phpunit](https://github.com/php-actions/example-phpunit)).

* Insure coding standards in Documentation ([PSR-5](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md)).

* Improve error handling by using [exceptions](https://www.php.net/manual/en/language.exceptions.php) as [@atmonshi](https://github.com/atmonshi) suggested in [this pull request](https://github.com/khaled-alshamaa/ar-php/pull/10), update related phpdoc by adding [@throws](https://docs.phpdoc.org/3.0/guide/references/phpdoc/tags/throws.html) tag. We may extend the general exception class like this: `class ArphpException extends Exception { }`, then we can throw an exception like this: `throw new ArphpException('Customized error message');`

* Enhance example scripts by call the following methods: _arSummaryLoadExtra, setQueryArrFields, swapAf, arabizi, dms2dd, dd2dms, dd2olc, olc2dd._

* Use degree modifiers to alter sentiment intensity (e.g., intensity boosters such as "very" and intensity dampeners such as "kind of").

### _Performance Improvement Tips (lessons learned)_
* json_decode parser is faster than SimpleXML since JSON is only a description of nested string sequences, without the need to offer a DOM interface and attributes parsing.

* If you use array_push() to add one element to the array it's better to use $array[] = because in that way there is no overhead of calling a function.

* Set internal character encoding before call any MBstring functions is much faster than pass encoding parameter if you are using PHP version < 7.3! ([bug report](https://bugs.php.net/bug.php?id=74933))

* Replace foreach loop by array functions (map, filter, walk, etc) whenever possible.

* Writing $row[’id’] processes 7 times faster than $row[id] ;-)

* While str_replace is faster than preg_replace, the strtr function is four times faster than str_replace.

## Good Resources
* [PHP Framework Interop Group](https://www.php-fig.org/)
* [PHP - The Right Way](https://phptherightway.com/)
* [PHP - The Wrong Way](https://phpthewrongway.com/)

## Logistics

### _Git and GitHub_
Download/install Git from [git-scm.com](https://git-scm.com/downloads), then inside your project folder, right click, Git Bash here.

> We start using [GitHub Desktop](https://desktop.github.com/) to make interactions with Git and GitHub easier and more productive. We made this decision because of the token authentication requirements for Git operations announced by GitHub.com in [July 2020](https://github.blog/2020-07-30-token-authentication-requirements-for-api-and-git-operations/) (Please note that GitHub.com will no longer accept account passwords beginning of [August 13, 2021](https://github.blog/2020-12-15-token-authentication-requirements-for-git-operations/)).

Import a new project repository hosted on GitHub.com (e.g. owner/reposatory):

```bash
git init
git config --global user.name "Your Name"
git config --global user.email "email@example.com"

git remote add origin https://github.com/owner/reposatory
git pull origin master
```

Create and push a new commit:

```bash
git add .
git commit -m "modification message"
git pull origin master
git push origin master
```

> _You can include #xxx in your commit message to reference/link it to the issue number on GitHub._

### _Composer and Packagist_
[Composer](https://getcomposer.org/): A Dependency Manager for PHP. 
Download and install the Composer-Setup.exe from [here](https://getcomposer.org/download/).

[Packagist](https://packagist.org/): The PHP Package Repository.

### _PHP Code Sniffer_
Check for standards and compatibility using [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).

```bash
composer global require squizlabs/php_codesniffer --dev

phpcs Arabic.php --standard=PSR1
phpcs Arabic.php --standard=PSR12
```

> __Note:__ You can use the `phpcbf` command to automatically correct coding standard violations when possible.
> ```bash
> phpcbf Arabic.php --standard=PSR1
> phpcbf Arabic.php --standard=PSR12
> ```

Get [PHP Compatibility Coding Standard](https://github.com/PHPCompatibility/PHPCompatibility) for PHP CodeSniffer by download the latest release from [here](https://github.com/PHPCompatibility/PHPCompatibility/releases), then unzip it into an arbitrary directory (e.g. inside c:\XAMPP).

```bash
phpcs --config-set installed_paths C:\xampp\PHPCompatibility

phpcs -p Arabic.php --standard=PHPCompatibility --runtime-set testVersion 5.6-
```

### _PHPUnit Testing Framework_
[PHPUnit](https://phpunit.de/) is a programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit testing frameworks.

Simply download the PHAR distribution of PHPUnit 9 from [here](https://phar.phpunit.de/phpunit-9.phar), then copy it inside the root directory of the library.

The following command line will execute all the automated tests:

```bash
php phpunit.phar --bootstrap ./src/Arabic.php --testdox tests
```

### _Xdebug: Debugging tool for PHP_
[Xdebug](https://xdebug.org/) is an extension for PHP to assist with debugging and development. It contains a [profiler](https://xdebug.org/docs/profiler) and provides [code coverage](https://xdebug.org/docs/code_coverage) functionality for use with PHPUnit. Follow [these instructions](https://xdebug.org/wizard) to get Xdebug installed.

The following command line will telling PHPUnit to include the code coverage report ([more info](https://phpunit.readthedocs.io/en/9.3/code-coverage-analysis.html)):

```bash
php phpunit.phar --bootstrap ./src/Arabic.php --testdox tests --coverage-filter ./src/Arabic.php --coverage-html coverage
```
Setup the Xdebug profiler by add the following lines in the php.ini file:

```bash
xdebug.profiler_enable_trigger = 1
xdebug.profiler_output_dir = \path\to\save\profiles
xdebug.profiler_output_name = callgrind.out.%u.%H_%R
```

You can then selectively enable the profiler by adding "XDEBUG_PROFILE=1" to the example URL, for example:

```bash
http://localhost/ar-php/examples/strtotime.php?XDEBUG_PROFILE=1
```

After a profile information file has been generated you can open it with the [KCacheGrind](https://kcachegrind.github.io/html/Home.html) tool for Linux users or [QCacheGrind](https://sourceforge.net/projects/qcachegrindwin/) for Windows users.

> __Note:__ You can find some nice video tutorials by Derick Rethans the (Xdebug author) available here ([Xdebug 3 Profiling](https://www.youtube.com/watch?v=8yUY063WgDg) and [Analysing Xdebug 3 Profiling Data](https://www.youtube.com/watch?v=iH-hDOuQfcY))

### _PHPStan Static Analysis Tool_

[PHPStan](https://phpstan.org/) is a PHP static analysis tool that finds bugs in your code without writing tests. It catches whole classes of bugs even before you write tests for the code. You can download the latest PHAR distribution of PHPStan from [here](https://github.com/phpstan/phpstan/releases), then copy it inside the root directory of the library.

To let PHPStan analyse your codebase, you have to use the `analyse` command and point it to the right directories. For example, you can run the following command line that checks scripts inside the `src` directory up to rule **level 6** (more about [rule levels](https://phpstan.org/user-guide/rule-levels)):

```bash
php phpstan.phar analyse -l 6 src
```

### _Extra Utilities for Code Reviews_
* [Insphpect](https://insphpect.com/) is an automated code review tool which identifies inflexibilities in PHP code and helps you write better software.


### _PHP Archive (phar)_

The [phar](https://www.php.net/manual/en/intro.phar.php) extension provides a way to put entire PHP applications into a single file called a "phar" (PHP Archive) for easy distribution and installation.

In  order to create and modify Phar files, the _php.ini_ setting `phar.readonly` must be set to __Off__, then we can create the "ArPHP.phar" file using the following code:

```php
$p = new Phar('ArPHP.phar', 0, 'ArPHP.phar');

$p->startBuffering();

$p->buildFromDirectory('\path\to\ArPHP\src');

$p->stopBuffering();
```

Finally, you can include this library into your script like this:

```php
require 'phar://path/to/ArPHP.phar/Arabic.php';

$obj = new \ArPHP\I18N\Arabic();

echo $obj->version;
echo $obj->int2str(1975);
```

### _Simple PHP Minifier_

Strip comments, whitespaces, and preserve newlines. Compressed library file is ideal for production environments since it typically reduce the size of the file by ~50%.

You can use the following [sed](https://www.gnu.org/software/sed/) (Linux stream editor) command to create a minified version of `arabic.php` main script:

```bash
sed "/^\s*\*/d" Arabic.php | sed "/^\s*\/\//d" | sed "/^\s*\/\*/d" | sed "/^\s*$/d" | sed -e "s/\s*=\s*/=/g" | sed -e "s/^\s*//g" > Arabic.min.php
```

### _phpDocumentor_
[phpDocumentor](https://www.phpdoc.org/) analyzes your code to create great documentation.
Install it as a PHAR file format, all you need to do is download the phar binary from [here](http://phpdoc.org/phpDocumentor.phar), then save it in an arbitrary directory (e.g. inside c:\XAMPP).

```bash
php C:\xampp\phpDocumentor.phar -f Arabic.php -t ../docs/ --visibility="public" --title="Ar-PHP"
``` 

### _Benchmarking Tool_

[ab](https://httpd.apache.org/docs/current/programs/ab.html) is a tool for benchmarking your Apache Hyper-Text Transfer Protocol (HTTP) server. This especially shows you how many requests per second your script on current Apache installation is capable of serving. 

The following command line shows an example call of 1000 requests for numbers test code (50 requests in concurrency) and report related stats:

```bash
\path\to\apache\bin\ab -n 1000 -c 50 http://localhost/ar-php/examples/numbers.php
```   

### _Test Against QA Releases (e.g., PHP 8.0 RC2)_

* Get the binary build of PHP (e.g. for Windows: [https://windows.php.net/qa](https://windows.php.net/qa)), then un-zip it in the directory of your choice.

* Rename the "php.ini-development" file to be "php.ini", and then edit it to enable the "mbstring" extension:

```
extension=./ext/php_mbstring.dll
```

* Open your shell (e.g. CMD or PowerShell), change the directory to be inside your unzipped PHP folder, then start the PHP built-in web server (the -t parameter to specify the document root directory):

```bash
php -S localhost:8000 -t C:\xampp\htdocs\
```

> _**Note:** If you get an error message tells you that VC run time is not compatible with this PHP build, then make sure to install the required version of the Microsoft Visual C++ Redistributable package (e.g. for PHP 8.0 you need the Visual Studio 2019 package which can be downloaded from [here](https://visualstudio.microsoft.com/downloads/#microsoft-visual-c-redistributable-for-visual-studio-2019))._

* Open your browser and visit the URL of your script (e.g. http://localhost:8000/ar-php/examples/soundex.php).

### _Carbon: Sharing code examples_

[Carbon](https://carbon.now.sh/?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=vscode&wt=none&l=text%2Fx-php&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=true&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%2524Arabic%2520%253D%2520new%2520%255CArPHP%255CI18N%255CArabic%28%29%253B%250A%250A%2524number%2520%253D%25207.25%253B%250A%2524text%2520%2520%2520%253D%2520%2524Arabic-%253Emoney2str%28%2524number%252C%2520%27KWD%27%252C%2520%27ar%27%29%253B%250A%250Aecho%2520%2524text%253B%2520%252F%252F%2520%25D8%25B3%25D8%25A8%25D8%25B9%25D8%25A9%2520%25D8%25AF%25D9%2586%25D8%25A7%25D9%2586%25D9%258A%25D8%25B1%2520%25D9%2588%2520%25D9%2585%25D8%25A6%25D8%25AA%25D8%25A7%25D9%2586%2520%25D9%2588%2520%25D8%25AE%25D9%2585%25D8%25B3%25D9%2588%25D9%2586%2520%25D9%2581%25D9%2584%25D8%25B3%25D8%25A7) website/service can be used to create and share beautiful images of your source code. Start typing or drop a file into the text area to get started.

Also you can use the [NoPaste snippet](https://nopaste.ml/?l=php#XQAAAQCzAAAAAAAAAAASEEpGEzYNlb/RRmMcH3OypbHqK68xfyVj2/6MRioTOArMdW/HwAcAdukQ77ekAcnzpI3j/UcLCqrmQyQF5CkQ7e6oHfhz7FYdWyNk1gKH9a2qc+uyWWfQTVw/uKaxxosiMuzn7TBs2LA0GOZw8+vz/wA+wQJGVmJfc3yzUvEFXs61NEmOvbQKBpFQEMPNQ+9+Rjgf4XOl/vUxygA=). It is an open-source website similar to Pastebin where you can store any piece of code, and generate links for easy sharing.

### _A Browser-Based VSCode Project Viewer_

There are two options:

1. GitHub is making [Codespaces](https://github.com/features/codespaces) available to Team and Enterprise Cloud plans on github.com. Codespaces provides software teams a faster, more collaborative development environment in the cloud. Have you tried github.dev yet (i.e., change the GitHub URL from ".com" to ".dev")? Just press the dot key ;-)

2. Github1s explore GitHub source code right on the "web" version of VSCode simply by adding 1s after GitHub in the URL, for example: https://github1s.com/khaled-alshamaa/ar-php/blob/HEAD/src/Arabic.php

