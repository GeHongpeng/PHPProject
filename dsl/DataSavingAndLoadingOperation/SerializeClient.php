<?php
namespace DataSavingAndLoadingOperation;

/**
 * Class SerializeClient
 * @package DataSavingAndLoadingOperation
 */
class SerializeClient{
    /**
     * SerializeClient constructor.
     */
    private function __construct() {
    }

    /**
     * @param $file
     * @param $data
     * @return string
     */
    public static function writeToSerializedFile($file, $data) {
        try {
            $dataStr = serialize($data);
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
    public static function loadFromSerializedFile($file) {
        $data = '';
        try {
            $dataStr = file_get_contents($file);
            $data = unserialize($dataStr);
        } catch (Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $data;
        }
    }
}