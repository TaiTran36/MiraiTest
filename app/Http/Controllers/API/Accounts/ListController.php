<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Controllers\API\BaseController;
use App\Http\Request\ApiRequest;
use App\Services\Account\AccountService;
use App\Supports\Constant;
use App\Supports\Helpers\Helper;
use App\Supports\Message;
use Illuminate\Support\Facades\Log;

class ListController extends BaseController
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function execute(ApiRequest $request)
    {
        $listAccount = $this->accountService->getListAccount();

        if($listAccount) {
            $dataResponse = [
                'data' => $listAccount,
                'message' => Message::GET_LIST_ACCOUNT_SUCCESSFULLY
            ];
            Log::info('### Result: ' . Message::GET_LIST_ACCOUNT_SUCCESSFULLY);
            return Helper::sendResponse($dataResponse, Constant::HTTP_STATUS_CODE_OK);
        }
    }
}
