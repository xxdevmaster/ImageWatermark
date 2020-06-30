<?php

namespace services\ImageService;

/**
 * Interface WatermarkInterface
 *
 * @package services\ImageService
 */
interface WatermarkInterface
{
    /**
     * @return mixed
     */
    public function createWatermark($file, $outputPath);
}