<?php
set_include_path('/Users/robbin/Documents/www/trunk/vendor/beangen/');
require "/Users/robbin/Documents/www/trunk/vendor/beangen/./lib/Parse.php";
use beangen\lib\Parse;

$configFile = "/Users/robbin/Documents/www/trunk/vendor/beangen/./config/bill.php";
$parse = new Parse($configFile);
$parse->parseConfig();
$parse->writeFile('/Users/robbin/Documents/www/trunk/vendor/beangen/');
