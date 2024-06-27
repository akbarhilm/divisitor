<?php

namespace App\Api;

class Employee extends Api
{
    public static function all()
    {
        return self::get('/general/employee', default: []);
    }

    public static function find($nik)
    {
        return self::get('/general/employee', ['nik' => $nik]);
    }

    public static function findBy($field, $value)
    {
        return self::get('/general/employee', [$field => $value], []);
    }
}
