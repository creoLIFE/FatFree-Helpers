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

    /*
     * @var string $stringEnclosure - string enclosure
    */
    private $stringEnclosure = '"';

    /*
     * @var string $stringEscape - string escape
    */
    private $stringEscape = '\\';

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
     * @return string
     */
    public function getStringEnclosure()
    {
        return $this->stringEnclosure;
    }

    /**
     * @param string $stringEnclosure
     */
    public function setStringEnclosure($stringEnclosure)
    {
        $this->stringEnclosure = $stringEnclosure;
    }

    /**
     * @return string
     */
    public function getStringEscape()
    {
        return $this->stringEscape;
    }

    /**
     * @param string $stringEscape
     */
    public function setStringEscape($stringEscape)
    {
        $this->stringEscape = $stringEscape;
    }

    /**
     * Method will parse CSV data file
     * @param string $csvFile - CSV file/URL with data
     * @param string $csvFile - tmp file name
     * @param callable $callback - callback function
     * @return array
     */
    public function parse($csvFile, callable $callback = null)
    {
        $out = array();
        $i = 0;

        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, $this->getPacketSize(), $this->getDelimeter(), $this->getStringEnclosure(), $this->getStringEscape())) !== FALSE) {
                if ($i > $this->getOffset()) {
                    if ($row != null && isset($row[0]) && $row[0] !== null ) {
                        if (is_callable($callback)) {
                            call_user_func($callback, $row);
                        } else {
                            $out[] = $row;
                        }
                    }
                }
                $i++;
            }
        }

        return $out;
    }

}