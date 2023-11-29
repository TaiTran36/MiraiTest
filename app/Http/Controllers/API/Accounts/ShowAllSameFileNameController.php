<?php

namespace App\Http\Controllers\API\Accounts;

use App\Supports\Helpers\Helper;
use Illuminate\Support\Facades\Storage;

class ShowAllSameFileNameController
{
    public function __construct()
    {
    }

    public function showAllSameFilename() {
        $storage = Storage::disk('c-drive');

        $listItemFirst = $storage->allFiles(env('PATH_ACCESS_FILE_LOCAL_DISK_TEST_3_F1'));
        $listFileNameFirst = Helper::getFileName($listItemFirst);

        $listItemSecond = $storage->allFiles(env('PATH_ACCESS_FILE_LOCAL_DISK_TEST_3_F2'));
        $listFileNameSecond = Helper::getFileName($listItemSecond);

        return (array)array_intersect($listFileNameFirst, $listFileNameSecond);
    }
}
