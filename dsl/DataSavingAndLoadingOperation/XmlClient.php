<?php
namespace DataSavingAndLoadingOperation;

/**
 * Class XmlClient
 * @package DataSavingAndLoadingOperation
 */
class XmlClient{
    /**
     * XmlClient constructor.
     */
    private function __construct() {
    }

    /**
     * @param $file
     * @param $data
     * @return string
     */
    public static function writeToXmlFile($file, $data) {
        try {
            $xmlObject = self::array2xml($data);
            $xmlData = $xmlObject->asXML();
            file_put_contents($file, $xmlData);
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $xmlData;
        }
    }

    /**
     * @param $file
     * @return mixed|string
     */
    public static function loadFromXmlFile($file) {
        try {
            $xmlData = simplexml_load_file($file);
            /*
            foreach ($xmlData->children() as $item) {
                $itemName = $item->getName();
                //$attributeOne = $item->[attributeName]
                //$arrayAttribute = $item->[arrayAttributeName]
                //foreach ($arrayAttribute->children() as $c) {
                //  echo "{$c}";
                //}
                //echo "\n";
            }
            */
        } catch (\Exception $e) {
            print "{$e->getMessage()}\n";
        } finally {
            return $xmlData;
        }
    }

    /**
     * @param $array
     * @param null $xmlObject
     * @return null|\SimpleXMLElement
     */
    public static function array2xml($array, $xmlObject=NULL) {
        if ($xmlObject == NULL) {
            $def = '<?xml version="1.0"?><root></root>';
            $xmlObject = new \SimpleXMLElement($def);
        }
        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $key = "item";
            }
            if (is_array($value)) {
                $subNode = $xmlObject->addChild($key);
                self::array2xml($value, $subNode);
            } else {
                $v = htmlentities($value);
                $xmlObject->addChild($key, $v);
            }
        }
        return $xmlObject;
    }
}