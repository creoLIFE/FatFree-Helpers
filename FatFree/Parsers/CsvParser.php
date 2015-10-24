<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Parsers;

class CsvParser
{
    /*
     * @var string $delimeter - CSV delimeter
    */
    private $delimeter = ';';

    /*
     * @var integer $offset - skip N lines from begining
    */
    private $offset = 1;

    /*
     * @var string inputEncoding - set input encoding
    */
    private $inputEncoding = 'utf-8';

    /*
     * @var integer $packetSize - setup read packet size
    */
    private $packetSize = 2048;

    /**
     * @return string
     */
    public function getDelimeter()
    {
        return $this->delimeter;
    }

    /**
     * @param string $delimeter
     */
    public function setDelimeter($delimeter)
    {
        $this->delimeter = $delimeter;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getInputEncoding()
    {
        return $this->inputEncoding;
    }

    /**
     * @param mixed $inputEncoding
     */
    public function setInputEncoding($inputEncoding)
    {
        $this->inputEncoding = $inputEncoding;
    }

    /**
     * @return int
     */
    public function getPacketSize()
    {
        return $this->packetSize;
    }

    /**
     * @param int $packetSize
     */
    public function setPacketSize($packetSize)
    {
        $this->packetSize = $packetSize;
    }

    /**
     * Method will parse CSV data file
     * @param string $csvFile - CSV file/URL with data
     * @param string $tmpFileName - tmp file name
     * @param function $callback - callback function
     * @return mixed
     */
    public function parse($csvFile, callable $callback = null)
    {
        $out = array();
        $i = 0;
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, $this->getPacketSize(), $this->getDelimeter())) !== FALSE) {
                if ($i > $this->getOffset()) {
                    if( is_callable($callback)){
                        call_user_func($callback, $row);
                    }
                    else{
                        if( $row != '' ){
                            $out[] = $row;
                        }
                    }
                }
                $i++;
            }
        }
        fclose($handle);

        return count($out) > 0 ? $out : null;
    }

}