<?php

namespace App\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Api
{
    private static function responseHandler(Response $response, $default = null)
    {
        $result = $response->object();
        $callerFunction = debug_backtrace()[1]['function'];

        if ($callerFunction == 'get') {
            if ($result->info == 'sukses') {
                if (count($result->data) === 1) {
                    return $result->data[0];
                }

                return $result->data;
            } else {
                return $default;
            }
        } else {
            return $result;
        }
    }

    public static function get(string $url, $query = [], $default = null)
    {
        $response = Http::info()->get($url, $query);

        return self::responseHandler($response, $default);
    }

    public static function post(string $url, $data = [])
    {
        $response = Http::info()->post($url, $data);

        return self::responseHandler($response);
    }
}
