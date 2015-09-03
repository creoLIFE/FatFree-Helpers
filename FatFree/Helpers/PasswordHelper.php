<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Helpers;

use FatFree\Helpers\PasswordHashHelper;

class PasswordHelper extends PasswordHashHelper
{
    /**
     * Class constructor
     * @method __construct
     * @return boolean
     */
    public function __construct($iteration_count_log, $portable_hashes)
    {
        parent::__construct($iteration_count_log, $portable_hashes);
    }


    /**
     * Create simple random password
     * @method getSimplePassword
     * @param string $length - number of characters in password
     * @return string
     */
    public function getSimplePassword($length = 8)
    {
        if ($length === null) {
            $length = rand(8, 15);
        }
        //Definition
        $out = '';

        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . '0123456789';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $out .= $chars[rand(0, $max)];
        }

        return $out;
    }


    /**
     * Create random strong password
     * @method getStrongPassword
     * @param string $length - number of characters in password
     * @return string
     */
    public function getStrongPassword($length = 20)
    {
        //Definition
        $out = '';

        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $out .= $chars[rand(0, $max)];
        }

        return $out;
    }

}
