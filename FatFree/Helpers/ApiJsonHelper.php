<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */
namespace FatFree\Helpers;

use FatFree\Models\JsonModel;

class ApiJsonHelper
{
    /*
     * @var mixed $data - data object
     */
    protected $data;

    /*
     * @var integer $status - data status response code
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __construct($data)
    {
        $this->setData($data);
        $this->setStatus($data ? 200 : 204);
    }

    /**
     * @return JSON
     */
    public function asJson()
    {
        $json = new JsonModel();
        $json->setData($this->getData());
        $json->setStatus($this->getStatus());

        return $json->toJson();
    }

    /**
     * @param integer $jsonpId
     * @return JSON|string
     */
    public function asJsonp($jsonpId)
    {
        $json = new JsonModel();
        $json->setData($this->getData());
        $json->setStatus($this->getStatus());

        return $json->toJsonp((int)$jsonpId);
    }

}
