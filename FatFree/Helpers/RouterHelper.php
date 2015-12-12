<?php
/**
 * FatFree Url Helper
 * @package FatFree\Helpers
 * @copyright Copyright (c) 2006-2014 creoLIFE
 * @author Mirek Ratman
 * @version 1.0
 * @since 2014-11-01
 * @license The MIT License (MIT), Copyright (c) 2014 creoLIFE Miroslaw Ratman, Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace FatFree\Helpers;

class RouterHelper
{

    /**
     * @var string
     */
    private $alias = null;

    /**
     * @var string
     */
    private $route = null;

    /**
     * @var string
     */
    private $controller = null;

    /**
     * @var string
     */
    private $action = null;

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Class constructor
     * @param [\Base] - instance of $f3
     */
    public function __construct(\Base $f3)
    {
        $this->setAlias($f3->get("ALIAS"));

        if ($this->getAlias()) {
            $this->setRoute($f3->get("ALIASES." . $f3->get("ALIAS")));

            if ($f3->get('ROUTES')[$this->getRoute()]) {
                //set local routes var
                $route = array_values($f3->get('ROUTES')[$this->getRoute()]);

                //get route details
                if (isset($route[0]) && isset($route[0][$f3->get('VERB')])) {
                    $routeDetails = $route[0][$f3->get('VERB')];
                    if (isset($routeDetails[0])) {
                        $this->setController(explode('->', $routeDetails[0])[0]);
                        $this->setAction(explode('->', $routeDetails[0])[1]);
                    }
                }
            }
        }
    }

}