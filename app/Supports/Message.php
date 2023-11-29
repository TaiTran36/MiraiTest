<?php

namespace App\Supports;

class Message
{
    const LOG_START = 'Start processing';
    const LOG_END = 'Processing Exit';

    const PASSWORD_REQUIRED = 'Password is required.';
    const LOGIN_REQUIRED = 'Login is required.';
    const PASSWORD_CONFIRMATION_REQUIRED = 'Password confirmation fields do not match.';
    const PASSWORD_NOT_MATCH = 'Password confirmation fields do not match.';

    const ACCOUNT_EXIST = 'Account exist in system.';
    const ACCOUNT_NOT_EXIST = 'Account not exist in system.';
    const CREATE_ACCOUNT_SUCCESSFULLY = 'Create account successfully.';
    const UPDATE_ACCOUNT_SUCCESSFULLY = 'Update account successfully.';
    const DELETE_ACCOUNT_SUCCESSFULLY = 'Delete account successfully.';
    const GET_ACCOUNT_DETAIL_SUCCESSFULLY = 'Get account successfully.';
    const GET_LIST_ACCOUNT_SUCCESSFULLY = 'Get list account successfully.';

    const SEAL_INFO_FALSE = 'Seal Info response false';
    const SEAL_INFO_SUCCESSFULLY = 'Seal Info response successfully';
}
