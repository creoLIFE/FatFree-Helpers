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
     * @param string $routeName
     * @param array $params
     * @param bool $useGetParams - read and use GET params from current URL in browser
     * @param bool $cleanString
     * @return mixed|string
     * @throws \Exception
     */
    public function get($routeName, $params = array(), $useGetParams = false, $cleanString = true)
    {
        $hive = $this->f3->hive();
        $u = $hive["ALIASES"][$routeName];
        foreach ($params as $k => $v) {
            if (strpos($u, "@$k")) {
                $str = $cleanString ? self::cleanString($v) : $v;
                $u = str_replace("@$k", $str, $u);
            }
        }
        if (strpos($u, "@")) {
            Throw new \Exception("You must provide valid parameters to route '$routeName'!");
        }
        $u = $u && !strpos($u, "@") ? $u : '#';

        return $useGetParams ? sprintf('%s%s',
            $u,
            self::getUrlParams($cleanString)
        ) : $u;
    }

    /**
     * Method will clean string from strange characters for SEO friendly URLs
     * @param string $string
     * @return mixed
     */
    private function cleanString($string)
    {
        //cyrylic transcription
        $cyrylicFrom = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
        $cyrylicTo = ['A', 'B', 'W', 'G', 'D', 'Ie', 'Io', 'Z', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Ch', 'C', 'Tch', 'Sh', 'Shtch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'w', 'g', 'd', 'ie', 'io', 'z', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'ch', 'c', 'tch', 'sh', 'shtch', '', 'y', '', 'e', 'iu', 'ia'];

        $strFrom = ["Á", "À", "Â", "Ä", "A", "A", "Ã", "Å", "A", "Æ", "C", "C", "C", "C", "Ç", "D", "Ð", "Ð", "É", "È", "E", "Ê", "Ë", "E", "E", "E", "?", "G", "G", "G", "G", "á", "à", "â", "ä", "a", "a", "ã", "å", "a", "æ", "c", "c", "c", "c", "ç", "d", "d", "ð", "é", "è", "e", "ê", "ë", "e", "e", "e", "?", "g", "g", "g", "g", "H", "H", "I", "Í", "Ì", "I", "Î", "Ï", "I", "I", "?", "J", "K", "L", "L", "N", "N", "Ñ", "N", "Ó", "Ò", "Ô", "Ö", "Õ", "O", "Ø", "O", "Œ", "h", "h", "i", "í", "ì", "i", "î", "ï", "i", "i", "?", "j", "k", "l", "l", "n", "n", "ñ", "n", "ó", "ò", "ô", "ö", "õ", "o", "ø", "o", "œ", "R", "R", "S", "S", "Š", "S", "T", "T", "Þ", "Ú", "Ù", "Û", "Ü", "U", "U", "U", "U", "U", "U", "W", "Ý", "Y", "Ÿ", "Z", "Z", "Ž", "r", "r", "s", "s", "š", "s", "ß", "t", "t", "þ", "ú", "ù", "û", "ü", "u", "u", "u", "u", "u", "u", "w", "ý", "y", "ÿ", "z", "z", "ž"];
        $strTo = ["A", "A", "A", "A", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "a", "a", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "O", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "o", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "B", "t", "t", "b", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z"];

        $from = array_merge($strFrom, $cyrylicFrom);
        $to = array_merge($strTo, $cyrylicTo);

        $clean = str_replace($from, $to, $string);

        $clean = preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($clean));
        $clean = preg_replace('!\s+!', '-', $clean);

        return $clean;
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

    /**
     * Method will get URL params and clean them from une.
     * @param [string] $str - string to convert
     * @param [array] $replace - replacements
     * @param [string] $delimeter
     * @return [string]
     */
    private function getUrlParams()
    {
        if (isset(parse_url($_SERVER['REQUEST_URI'])['query'])) {
            $query = parse_url($_SERVER['REQUEST_URI'])['query'];
            parse_str($query, $elements);

            foreach ($elements as $key => $val) {
                $elements[htmlspecialchars($key)] = htmlspecialchars($val);
            }

            return sprintf('?%s', http_build_query($elements));
        } else {
            return null;
        }
    }
}
