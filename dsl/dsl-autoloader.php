<?php
$mapping = array(
    'DataSavingAndLoadingOperation\SerializeClient' => __DIR__ . '/DataSavingAndLoadingOperation/SerializeClient.php',
    'DataSavingAndLoadingOperation\JsonClient' => __DIR__ . '/DataSavingAndLoadingOperation/JsonClient.php',
);
spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);