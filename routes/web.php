<?php

use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[WebAuthController::class,'login']);
Route::post('login',[WebAuthController::class,'Authlogin']);
Route::get('logout',[WebAuthController::class,'logout']);


Route::get('/admin/dashboard', function () {
    return view('Admin.admindash');
});

Route::get('/admin/admin/list', function () {
    return view('Admin.admin.list');
});