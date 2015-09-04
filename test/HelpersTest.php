<?php
ERROR_REPORTING(E_ALL);

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . "/../vendor/bcosca/fatfree/lib/base.php");
require_once(__DIR__ . '/../FatFree/Helpers/Url.php');
require_once(__DIR__ . '/../FatFree/Helpers/ModelMethodsHelper.php');

class HelpersTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var view
     */
    protected $url;

    public function __construct()
    {
        F3::config(__DIR__ . '/routes.ini');
        $this->url = new FatFree\Helpers\Url(F3::instance());
    }

    public function testUrl()
    {
        $this->assertEquals('/',$this->url->get('home'));
    }

    public function testGetModelName()
    {
        $modelMethods = new FatFree\Helpers\ModelMethodsHelper();
        $this->assertEquals('FatFree\Helpers\ModelMethodsHelper',$modelMethods->getModelName());
    }

}