<?php
/**
 * Created by PhpStorm.
 * User: ratman
 * Date: 16/02/15
 * Time: 13:32
 */

namespace FatFree\Models;

use FatFree\Helpers\ModelMethodsHelper;

class JsonModel extends ModelMethodsHelper
{
    /*
     * @var integer $status - response status
     */
    protected $status = 500;

    /*
     * @var integer $sId - Session ID
     */
    protected $sId;

    /*
     * @var mixed $data - data object
     */
    protected $data;

    /*
     * @var string $msg - message
     */
    protected $msg;

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $sId
     */
    public function setSId($sId)
    {
        $this->sId = $sId;
    }

    /**
     * @return mixed
     */
    public function getSId()
    {
        return $this->sId;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

}