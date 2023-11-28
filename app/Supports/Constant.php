<?php

namespace App\Supports;

class Constant
{
    //HTTP status code
    const HTTP_STATUS_CODE_OK = 200;
    const HTTP_STATUS_CODE_BAD_REQUEST = 400;
    const HTTP_STATUS_CODE_UNAUTHORIZED = 401;
    const HTTP_STATUS_CODE_PASSWORD_EXPIRED = 403;
    const HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR = 500;

    //Log type (start, progress, error, end)
    const TYPE_LOG_START = 'START';
    const TYPE_LOG_PROCESS = 'PROCESS';
    const TYPE_LOG_CRITICAL = 'CRITICAL';
    const TYPE_LOG_ERROR = 'ERROR';
    const TYPE_LOG_END = 'END';
}
