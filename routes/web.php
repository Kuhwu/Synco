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


Route::group(['middleware' => 'admin'],function(){
    Route::get('/admin/dashboard', function () {
        return view('Admin.admindash');
    });
});

Route::group(['middleware' => 'teacher'],function(){
    Route::get('/teacher/dashboard', function () {
        return view('Admin.admindash');
    });
});

Route::group(['middleware' => 'student'],function(){
    Route::get('/student/dashboard', function () {
        return view('Admin.admindash');
    }); 
});