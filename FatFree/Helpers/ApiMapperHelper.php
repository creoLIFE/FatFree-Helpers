<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

class ApiMapperHelper
{
    /*
     * @var mixed $apiModel - output model
     */
    private $apiModel;

    /**
     * @return mixed
     */
    public function getApiModel()
    {
        return $this->apiModel;
    }

    /**
     * @param mixed $apiModel
     */
    public function setApiModel($apiModel)
    {
        $this->apiModel = $apiModel;
    }


}