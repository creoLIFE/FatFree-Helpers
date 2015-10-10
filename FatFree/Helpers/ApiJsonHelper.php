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
     * @var array $data - data object
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function asArray()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function asJson()
    {
        $json = new JsonModel();
        $json->data = self::asArray();
        $json->status = $json->data ? 204 : 200;

        return json_encode($json);
    }
}