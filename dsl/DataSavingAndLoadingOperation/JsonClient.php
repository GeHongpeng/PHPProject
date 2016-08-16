<?php
namespace DataSavingAndLoadingOperation;

/**
 * Class JsonClient
 * @package DataSavingAndLoadingOperation
 */
/**
 * Class JsonClient
 * @package DataSavingAndLoadingOperation
 */
class JsonClient{

    /**
     * JsonClient constructor.
     */
    private function __construct() {
    }

    /**
     * @param $file
     * @param $data
     * @return string
     */
    public static function writeToJsonFile($file, $data) {
        try {
            $jsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($file, $jsonData);
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $jsonData;
        }
    }

    /**
     * @param $file
     * @return mixed|string
     */
    public static function loadFromJsonFile($file) {
        try {
            $dataStr = file_get_contents($file);
            $jsonData = json_decode($dataStr, true);
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $jsonData;
        }
    }
}