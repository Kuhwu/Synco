<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\studentListController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\ProjectController;
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


Route::get('/',[WebAuthController::class,'loginuser'])->name('loginuser');
Route::get('/registration',[WebAuthController::class,'registration'])->name('registration');
Route::get('logout',[WebAuthController::class,'logout']);
Route::get('forgot-password',[WebAuthController::class,'forgotpassword']);
Route::get('reset/{token}',[WebAuthController::class,'reset']);

Route::post('login',[WebAuthController::class,'Authlogin'])->name('login');
Route::post('register', [WebAuthController::class, 'register'])->name('register');
Route::post('forgot-password',[WebAuthController::class,'PostForgotPassword']);
Route::post('reset/{token}',[WebAuthController::class,'PostReset']);


Route::get('/admin/dashboard', function () {
    return view('Admin.admindash');
});


Route::group(['middleware' => 'admin'],function(){

    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/admin/admin/list',[AdminController::class,'list']);



    //student
    Route::get('/admin/student/list',[studentListController::class,'studentList'])->name('student.list');
    Route::get('/admin/student/add',[studentListController::class,'add']);
    Route::get('/admin/student/edit/{id}',[studentListController::class,'edit']);   
    Route::get('/admin/student/delete/{id}',[studentListController::class,'delete']);     
    Route::post('/admin/student/edit/{id}',[studentListController::class,'update']);    
    Route::post('/admin/student/add',[studentListController::class,'insert'])->name('insert');



   
});

Route::group(['middleware' => 'manager'],function(){

    Route::get('/manager/manager/add',[ManagerController::class,'add']);
    Route::get('/manager/manager/list',[ManagerController::class,'managerlist']);
    Route::get('/manager/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/manager/manager/edit/{id}',[ManagerController::class,'edit']);   
    Route::get('/manager/manager/delete/{id}',[ManagerController::class,'delete']);     

    Route::post('/manager/manager/edit/{id}',[ManagerController::class,'update']);    
    Route::post('/manager/manager/add',[ManagerController::class,'insert'])->name('insert');


 
     //student
     Route::get('/manager/student/list',[studentListController::class,'studentList']);
     Route::get('/manager/student/add',[studentListController::class,'add']);
     Route::get('/manager/student/edit/{id}',[studentListController::class,'edit']);   
     Route::get('/manager/student/delete/{id}',[studentListController::class,'delete']);     
     Route::post('/manager/student/edit/{id}',[studentListController::class,'update']);    
     Route::post('/manager/student/add',[studentListController::class,'insert'])->name('insert');
 
   
});

Route::group(['middleware' => 'teacher'],function(){

    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'student'],function(){

    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);

    //task
    Route::get('/student/assigned',[taskController::class,'Assigned']);
    Route::get('/student/accept',[taskController::class,'Accept']);
    Route::get('/student/done',[taskController::class,'Done']);

     //project
     Route::get('/student/project/list', [ProjectController::class, 'project']);
     Route::get('/student/project/project/add', [ProjectController::class, 'add']);
     Route::post('/student/ajax_get_subject', [ProjectController::class, 'ajax_get_subject']);
     Route::post('/student/project/project/add', [ProjectController::class, 'insert']);
     Route::get('/student/project/project/edit/{id}', [ProjectController::class, 'edit']);
     Route::post('/student/project/project/edit/{id}', [ProjectController::class, 'update']);
     Route::post('student/project/project/delete/{id}', [ProjectController::class, 'delete']);
     
     //profile
     Route::get('/student/profile', function () {
        return view('profile.blade.php');
    });
});

