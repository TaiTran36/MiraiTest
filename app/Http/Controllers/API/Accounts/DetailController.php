<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Controllers\API\BaseController;
use App\Http\Request\ApiRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

class DetailController extends BaseController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function execute(ApiRequest $request)
    {
        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));
        $account = $this->accountService->getAccount($dataAccount);

        if(!$account) {
            Log::info('### Error: ' . Message::ACCOUNT_NOT_EXIST);
            return Helper::sendError(Constant::HTTP_STATUS_CODE_NOT_FOUND, Message::ACCOUNT_NOT_EXIST );
        }

        $dataResponse = [
            'data' => $account,
            'message' => Message::GET_ACCOUNT_DETAIL_SUCCESSFULLY
        ];
        Log::info('### Result: ' . Message::GET_ACCOUNT_DETAIL_SUCCESSFULLY);
        return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
    }
}
