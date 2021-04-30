## To-Do List
* Develop an Arabic version of the PHP [similar_text](https://www.php.net/manual/en/function.similar-text.php) function to handle Harakat issue properly.

* [Setup PHP in GitHub Actions](https://github.com/marketplace/actions/setup-php-action) for CI/CD (e.g. [php-actions/phpunit](https://github.com/php-actions/example-phpunit)).

* Insure coding standards in Documentation ([PSR-5](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md)).

* Improve error handling by the switch to exceptions (set_error_handler: try/catch)!

* Enhance example scripts by call the following methods: _arSummaryLoadExtra, setQueryArrFields, swapAf, arabizi, dms2dd, dd2dms, dd2olc, olc2dd._

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

Create and push a new release tag:

```bash
git tag -a v5.0 -m "Ar-PHP Version 5.0"
git push --tags
```

Create and push a new branch:

```bash
git clone https://github.com/owner/reposatory
git pull origin master

git branch
git checkout -b newbranch

git add .
git commit -m "modify in branch"
git push origin newbranch
```

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


### _Extra Utilities for Code Reviews_
* [Insphpect](https://insphpect.com/) is an automated code review tool which identifies inflexibilities in PHP code and helps you write better software.
* [PHPStan](https://phpstan.org/) is a PHP static analysis tool finds bugs In your code without writing tests! 

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
