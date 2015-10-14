<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

class AjaxHelper
{
    /**
     * Verify if request is ajax call from current domain
     * @method isAjax
     * @return boolean
     */
    public static function isAjax()
    {
        return (boolean)(

        \F3::get('ENV') !== 'production' ? true :

            isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
            && $_SERVER['HTTP_HOST'] == \F3::get('creoLAB.domain')
                ? true : false

        );
    }

}