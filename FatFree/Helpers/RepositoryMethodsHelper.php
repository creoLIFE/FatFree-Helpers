<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 21:06
 */

namespace FatFree\Helpers;

class RepositoryMethodsHelper
{
    /**
     * Method return repository result as array
     * @return array
     */
    public function toArray()
    {
        return (array)get_object_vars($this);
    }

    /**
     * Method return repository result as JSON
     * @return JSON
     */
    public function toJson()
    {
        return json_encode($this);
    }
    
}