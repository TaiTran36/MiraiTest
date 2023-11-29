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
    Route::post('/create', 'CreateController@createAccount');
    Route::post('/update', 'UpdateController@updateAccount');
    Route::post('/delete', 'DeleteController@deleteAccount');
    Route::get('/all', 'ListController@listAccount');
    Route::get('/detail', 'DetailController@detailAccount');

    Route::get('/showSerial', 'ShowSerialController@showSerial');
    Route::get('/all-same-name', 'ShowAllSameFileNameController@showAllSameFilename');


});
