<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Controllers\API\BaseController;
use App\Http\Request\ApiRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

class UpdateController extends BaseController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function execute(ApiRequest $request)
    {
        $request->getChild('App\Http\Request\UpdateAccountRequest');
        $dataAccount = $request->all();
        Log::info('### Param request: '  . json_encode($dataAccount));
        $existAccount = $this->accountService->checkExistAccount($dataAccount['login']);

        if(!$existAccount) {
            Log::info('### Error: ' . Message::ACCOUNT_NOT_EXIST);
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
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
