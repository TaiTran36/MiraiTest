<?php

namespace App\Http\Controllers\API\Accounts;

use App\Http\Controllers\API\BaseController;
use App\Supports\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

//use App\Http\Requests\ApiRequest;

class CreateController
{
    public function __construct()
    {
    }

//    public function execute(ApiRequest $request)
//    {
//        // TODO: Implement execute() method.
//    }

    public function run() {
        $request = [
            'file' => 'testa',
            'app_env' => '0',
            'contract_app' => '0',
            'contract_server' => '1',
        ];

        $path = Helper::getPathToAccessLocalDisk($request);
        $storage = Storage::disk('c-drive');
        dd($storage->allFiles($path));
        $fileMatch = $storage->get($path . '\\' . $request['file'] . '.html');
        if(empty($fileMatch)) {
            return false;
        }

        return base64_encode($fileMatch);
    }
}
