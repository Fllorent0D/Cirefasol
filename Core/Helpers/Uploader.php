<?php


namespace Core\Helpers;

class Uploader
{
    public static function upload($file, $name, $dest)
    {
        $extension = self::getExtension($file['name']);
        move_uploaded_file($file['tmp_name'], $dest . $name . $extension);
    }

    public static function crop($file, $dest = null, $name = null, $thumbnail = false)
    {
        // Get new dimensions
        list($width, $height) = getimagesize($file);

        if($thumbnail)
        {

            $new_width = 450;
            $new_height = 450;
        }
        else
        {
            $new_width = 1024;
            $new_height = 1024;
        }

        $ratio_orig = $width/$height;

        if ($new_width/$new_height > $ratio_orig)
        {
            $new_width = $new_height*$ratio_orig;
        } else
        {
            $new_height = $new_width/$ratio_orig;
        }
        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($file);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($image_p, !is_null($dest) && !is_null($name) ? $dest . $name : null, 100);
    }
    public static function getExtension($imageName)
    {
        return '.' . @end(explode('.',$imageName));
    }
} 