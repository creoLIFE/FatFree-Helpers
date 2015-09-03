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

class Url
{

    /**
     * @const [array] - Standard escape
     */
    const WORD_SEPARATOR = '-';
    const ESCAPE_STANDARD = '\s_\'';

    /**
     * @var [\Base] - F3 instance
     */
    protected $f3;

    /**
     * Class constructor
     * @param [\Base] - instance of $f3
     */
    public function __construct(\Base $f3)
    {
        $this->f3 = $f3;
    }

    /**
     * Method will get url base on given route allias and params
     * @param [string] $routeName
     * @param [array] $params
     * @return [string]
     */
    public function get($routeName, $params = array())
    {
        $u = $this->f3->get("ALIASES.$routeName");
        foreach ($params as $k => $v) {
            if (strpos($u, "@$k")) {
                $u = str_replace("@$k", $v, $u);
            }
        }
        if (strpos($u, "@")) {
            Throw new \Exception("You must provide valid parameters to route '$routeName'!");
        }
        return $u && !strpos($u, "@") ? $u : '#';
    }


    /**
     * Method will convert all local characters to unifed once.
     * @param [string] $str - string to convert
     * @param [array] $replace - replacements
     * @param [string] $delimeter
     * @return [string]
     */
    private function toAscii($str, $replace = array(), $delimiter = self::WORD_SEPARATOR)
    {
        setlocale(LC_ALL, 'en_US.UTF8');
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

}