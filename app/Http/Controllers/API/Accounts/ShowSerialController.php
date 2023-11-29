<?php

namespace App\Http\Controllers\API\Accounts;

use App\Supports\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowSerialController
{
    public function __construct()
    {
    }

    public function showSerial(Request $request) {
        $data = $request->all();

        $path = Helper::getPathToAccessLocalDisk($data);
        $storage = Storage::disk('c-drive');
        $fileMatch = $storage->get($path . '\\' . $request['file'] . '.html');

        if(empty($fileMatch)) {
            return Helper::sendErrorTest3($request);
        }

        $dataResponse = [
            'file' => $request['file'],
            'content' => base64_encode($fileMatch)
        ];
        return Helper::sendResponseTest3($dataResponse);
    }
}
