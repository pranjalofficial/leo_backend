<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('simple-qr-code', function () {
    return QrCode::size(200)->generate('Table no.22');
});

Route::get('/dashboard',[TableController::class,'view_rest']);

Route::post('/add_rest',[TableController::class,'add_rest']);

Route::get('qrCode/{data}',[TableController::class,'text']);

Route::get('/rest1',[RestarauntsContoller::class,'getRestarants']);

Route::get('branch',[TableController::class,'view_branch']);

Route::get('/branch/table/{id}',[TableController::class,'getTableDetails']);

Route::get('/table/order/{id}',[TableController::class,'show_order']);
