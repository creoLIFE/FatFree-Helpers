<?php
/**
 * Created by PhpStorm.
 * User: mirekratman
 * Date: 28/07/15
 * Time: 10:45
 */

namespace FatFree\Helpers;

abstract class EnumHelper
{
    /**
     * Method return ENUM variables keys as array
     * @return array
     */
    public function getKeys()
    {
        return (array)array_keys(get_class_vars(get_called_class()));
    }

    /**
     * Method return ENUM as array
     * @return array
     */
    public function toArray()
    {
        return (array)get_class_vars(get_called_class());
    }

    /**
     * Method return ENUM as json
     * @return JSON|string
     */
    public function toJson()
    {
        return json_encode(get_class_vars(get_called_class()));
    }

}