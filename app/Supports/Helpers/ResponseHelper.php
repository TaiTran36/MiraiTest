<?php

namespace App\Supports\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * Create API response
     *
     * @param string|int $httpStatusCode
     * @param string|null $code
     * @param string|null $message
     * @param null $data
     * @return JsonResponse
     */
    public static function getResponse($httpStatusCode, $code = null, $message = null, $data = null)
    {
        if ($data == array() || $data === '') {
            $data = null;
        }

        if ($message == '') {
            $message = null;
        }

        if (self::validateJson($message)) {
            $message = json_decode($message);
        }

        return response()->json([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ], $httpStatusCode);
    }

    protected static function validateJson($value)
    {
        json_decode($value);

        return json_last_error() === JSON_ERROR_NONE;
    }
}
