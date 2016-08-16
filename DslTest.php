<?php
require_once __DIR__. '/dsl/dsl-autoloader.php';

date_default_timezone_set('Asia/Tokyo');

$data = [
    'Taro'=>['age'=>30, 'hobby'=>['Guitar', 'Piano']],
    'Takeshi'=>['age'=>18, 'hobby'=>['Reading']],
    'Arisa'=>['age'=>16, 'hobby'=>['Walking', 'Tea']],
];

// シリアライズ
use DataSavingAndLoadingOperation\SerializeClient;
$file = './serialize-test.txt';
SerializeClient::writeToSerializedFile($file, $data);
$data = SerializeClient::loadFromSerializedFile($file);
var_dump($data);

// Json
use DataSavingAndLoadingOperation\JsonClient;
$file = './json-test.json';
JsonClient::writeToJsonFile($file, $data);
$data = JsonClient::loadFromJsonFile($file);
var_dump($data);

// XML
use DataSavingAndLoadingOperation\XmlClient;
$file = './xml-test.xml';
XmlClient::writeToXmlFile($file, $data);
$data = XmlClient::loadFromXmlFile($file);
var_dump($data);