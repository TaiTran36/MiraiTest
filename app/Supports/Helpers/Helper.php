<?php

namespace App\Supports\Helpers;

class Helper
{
    public static function generateLogID(): string
    {
        return uniqid(rand().'_');
    }
}
