<?php

namespace App\Services\Account;

use App\Repositoies\Account\AccountRepository;
use App\Supports\Constant;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    protected $accountRepository;
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function checkExistAccount($data) {
        return $this->accountRepository->checkExistAccount($data);
    }

    public function createAccount($data) {
        $dataCreate = [
            'login' => $data['login'],
            'phone' => $data['phone'],
//            'password' => Hash::make($data['password'])
            'password' => md5($data['password'])
        ];

        return $this->accountRepository->createAccount($dataCreate);
    }

    public function updateAccount($data) {
        $dataUpdate = [
            'login' => $data['login'],
            'phone' => $data['phone'],
//            'password' => Hash::make($data['password'])
            'password' => md5($data['password'])
        ];

        return $this->accountRepository->updateAccount($dataUpdate);
    }

    public function deleteAccount($data) {
        return $this->accountRepository->deleteAccount($data);
    }

    public function getListAccount() {
        $limit = Constant::LIMIT_LIST_ACCOUNT;
        return $this->accountRepository->getListAccount($limit);
    }

    public function getAccount($data) {
        return $this->accountRepository->getAccount($data);
    }

}
