<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TeacherController;

use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dash', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dash',[StudentsController::class,'dash'])->name('dashboard');



// Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[StudentsController::class,'index'])->name('login');
    Route::post('/login',[StudentsController::class,'login'])->name('login');

    Route::get('/a_login',[AdminController::class,'index'])->name('a_login');
    Route::post('/a_login',[AdminController::class,'login'])->name('a_login');
    
    Route::get('/a_register',[AdminController::class,'register_view'])->name('a_register');
    Route::post('/a_register',[AdminController::class,'register'])->name('a_register');
    // });
    
    Route::get('/register',[StudentsController::class,'register_view'])->name('register');
    Route::post('/register',[StudentsController::class,'register'])->name('register');
    // Route::group(['middleware'=>'auth'],function(){


    Route::get('/home',[StudentsController::class,'home'])->name('home');
    Route::get('/profile',[StudentsController::class,'profile'])->name('profile');
    Route::get('/logout',[StudentsController::class,'logout'])->name('logout');
    Route::delete('/student/{student}/destroy',[StudentsController::class,'destroy'])->name('student.destroy');
    Route::get('/student/{student}/edit',[StudentsController::class,'edit'])->name('student.edit');
   Route::put('/student/{student}/update',[StudentsController::class,'update'])->name('student.update');
    
    // });

    Route::delete('/admin/{admin}/destroy',[AdminController::class,'destroy'])->name('admin.destroy');
    Route::get('/admin/{admin}/edit',[AdminController::class,'edit'])->name('admin.edit');
    Route::put('/admin/{admin}/update',[AdminController::class,'update'])->name('admin.update');

    Route::get('/add_notice',[NoticeController::class,'notice_view'])->name('add_notice');
    Route::post('/add_notice',[NoticeController::class,'add_notice'])->name('add_notice');
    Route::delete('/notice/{notice}/destroy',[NoticeController::class,'destroy'])->name('notice.destroy');
    Route::get('/notice/{notice}/edit',[NoticeController::class,'edit'])->name('notice.edit');
    Route::put('/notice/{notice}/update',[NoticeController::class,'update'])->name('notice.update');


    Route::get('/add_teacher',[TeacherController::class,'teacher_view'])->name('add_teacher');
    Route::post('/add_teacher',[TeacherController::class,'add_teacher'])->name('add_teacher');
    Route::delete('/teacher/{teacher}/destroy',[TeacherController::class,'destroy'])->name('teacher.destroy');
    Route::get('/teacher/{teacher}/edit',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::put('/teacher/{id}/update',[TeacherController::class,'update'])->name('teacher.update');

    Route::get('/teacher',[TeacherController::class,'dash'])->name('teacher');
    Route::get('/teacher/{teacher}/profile',[TeacherController::class,'profile'])->name('teacher.profile');

