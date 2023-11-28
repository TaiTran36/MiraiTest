<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public string $logUID;

    /**
     * Initialization
     */
    public function __construct()
    {
        //Generate a unique ID for linking operation logs
        $this->logUID = uniqid(rand().'_');
        config(['app.log_uid' => $this->logUID]);
    }
}
