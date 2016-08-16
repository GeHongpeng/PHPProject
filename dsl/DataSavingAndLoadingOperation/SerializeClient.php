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
            $serializedData= serialize($data);
            file_put_contents($file, $serializedData);
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $serializedData;
        }
    }

    /**
     * @param $file
     * @return mixed|string
     */
    public static function loadFromSerializedFile($file) {
        try {
            $dataStr = file_get_contents($file);
            $serializedData = unserialize($dataStr);
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $serializedData;
        }
    }
}