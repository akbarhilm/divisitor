<?php

namespace App\Api\Ticket;

use App\Api\Api;

class Ask extends Api
{
    public static function add($data)
    {
        return self::post('/hit/ask/ticket', $data);
    }
}
