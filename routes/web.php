<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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
Route::get('logout',[WebAuthController::class,'logout']);
Route::get('forgot-password',[WebAuthController::class,'forgotpassword']);
Route::get('reset/{token}',[WebAuthController::class,'reset']);

Route::post('login',[WebAuthController::class,'Authlogin'])->name('login');
Route::post('forgot-password',[WebAuthController::class,'PostForgotPassword']);
Route::post('reset/{token}',[WebAuthController::class,'PostReset']);


Route::get('/admin/dashboard', function () {
    return view('Admin.admindash');
});


Route::group(['middleware' => 'admin'],function(){

    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/admin/admin/list',[AdminController::class,'list']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert'])->name('insert');    
});

Route::group(['middleware' => 'teacher'],function(){

    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'student'],function(){

    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);
});