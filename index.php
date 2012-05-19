<?php
require "./lib/Parse.php";

$configFile = "./config/bill.php";
$parse = new Parse($configFile);
$parse->parseConfig();
$parse->writeFile();
