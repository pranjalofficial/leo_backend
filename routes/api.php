<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestarauntsController;

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

Route::get('/menu/{id}',[RestarauntsController::class,'get_menu']);

Route::get('/add_ons/{id}',[RestarauntsController::class,'get_addons']);

Route::post('/ordereItems',[RestarauntsController::class,'addOrderItem']);

Route::put('/removeItem',[RestarauntsController::class,'removeItem']);

Route::get('/login',[RestarauntsController::class,'login']);

Route::get('/register',[RestarauntsController::class,'register']);

Route::get('/rest',[RestarauntsController::class,'getRestarants']);

