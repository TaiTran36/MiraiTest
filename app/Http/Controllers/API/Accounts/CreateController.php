<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Request\CreateAccountRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;


class CreateController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function createAccount(CreateAccountRequest $request) {
        Log::info(Message::LOG_START);

        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));

        $existAccount = $this->accountService->checkExistAccount($dataAccount['login']);

        if($existAccount) {
            Log::info('### Error: ' . Message::ACCOUNT_EXIST);
            Log::info(Message::LOG_END);
            return Helper::sendError(Constant::HTTP_STATUS_CODE_NOT_FOUND, Message::ACCOUNT_EXIST );
        }

        $createAccount = $this->accountService->createAccount($dataAccount);
        if($createAccount) {
            $dataResponse = [
                'login' => $dataAccount['login'],
                'phone' => $dataAccount['phone'],
                'message' => Message::CREATE_ACCOUNT_SUCCESSFULLY
            ];
            Log::info('### Result: ' . Message::CREATE_ACCOUNT_SUCCESSFULLY);
            Log::info(Message::LOG_END);
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
