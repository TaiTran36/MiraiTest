<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ApiException;
use App\Exceptions\MemberInvalidException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Services\LogService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Helpers\ResponseHelper;
use App\Supports\Message;

abstract class BaseController
{
    protected LogService $logService;

    /**
     * Initialization
     *
     */
    public function __construct()
    {
        $this->logService = new LogService;
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
            $this->logService->writeLogStart(Helper::generateLogID(), $request);

            //API processing
            $responseData = $this->execute($request);

            //Response
            $response = ResponseHelper::getResponse(httpStatusCode: Constant::HTTP_STATUS_CODE_OK, data: $responseData);
        } catch (ApiException | MemberInvalidException $e) {
            $response = ResponseHelper::formatApiException($e);
        } catch (\Exception $e) {
            $this->logService->writeLogError($this->logUID, Message::LOG_EXCEPTION, params: ['message' => $e->getTraceAsString()]);
            $response = ResponseHelper::getResponse(Constant::HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR, $e->getCode());
        }

        //Exit log
        $this->logService->writeLogEnd($this->logUID, json_decode($response));

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
