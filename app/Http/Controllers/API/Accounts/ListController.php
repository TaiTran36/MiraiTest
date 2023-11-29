<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Request\CreateAccountRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function listAccount(Request $request) {
        $listAccount = $this->accountService->getListAccount();
        Log::info(Message::LOG_START);

        if($listAccount) {
            $dataResponse = [
                'data' => $listAccount,
                'message' => Message::GET_LIST_ACCOUNT_SUCCESSFULLY
            ];
            Log::info('### Result: ' . Message::GET_LIST_ACCOUNT_SUCCESSFULLY);
            Log::info(Message::LOG_END);
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
