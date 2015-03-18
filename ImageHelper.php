<?php

namespace xj\kohanaimage;

use yii\base\Exception;

class ImageHelper {

    /**
     * 
     * @return string
     */
    public static function getDriver() {
        return Image::DRIVER_GD;
    }

    /**
     * 
     * @param string $file
     * @param int $width
     * @param string|null $saveAs
     * @param int $quality 1-100
     * @return bool
     */
    public static function resizeByWidth($file, $width, $saveAs = null, $quality = 75) {
        try {
            $image = Image::load($file, static::getDriver());
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width)->save($saveAs, $quality);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * 
     * @param string $file
     * @param int $height
     * @param string|null $saveAs
     * @param int $quality 1-100
     * @return bool
     */
    public static function resizeByHeight($file, $height, $saveAs = null, $quality = 75) {
        try {
            $image = Image::load($file, static::getDriver());
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize(null, $height)->save($saveAs, $quality);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * Resize to 200 pixels on the shortest side
     * @param string $file
     * @param int $width
     * @param int $height
     * @param string|null $saveAs
     * @param int $quality 1-100
     * @return bool
     */
    public static function resizeByWidthHeightWithShortestSide($file, $width, $height, $saveAs = null, $quality = 75) {
        try {
            $image = Image::load($file, static::getDriver());
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height)->save($saveAs, $quality);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * Resize to 200x200 pixels, keeping aspect ratio
     * 
     * @param string $file
     * @param int $width
     * @param int $height
     * @param string $saveAs
     * @param int $quality 1-100
     * @return boolean
     */
    public static function resizeByWidthHeightWithKeepingRatio($file, $width, $height, $saveAs = null, $quality = 75) {
        try {
            $image = Image::load($file, static::getDriver());
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height, Image::INVERSE)->save($saveAs, $quality);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * Resize to 200x200 pixels
     * 
     * @param string $file
     * @param int $width
     * @param int $height
     * @param string $saveAs
     * @param int $quality 1-100
     * @return boolean
     */
    public static function resizeByWidthHeightForce($file, $width, $height, $saveAs = null, $quality = 75) {
        try {
            $image = Image::load($file, static::getDriver());
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height, Image::NONE)->save($saveAs, $quality);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

}
