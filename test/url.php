<?php
ERROR_REPORTING(E_ALL);

require_once( __DIR__ . '/../vendor/autoload.php');
$f3 = require (__DIR__ . "/../vendor/bcosca/fatfree/lib/base.php");
require_once( __DIR__ . '/../FatFree/Helpers/Url.php');

$f3->config(__DIR__ . '/routes.ini');

$url = new \FatFree\Helpers\Url($f3);

echo $url->get('home');
echo "<br/>\n";
echo $url->get('articles', array('id'=>4223));
