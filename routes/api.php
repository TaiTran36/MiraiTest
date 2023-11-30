<?php

use App\Http\Controllers\API\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'App\Http\Controllers\API\Accounts', 'prefix' => 'accounts'], function () {
    Route::post('/create', 'CreateController@execute');
    Route::post('/update', 'UpdateController@execute');
    Route::post('/delete', 'DeleteController@execute');
    Route::get('/all', 'ListController@execute');
    Route::get('/detail', 'DetailController@execute');

    Route::get('/showSerial', 'ShowSerialController@showSerial');
    Route::get('/all-same-name', 'ShowAllSameFileNameController@showAllSameFilename');


});
