<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Request\DeleteAccountRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

class DeleteController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function deleteAccount(DeleteAccountRequest $request) {
        Log::info(Message::LOG_START);

        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));

        $existAccount = $this->accountService->checkExistAccount($dataAccount['login']);

        if(!$existAccount) {
            Log::info('### Error: ' . Message::ACCOUNT_NOT_EXIST);
            Log::info(Message::LOG_END);
            return Helper::sendError(Constant::HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR, Message::ACCOUNT_NOT_EXIST );
        }

        $deleteAccount = $this->accountService->deleteAccount($dataAccount);
        if($deleteAccount) {
            $dataResponse = [
                'login' => $dataAccount['login'],
                'message' => Message::DELETE_ACCOUNT_SUCCESSFULLY
            ];
            Log::info('### Result: ' . Message::DELETE_ACCOUNT_SUCCESSFULLY);
            Log::info(Message::LOG_END);
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
