<?php

namespace App\Supports;

class ApiStatus
{
    /**
     * @var array $statusCode
     */
    protected $statusCode;

    /**
     * @var array $statusList
     */
    protected $statusList = [
        200 => 'OK',
        201 => 'Created',
        204 => 'No Content',
        205 => 'Reset Content',
        302 => 'Found',
        304 => 'Not Modified',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        408 => 'Request Timeout',
        429 => 'Too many request',
        500 => 'Internal Server Error',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    ];

    /**
     * ApiStatus constructor.
     * @param int $statusCode
     */
    public function __construct($statusCode = 200){
        $this->statusCode = $statusCode;
    }

    /**
     * Get status code message
     *
     * @return mixed
     */
    public function getStatusMsg(){
        return $this->statusList[$this->statusCode];
    }

    public function getHttpMsg() {

    }
}
