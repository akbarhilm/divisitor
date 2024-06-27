<?php

namespace App\Api\Ticket;

use App\Api\Api;

class Kedb extends Api
{
    public static function add($data)
    {
        return self::post('/hit/kedb/ticket', $data);
    }
}
