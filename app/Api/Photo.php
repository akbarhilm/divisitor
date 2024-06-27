<?php

namespace App\Api;

class Photo
{
    public static function get($nik)
    {
        return config('app.photo_api') . "/$nik.jpg";
    }
}
