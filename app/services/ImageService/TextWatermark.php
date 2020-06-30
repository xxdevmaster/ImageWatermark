<?php

namespace services\ImageService;

use services\ImageService\WatermarkService;
use Imagick;
use ImagickDraw;

/**
 * Class TextWatermark
 *
 * @package services\ImageService
 */
class TextWatermark implements WatermarkInterface
{
    /**
     * Crate wataermark text for input file.
     *
     * @param $file
     * @param $outputPath
     */
    public function createWatermark($file, $outputPath)
    {
        $fileName = $file->getFilename();
        $watermarkText = ucfirst(str_replace('-', ' ', $file->getBasename('.' . $file->getExtension())));

        $image = new Imagick($file->getLinkTarget());

        // Create a new drawing palette
        $draw = new ImagickDraw();

        // Set draw properties
        $draw->setFont('Arial');
        $draw->setFontSize(28);
        $draw->setFillColor('black');
        $draw->setGravity(Imagick::GRAVITY_SOUTHEAST);
        $draw->setFillColor('white');

        $image->annotateImage($draw, 10, 10, 0, $watermarkText);
        $image->setImageFormat('jpg');

        // Save image
        return $image->writeImage($outputPath . $fileName);
    }
}