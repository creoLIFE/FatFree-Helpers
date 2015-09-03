<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Helpers;

class ApiHeadersHelper
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

}