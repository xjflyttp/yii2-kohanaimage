<?php

namespace xj\kohanaimage;

use xj\kohanaimage\classes\Kohana_Image;
use yii\base\ErrorException;

abstract class Image extends Kohana_Image {

    const DRIVER_GD = 'GD';
    const DRIVER_IMAGEMAGICK = 'ImageMagick';

    /**
     * instance image
     * 
     * @param string $file
     * @param string $driver
     * @return Image
     * @throws ErrorException
     */
    public static function load($file = null, $driver = self::DRIVER_GD) {
        if (empty($file)) {
            throw new ErrorException('File name can not be empty');
        }
        if (!realpath($file)) {
            throw new ErrorException(sprintf('file is not exist: %s', $file));
        }
        return static::factory($file, $driver);
    }

}
