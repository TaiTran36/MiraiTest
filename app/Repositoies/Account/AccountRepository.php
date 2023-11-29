<?php

namespace App\Repositoies\Account;

use App\Models\Accounts;

class AccountRepository
{
    protected $model;
    public function __construct(Accounts $accounts)
    {
        $this->model = $accounts;
    }

    public function checkExistAccount($data) {
        return $this->model->where('login', $data)->exists();
    }

    public function createAccount($data) {
        return $this->model->create($data);
    }

    public function updateAccount($data) {
        return $this->model->where('login', $data['login'])->update(['password' => $data['password'], 'phone' => $data['phone']]);
    }

    public function deleteAccount($data) {
        return $this->model->where('login', $data['login'])->delete();
    }

    public function getListAccount($limit) {
        return $this->model->paginate($limit);
    }

    public function getAccount($data) {
        return $this->model->where('login', (string)$data['login'])->get();
    }
}
