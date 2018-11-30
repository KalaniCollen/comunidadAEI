<?php
namespace ComunidadAEI\Traits;

/**
 * Trait para subir imagenes al servidor
 */
trait UploadImage
{
    function getImagePNG($path, $data64)
    {
        list($type, $data64) = explode(';', $data64);
        list(, $data64)      = explode(',', $data64);
        $data64 = base64_decode($data64);
        $image_name = $path . time(). '.png';
        file_put_contents($image_name, $data64);
        return $image_name;
    }


    function getImageJPG($path, $data64)
    {
        list($type, $data64) = explode(';', $data64);
        list(, $data64)      = explode(',', $data64);
        $data64 = base64_decode($data64);
        $image_name = $path . time() . '.jpg';
        file_put_contents($image_name, $data64);
        return $image_name;
    }
}
