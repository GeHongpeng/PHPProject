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
            $dataStr = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($file, $dataStr);
        } catch (Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $dataStr;
        }
    }

    /**
     * @param $file
     * @return mixed|string
     */
    public static function loadFromJsonFile($file) {
        $data = '';
        try {
            $dataStr = file_get_contents($file);
            $data = json_decode($dataStr, true);
        } catch (Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $data;
        }
    }
}