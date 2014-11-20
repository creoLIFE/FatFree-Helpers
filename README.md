FatFree-Helpers
===============

FatFree Helpers to simplify your work ;)


## URL Helper

Simple usage of URL Helper:

### routes.ini
```
[routes]
GET|POST @home: / = IndexController->indexAction
GET|POST @articles: /articles/@id = IndexController->indexAction
```

### PHP code to create FatFree URL based on route definition
```
$f3->config(__DIR__ . '/routes.ini');
$url = new \FatFree\Helpers\Url($f3);
echo $url->get('home');
```
