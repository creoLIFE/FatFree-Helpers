<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 21:06
 */

namespace FatFree\Helpers;

class ModelMethodsHelper
{
    /**
     * Method return model varibles as array
     * @return array
     */
    public function toArray()
    {
        return (array)get_object_vars($this);
    }

    /**
     * Method return model varibles as array for ODM query
     * @return array
     */
    public function toOdmQuery()
    {
        $out = array();
        foreach (get_object_vars($this) as $k => $v) {
            if (!empty($v)) {
                $out[$k] = $v;
            }
        }
        return (array)$out;
    }

    /**
     * Method return model varibles as JSON
     * @return string|JSON
     */
    public function toJson()
    {
        return json_encode($this);
    }

    /**
     * Method return namespace of model
     * @return string
     */
    public function getNamespace()
    {
        return (string)__NAMESPACE__;
    }

    /**
     * Method return model name
     * @return string
     */
    public function getModelName()
    {
        return (string)get_class($this);
    }

}