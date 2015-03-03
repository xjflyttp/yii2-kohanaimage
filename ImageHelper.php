<?php

namespace xj\kohanaimage;
use yii\base\Exception;

class ImageHelper {

    /**
     * 
     * @param string $file
     * @param int $width
     * @param string|null $saveAs
     * @return bool
     */
    public static function resizeByWidth($file, $width, $saveAs = null) {
        try {
            $image = Image::load($file);
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width)->save($saveAs);
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
     * @return bool
     */
    public static function resizeByHeight($file, $height, $saveAs = null) {
        try {
            $image = Image::load($file);
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize(null, $height)->save($saveAs);
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
     * @return bool
     */
    public static function resizeByWidthHeightWithShortestSide($file, $width, $height, $saveAs = null) {
        try {
            $image = Image::load($file);
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height)->save($saveAs);
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
     * @return boolean
     */
    public static function resizeByWidthHeightWithKeepingRatio($file, $width, $height, $saveAs = null) {
        try {
            $image = Image::load($file);
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height, Image::INVERSE)->save($saveAs);
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
     * @return boolean
     */
    public static function resizeByWidthHeightForce($file, $width, $height, $saveAs = null) {
        try {
            $image = Image::load($file);
            if (!$image) {
                throw new Exception('load fail');
            }
            $image->resize($width, $height, Image::NONE)->save($saveAs);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

}
