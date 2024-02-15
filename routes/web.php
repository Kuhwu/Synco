<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
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
});

Route::group(['middleware' => 'manager'],function(){

    Route::get('/manager/manager/add',[ManagerController::class,'add']);
    Route::get('/manager/manager/list',[ManagerController::class,'managerlist']);
    Route::get('/manager/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/manager/manager/edit/{id}',[ManagerController::class,'edit']);   
    Route::get('/manager/manager/delete/{id}',[ManagerController::class,'delete']);     

    Route::post('/manager/manager/edit/{id}',[ManagerController::class,'update']);    
    Route::post('/manager/manager/add',[ManagerController::class,'insert'])->name('insert');
});

Route::group(['middleware' => 'teacher'],function(){

    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'student'],function(){

    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);
});

