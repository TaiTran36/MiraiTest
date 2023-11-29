<?php

namespace App\Supports\Helpers;

use App\Supports\ApiStatus;
use App\Supports\Constant;
use App\Supports\Message;

class Helper
{
    public function __construct()
    {
    }

    public static function generateLogID(): string
    {
        return uniqid(rand().'_');
    }

    public static function getPathToAccessLocalDisk($requestPath) {
        $pathAppEnv = self::getPathAppEnv($requestPath['app_env']);
        $pathContractApp = self::getPathContractApp($requestPath['contract_app']);
        $pathContractServer = self::getPathContractServer($requestPath['contract_server']);
        return $pathAppEnv . '\\' . $pathContractApp . '\\' . $pathContractServer;
    }

    public static function getPathAppEnv($appEnv) {
        return match ($appEnv) {
            Constant::INDEX_APP_ENV_IMPRINT_HTML_FILE_FIRST => Constant::HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_FIRST,
            Constant::INDEX_APP_ENV_IMPRINT_HTML_FILE_SECOND => Constant::HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_SECOND,
            default => '',
        };
    }

    public static function getPathContractApp($contractApp) {
        return match ($contractApp) {
            Constant::INDEX_CONTRACT_APP_AWS => Constant::HIERARCHY_CONTRACT_APP_AWS,
            Constant::INDEX_CONTRACT_APP_K5 => Constant::HIERARCHY_CONTRACT_APP_K5,
            Constant::INDEX_CONTRACT_APP_T2 => Constant::HIERARCHY_CONTRACT_APP_T2,
            default => '',
        };
    }
    public static function getPathContractServer($contractServer) {
        return match ($contractServer) {
            Constant::INDEX_CONTRACT_SERVER_APP1 => Constant::HIERARCHY_CONTRACT_SERVER_APP1,
            Constant::INDEX_CONTRACT_SERVER_APP2 => Constant::HIERARCHY_CONTRACT_SERVER_APP2,
            default => '',
        };
    }

    public static function getFileName($listFiles) {
        foreach ($listFiles as &$file) {
            $arrFile = explode("/", $file);
            $file = explode(".", $arrFile[sizeof($arrFile) - 1])[0];
        }

        return $listFiles;
    }

    public static function sendError($error_code, $message)
    {
        return [
            'response' => [
                'status' => [
                    'code' => $error_code . " : " . (new ApiStatus($error_code))->getHttpMsg(),
                    'message' => $message
                ]
            ]
        ];
    }

    public static function sendErrorTest3($data)
    {
        return [
            'success' => false,
            'filename' => $data['file'] . '.html',
            'message' => Message::SEAL_INFO_FALSE
        ];
    }

    public static function sendResponseTest3($data)
    {
        return [
            'success' => true,
            'filename' => $data['file'] . '.html',
            'content' => $data['content'],
            'message' => Message::SEAL_INFO_SUCCESSFULLY
        ];
    }

    public static function sendResponse($ret_data, $success_code)
    {
        return [
            'response' => [
                'data' => $ret_data,
                'status' => [
                    'code' => $success_code . " : " . (new ApiStatus($success_code))->getHttpMsg(),
                    'message' => 'success'
                ]
            ]
        ];
    }
}
