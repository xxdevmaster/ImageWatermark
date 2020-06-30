<?php

namespace services\ImageService;

use Exception;

/**
 * Class WatermarkService
 *
 * @package services\ImageService
 *
 */
class WatermarkService
{
    private $handler;

    /**
     * WatermarkService constructor.
     *
     * @param WatermarkInterface $handler
     */
    public function __construct(WatermarkInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Call hanldler watermark implementation.
     *
     * @param $fileinfo
     * @param $outputPath
     * @throws Exception
     */
    public function createWatermark($fileinfo, $outputPath)
    {
        try {
            return $this->handler->createWatermark($fileinfo, $outputPath);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}