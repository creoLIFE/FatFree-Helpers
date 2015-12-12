<?php
ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
date_default_timezone_set('UTC');

use FatFree\Helpers\Url;
use FatFree\Helpers\RouterHelper;

class HelpersTest extends PHPUnit_Framework_TestCase
{
    private $f3;
    private $urlHelper;
    private $routerHelper;

    public function __construct()
    {
        $this->f3 = \F3::instance();
        $this->f3->config(__DIR__ . '/routes.ini');

        //Set test alias for routerHelper test
        $this->f3->set('ALIAS', 'showArticle');

        $this->urlHelper = new Url($this->f3);
        $this->routerHelper = new RouterHelper($this->f3);
    }

    public function testUrl()
    {
        $this->assertEquals('/', $this->urlHelper->get('home'));
    }

    public function testGetModelName()
    {
        $modelMethods = new FatFree\Helpers\ModelMethodsHelper();
        $this->assertEquals('FatFree\Helpers\ModelMethodsHelper', $modelMethods->getModelName());
    }

    public function testGetRouterAction()
    {
        $this->assertEquals('showAction', $this->routerHelper->getAction());
    }

}