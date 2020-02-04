## To-Do List
* PSR-4: [Autoloading Standard](https://www.php-fig.org/psr/psr-4/).

* PSR-5: [PHPDoc Standard](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md).

* Error handle, convert into exceptions (set_error_handler: try/catch)!

* Enhance example scripts by call the following functions: 

	_arSummaryLoadExtra, dms2dd, setQueryArrFields, setSoundexCode, setSoundexLang, setSoundexLen, swapAf._

* Add function dd2dms.

* Use JSON instead of XML for data files for better performance.

* Replace foreach loop by array functions (map, filter, walk, etc) whenever possible.

* Use switch statements instead of else if and multi if statements.

* Writing $row[’id’] processes 7 times faster than $row[id] ;-)

* Stick with single quotes whenever possible.

* Since === only checks for a closed range, it is faster than using == for comparisons.

* While str_replace is faster than preg_replace, the strtr function is four times faster than str_replace.

## Good Resources
* [PHP Framework Interop Group](https://www.php-fig.org/).
* [PHP - The Right Way](https://phptherightway.com/).
* [PHP - The Wrong Way](https://phpthewrongway.com/).

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
