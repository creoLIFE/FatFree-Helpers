<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

class CookieHelper
{
    /**
     * Method will set app cookies
     * @param string $userId
     * @param string $sessionId
     * @return void
     */
    public function setAppCookies($userId, $sessionId)
    {
        \F3::set('COOKIE.appUid', $userId);
        \F3::set('COOKIE.appSid', $sessionId);
    }

    /**
     * Method will get app cookies
     * @return array
     */
    public function getAppCookies()
    {
        return array(
            'userId' => \F3::get('COOKIE.appUid'),
            'sessionId' => \F3::get('COOKIE.appSid')
        );
    }

    /**
     * Method will remove app cookies
     * @return void
     */
    public function removeAppCookies()
    {
        \F3::set('COOKIE.appUid', false);
        \F3::set('COOKIE.appSid', false);
    }

}