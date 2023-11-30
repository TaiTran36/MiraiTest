<?php

namespace App\Http\Controllers\API;

use App\Http\Request\ApiRequest;
use App\Services\LogService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

abstract class BaseController
{
    protected LogService $logService;

    /**
     * Initialization
     *
     */
    public function __construct()
    {
    }

    /**
     * API processing (common part)
     *
     * @param ApiRequest $request
     * @return false|string
     */
    public function run(ApiRequest $request)
    {
        try {
            //Start log
            Log::info(Message::LOG_START);

            //API processing
            $response = $this->execute($request);
        } catch (\Exception $e) {
            Log::error('### Error: ' . $e);
            $response = Helper::sendError(Constant::HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR, $e->getCode());
        }

        //Exit log
        Log::info(Message::LOG_END);

        return $response;
    }

    /**
     * API processing
     * This method is implemented in inheriting API classes
     *
     * @param ApiRequest $request
     */
    abstract protected function execute(ApiRequest $request);
}
