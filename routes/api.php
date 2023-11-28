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


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Route::group(['prefix' => 'â','middleware' => 'auth:sanctum'], function() {
//    Route::get('/', [PostsController::class,'index']);
//    Route::post('add', [PostsController::class,'add']);
//    Route::post('update/{id}', [PostsController::class,'update']);
//    Route::get('edit/{id}', [PostsController::class,'edit']);
//    Route::delete('delete/{id}', [PostsController::class,'delete']);
//});

Route::group(['namespace' => 'App\Http\Controllers\API\Accounts', 'prefix' => 'accounts'], function () {
    Route::post('/', 'RegisterController@run');
    Route::post('/create', 'CreateController@run');
    Route::post('/update', 'UpdateController@run');
    Route::get('/detail', 'DetailController@run');
    Route::get('/detail-all', 'DetailAllController@run');
    Route::post('/delete', 'DeleteController@run');
    Route::post('/export-pdf', 'ExportController@exportPDF');
});
