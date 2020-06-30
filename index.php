<?php

// configure class autoloader.
spl_autoload_register(function ($namespace) {
    include __DIR__ . '/app/' . str_replace('\\', '/', $namespace) . '.php';
});

use services\ImageService\WatermarkService;
use services\ImageService\TextWatermark;

// config variables
$imagesPath = __DIR__ . '/source-images/';
$ouputPath = __DIR__ . '/output-images/';

// valid image extenshion
$validExtenshions = ['jpg', 'jpeg'];

$dir = new DirectoryIterator($imagesPath);

foreach ($dir as $fileinfo) {
    if ($fileinfo->isFile()) {
        if (in_array(strtolower($fileinfo->getExtension()), $validExtenshions)) {
            $textWatermark = new TextWatermark();
            $watermarkService = new WatermarkService($textWatermark);

            if($watermarkService->createWatermark($fileinfo, $ouputPath)) {
                echo "\n  Image $fileinfo->getBasename()  watermark was created successfully!. \n ";
            }
        }
    }
}


