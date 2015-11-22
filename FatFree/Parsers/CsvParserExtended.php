<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 13/02/15
 * Time: 22:07
 */

namespace FatFree\Parsers;

use League\Csv\Reader;

class CsvParserExtended
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
     * Method will parse CSV data file
     * @param string $csvFile - CSV file/URL with data
     * @param string $tmpFileName - tmp file name
     * @param function $callback - callback function
     * @return mixed
     */
    public function parse($csvFile, callable $callback = array())
    {
        $csv = Reader::createFromPath($csvFile);
        $csv->setOffset($this->getOffset());
        $csv->setEncodingFrom($this->getInputEncoding());

        print_r($csv->fetchAll());

        $tmpFileName = \F3::get('creoLAB.dir.files.data'). '/'. rand(0,1000000000000) . '.csv';
//        file_put_contents($tmpFileName, file_get_contents($csvFile));

        /*
        $csv = Reader::createFromPath($tmpFileName);
        $csv->setOffset($this->getOffset());
        $csv->setEncodingFrom($this->getInputEncoding());

        $out = array();


        $csv->each( function($row) use ($callback){
            if( is_array($callback) && is_callable($callback)){
                return call_user_func($callback, $row);
            }
            else{
                $out[] = $row;
            }
            return true;
        });

        unlink($tmpFileName);
        return count($out) > 0 ? $out : null;
        */

    }

}