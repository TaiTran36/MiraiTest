<?php

namespace App\Supports\Helpers;

use App\Supports\Constant;

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
        $pathContractApp = self::getPathContractApp($requestPath['app_env']);
        $pathContractServer = self::getPathContractServer($requestPath['app_env']);
        return $pathAppEnv . '\\' . $pathContractApp . '\\' . $pathContractServer;
    }

    public static function getPathAppEnv($appEnv) {
        switch ($appEnv) {
            case Constant::INDEX_APP_ENV_IMPRINT_HTML_FILE_FIRST:
                return Constant::HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_FIRST;
            case Constant::INDEX_APP_ENV_IMPRINT_HTML_FILE_SECOND:
                return Constant::HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_SECOND;
            default:
                return '';
        }
    }

    public static function getPathContractApp($contractApp) {
        switch ($contractApp) {
            case Constant::INDEX_CONTRACT_APP_AWS:
                return Constant::HIERARCHY_CONTRACT_APP_AWS;
            case Constant::INDEX_CONTRACT_APP_K5:
                return Constant::HIERARCHY_CONTRACT_APP_K5;
            case Constant::INDEX_CONTRACT_APP_T2:
                return Constant::HIERARCHY_CONTRACT_APP_T2;
            default:
                return '';
        }
    }
    public static function getPathContractServer($contractServer) {
        switch ($contractServer) {
            case Constant::INDEX_CONTRACT_SERVER_APP1:
                return Constant::HIERARCHY_CONTRACT_SERVER_APP1;
            case Constant::INDEX_CONTRACT_SERVER_APP2:
                return Constant::HIERARCHY_CONTRACT_SERVER_APP2;
            default:
                return '';
        }
    }
}
