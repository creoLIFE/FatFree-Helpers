<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Helpers;

class HeadersHelper
{
    /**
     * @return void
     */
    public static function setJsonHeaders()
    {
        header('Content-Type: application/json');
    }

    /**
     * @return void
     */
    public static function setJavascriptHeaders()
    {
        header('Content-type: text/javascript');
    }

    /**
     * @param integer $code - response code
     * @return void
     */
    public static function setResponseCode($code)
    {
        http_response_code($code);
    }

    /**
     * @return void
     */
    public static function unsetCache()
    {
        header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
        header("Pragma: no-cache"); //HTTP 1.0
        header("Expires: " . date("D, d M Y H:i:s e", strtotime('-1 day'))); // Date in the past
    }

    /**
     * @param integer $time - expiration time (expire after x seconds)
     * @return void
     */
    public static function setCache($expTime = 86400)
    {
        //86400 - 1day (60sec * 60min * 24hours)
        header("Cache-Control: max-age=" . (int)$expTime);
        header("Expires: " . date("D, d M Y H:i:s e", time() + (int)$expTime)); // Date in the past
    }

}