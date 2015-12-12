<?php
ERROR_REPORTING(E_ALL);

require_once( __DIR__ . '/../vendor/autoload.php');
require_once( __DIR__ . '/../FatFree/Helpers/RouterHelper.php');

$f3 = \Base::instance();
$f3->config(__DIR__ . '/routes.ini');

//Set alias
$f3->set('ALIAS', 'showArticle');


$routerHelper = new \FatFree\Helpers\RouterHelper($f3);

echo "<pre>";
print_r($routerHelper);


