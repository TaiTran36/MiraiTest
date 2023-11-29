<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Request\CreateAccountRequest;
use App\Http\Request\DetailAccountRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DetailController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function detailAccount(Request $request) {
        Log::info(Message::LOG_START);

        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));
        $account = $this->accountService->getAccount($dataAccount);

        if(!$account) {
            Log::info('### Error: ' . Message::ACCOUNT_NOT_EXIST);
            Log::info(Message::LOG_END);
            return Helper::sendError(Constant::HTTP_STATUS_CODE_NOT_FOUND, Message::ACCOUNT_NOT_EXIST );
        }

        $dataResponse = [
            'data' => $account,
            'message' => Message::GET_ACCOUNT_DETAIL_SUCCESSFULLY
        ];
        Log::info('### Result: ' . Message::GET_ACCOUNT_DETAIL_SUCCESSFULLY);
        Log::info(Message::LOG_END);
        return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
    }
}
