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
     * @var mixed $output - output data
     */
    private $output;

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param mixed $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * Class constructor
     * @return void
     */
    public function __construct($output)
    {
        $this->setOutput($output);
    }

    /**
     * Method return output result as array
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this->getOutput());
    }

    /**
     * Method return output result as JSON
     * @return JSON
     */
    public function toJson()
    {
        return json_encode($this->getOutput());
    }

    /**
     * Method return output iterator as array
     * @return array
     */
    public function asIteratorToArray()
    {
        return iterator_to_array($this->getOutput());
    }

}