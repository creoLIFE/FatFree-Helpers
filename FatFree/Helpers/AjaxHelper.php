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
        return (
        isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
        && $_SERVER['sys_domain'] == Zend_Registry::get('domain')
            ? true : (Zend_Registry::get('appEnv') == 'production' ? false : true)
        );
    }

}