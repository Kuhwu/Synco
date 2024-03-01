<?php

use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\teacherListController;
use App\Http\Controllers\studentListController;
use App\Http\Controllers\SubjectController;
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

    //teacher
    Route::get('/admin/teacher/list',[teacherListController::class,'teacherList']);
    Route::get('/admin/teacher/add',[teacherListController::class,'add']);
    Route::get('/admin/teacher/edit/{id}',[teacherListController::class,'edit']);   
    Route::get('/admin/teacher/delete/{id}',[teacherListController::class,'delete']);     
    Route::post('/admin/teacher/edit/{id}',[teacherListController::class,'update']);    
    Route::post('/admin/teacher/add',[teacherListController::class,'insert'])->name('insert');

    //student
    Route::get('/admin/student/list',[studentListController::class,'studentList']);
    Route::get('/admin/student/add',[studentListController::class,'add']);
    Route::get('/admin/student/edit/{id}',[studentListController::class,'edit']);   
    Route::get('/admin/student/delete/{id}',[studentListController::class,'delete']);     
    Route::post('/admin/student/edit/{id}',[studentListController::class,'update']);    
    Route::post('/admin/student/add',[studentListController::class,'insert'])->name('insert');

    //class
    Route::get('/admin/class/list',[SubjectController::class,'subjectList']);
    Route::get('/admin/class/add',[SubjectController::class,'add']);
    Route::get('/admin/class/edit/{id}',[SubjectController::class,'edit']);   
    Route::get('/admin/class/delete/{id}',[SubjectController::class,'delete']);     
    Route::post('/admin/class/edit/{id}',[SubjectController::class,'update']);    
    Route::post('/admin/class/add',[SubjectController::class,'insert'])->name('insert');
});

Route::group(['middleware' => 'manager'],function(){

    Route::get('/manager/manager/add',[ManagerController::class,'add']);
    Route::get('/manager/manager/list',[ManagerController::class,'managerlist']);
    Route::get('/manager/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/manager/manager/edit/{id}',[ManagerController::class,'edit']);   
    Route::get('/manager/manager/delete/{id}',[ManagerController::class,'delete']);     

    Route::post('/manager/manager/edit/{id}',[ManagerController::class,'update']);    
    Route::post('/manager/manager/add',[ManagerController::class,'insert'])->name('insert');

     //teacher
     Route::get('/manager/teacher/list',[teacherListController::class,'teacherList']);
     Route::get('/manager/teacher/add',[teacherListController::class,'add']);
     Route::get('/manager/teacher/edit/{id}',[teacherListController::class,'edit']);   
     Route::get('/manager/teacher/delete/{id}',[teacherListController::class,'delete']);     
     Route::post('/manager/teacher/edit/{id}',[teacherListController::class,'update']);    
     Route::post('/manager/teacher/add',[teacherListController::class,'insert'])->name('insert');
 
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
});

