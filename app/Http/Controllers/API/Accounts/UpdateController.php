<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Request\UpdateAccountRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

class UpdateController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function updateAccount(UpdateAccountRequest $request) {
        Log::info(Message::LOG_START);

        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));
        $existAccount = $this->accountService->checkExistAccount($dataAccount['login']);

        if(!$existAccount) {
            Log::info('### Error: ' . Message::ACCOUNT_NOT_EXIST);
            Log::info(Message::LOG_END);
            return Helper::sendError(Constant::HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR, Message::ACCOUNT_NOT_EXIST );
        }

        $updateAccount = $this->accountService->updateAccount($dataAccount);
        if($updateAccount) {
            $dataResponse = [
                'login' => $dataAccount['login'],
                'phone' => $dataAccount['phone'],
                'message' => Message::UPDATE_ACCOUNT_SUCCESSFULLY
            ];
            Log::info('### Result: ' . Message::UPDATE_ACCOUNT_SUCCESSFULLY);
            Log::info(Message::LOG_END);
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
