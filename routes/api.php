<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['middleware' => 'throttle:5,1'],function(){
    Route::post('login', [UserController::class,'login']);
    Route::post('register', [UserController::class,'register']);
    Route::middleware('auth:api')->group(function () {
        Route::resource('employee', EmployeeController::class);
        Route::resource('Company', CompanyController::class);
        Route::get('user', 'UserController@details');
    })->middleware('MyMiddleware', 'auth:api');

});