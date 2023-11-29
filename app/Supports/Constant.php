<?php

namespace App\Supports;

class Constant
{
    //HTTP status code
    const HTTP_STATUS_CODE_OK = 200;
    const HTTP_STATUS_CODE_BAD_REQUEST = 400;
    const HTTP_STATUS_CODE_UNAUTHORIZED = 401;
    const HTTP_STATUS_CODE_PASSWORD_EXPIRED = 403;
    const HTTP_STATUS_CODE_NOT_FOUND = 404;
    const HTTP_STATUS_CODE_INTERNAL_SERVER_ERROR = 500;

    const LIMIT_LIST_ACCOUNT = 2;

    //Log type (start, progress, error, end)
    const TYPE_LOG_START = 'START';
    const TYPE_LOG_PROCESS = 'PROCESS';
    const TYPE_LOG_CRITICAL = 'CRITICAL';
    const TYPE_LOG_ERROR = 'ERROR';
    const TYPE_LOG_END = 'END';

    // hierarchy
    const INDEX_APP_ENV_IMPRINT_HTML_FILE_FIRST = '0';
    const HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_FIRST = 'imprint_html_file';
    const INDEX_APP_ENV_IMPRINT_HTML_FILE_SECOND = '1';
    const HIERARCHY_APP_ENV_IMPRINT_HTML_FILE_SECOND = 'imprint_html_file_2';
    const INDEX_CONTRACT_APP_AWS = '0';
    const HIERARCHY_CONTRACT_APP_AWS = 'aws';
    const INDEX_CONTRACT_APP_K5 = '1';
    const HIERARCHY_CONTRACT_APP_K5 = 'k5';
    const INDEX_CONTRACT_APP_T2 = '2';
    const HIERARCHY_CONTRACT_APP_T2 = 't2';
    const INDEX_CONTRACT_SERVER_APP1 = '0';
    const HIERARCHY_CONTRACT_SERVER_APP1 = 'app1';
    const INDEX_CONTRACT_SERVER_APP2 = '2';
    const HIERARCHY_CONTRACT_SERVER_APP2 = 'app2';

}
