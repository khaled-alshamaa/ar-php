## To-Do List
* PSR-4: [Autoloading Standard](https://www.php-fig.org/psr/psr-4/).

* PSR-5: [PHPDoc Standard](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md).

* Error handle, convert into exceptions (set_error_handler: try/catch)!

* Enhance example scripts by call the following functions: 

	_arSummaryLoadExtra, dms2dd, setQueryArrFields, setSoundexCode, setSoundexLang, setSoundexLen, swapAf, arabizi._

* Add function dd2dms.

* Replace foreach loop by array functions (map, filter, walk, etc) whenever possible.

* Use switch statements instead of else if and multi if statements.

* Writing $row[’id’] processes 7 times faster than $row[id] ;-)

* Stick with single quotes whenever possible.

* Since === only checks for a closed range, it is faster than using == for comparisons.

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

phpcs arabic.php --standard=PSR1
phpcs arabic.php --standard=PSR12
```

Get [PHP Compatibility Coding Standard](https://github.com/PHPCompatibility/PHPCompatibility) for PHP CodeSniffer by download the latest release from [here](https://github.com/PHPCompatibility/PHPCompatibility/releases), then unzip it into an arbitrary directory (e.g. inside c:\XAMPP).

```bash
phpcs --config-set installed_paths C:\xampp\PHPCompatibility

phpcs -p arabic.php --standard=PHPCompatibility --runtime-set testVersion 5.3-
```

### _Insphpect: Smarter code reviews_
[Insphpect](https://insphpect.com/) is an automated code review tool which identifies inflexibilities in PHP code and helps you write better software.

### _PHP Archive (phar)_

The [phar](https://www.php.net/manual/en/intro.phar.php) extension provides a way to put entire PHP applications into a single file called a "phar" (PHP Archive) for easy distribution and installation.

In  order to create and modify Phar files, the _php.ini_ setting `phar.readonly` must be set to __Off__, then we have to change the first line in the Arabic **__construct** method to set the root directory private property in a proper way:

```php
$this->rootDirectory = 'phar://ArPHP.phar';
```

Instead of the following original line of code:

```php
$this->rootDirectory = dirname(__FILE__);
``` 

After this small change, we can create the "ArPHP.phar" file using the following code:

```php
$p = new Phar('ArPHP.phar', 0, 'ArPHP.phar');

$p->startBuffering();

$p->buildFromDirectory('\path\to\ArPHP\src');

$p->stopBuffering();
```

Finally, you can include this library into your script like this:

```php
require 'phar://path/to/ArPHP.phar/arabic.php';

$obj = new \ArPHP\I18N\Arabic();

echo $obj->version;
echo $obj->int2str(1975);
```

### _Simple PHP Minifier_

Strip comments, whitespaces, and preserve newlines. Compressed library file is ideal for production environments since it typically reduce the size of the file by ~50%.

You can use the following [sed](https://www.gnu.org/software/sed/) (Linux stream editor) command to create a minified version of `arabic.php` main script:

```bash
sed "/^\s*\*/d" arabic.php | sed "/^\s*\/\//d" | sed "/^\s*\/\*/d" | sed "/^\s*$/d" | sed -e "s/\s*=\s*/=/g" | sed -e "s/^\s*//g" > arabic.min.php
```

### _phpDocumentor_
[phpDocumentor](https://www.phpdoc.org/) analyzes your code to create great documentation.
Install it as a PHAR file format, all you need to do is download the phar binary from [here](http://phpdoc.org/phpDocumentor.phar), then save it in an arbitrary directory (e.g. inside c:\XAMPP).

```bash
php C:\xampp\phpDocumentor.phar -f arabic.php -t ../docs/
``` 

### _Benchmarking Tool_

[ab](https://httpd.apache.org/docs/current/programs/ab.html) is a tool for benchmarking your Apache Hyper-Text Transfer Protocol (HTTP) server. This especially shows you how many requests per second your script on current Apache installation is capable of serving. 

The following command line shows an example call of 1000 requests for numbers test code (50 requests in concurrency) and report related stats:

```bash
\path\to\apache\bin\ab -n 1000 -c 50 http://localhost/ar-php/tests/numbers.php
```   
