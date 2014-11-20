FatFree-Helpers
===============

FatFree Helpers


Simple usage:

routes.ini
```
[routes]
GET|POST @home: / = IndexController->indexAction
GET|POST @articles: /articles/@id = IndexController->indexAction
```

PHP code to create FatFree URL based on route definition
```
$f3->config(__DIR__ . '/routes.ini');
$url = new \FatFree\Helpers\Url($f3);
echo $url->get('home');
```
