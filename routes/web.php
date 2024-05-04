<?php
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\MeetController;
use App\Http\Middleware\StudentAuthMiddleware;
use App\Http\Middleware\AdminAuthMiddleware;

use App\Models\Admin;
use Illuminate\Support\Facades\Route;

// Route::get('/login', function () {
//     return view('welcome');
// })->name('admin_login');

Route::get('/admin_login',[StudentsController::class,'admin_login'])->name('admin_login');

// Route::get('/dash', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/',[StudentsController::class,'home'])->name('home');
Route::get('/logout',[StudentsController::class,'logout'])->name('logout');

Route::get('/admission_f',[AdmissionController::class,'admission_view'])->name('admission_f');
Route::post('/admission',[AdmissionController::class,'admission'])->name('admission');
Route::delete('/admission/{admission}/destroy',[AdmissionController::class,'destroy'])->name('admission.destroy');


// Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[StudentsController::class,'index'])->name('login');
    Route::post('/login',[StudentsController::class,'login'])->name('login');

    Route::get('/a_login',[AdminController::class,'index'])->name('a_login');
    Route::post('/a_login',[AdminController::class,'login'])->name('a_login');
    
   
    Route::get('/teacher',[TeacherController::class,'dash_list'])->name('teacher');
    Route::get('/teacher/{teacher}/profile',[TeacherController::class,'profile'])->name('teacher.profile');






    Route::get('/teacher_profile',[TeacherController::class,'teacher_profile'])->name('teacher_profile');
    Route::get('/t_login',[TeacherController::class,'index'])->name('t_login');
    Route::post('/t_login',[TeacherController::class,'login'])->name('t_login');


    Route::post('/add_msg',[NoticeController::class,'add_msg'])->name('message');
    Route::delete('/message/{message}/destroy',[NoticeController::class,'destroy2'])->name('notice.destroy2');





    Route::get('/add_meet',[MeetController::class,'meet_view'])->name('add_meet');
    Route::post('/add_meet',[MeetController::class,'add_meet'])->name('add_meet');




    

    
    // ======================================= =============Student Middlewarw=======================================================
    // ============================================================================================================================


    Route::middleware(StudentAuthMiddleware::class)->group(function () {
        Route::get('/profile',[StudentsController::class,'profile'])->name('profile');
    });


    // ======================================= =============Admin Middlewarw=======================================================
    // ============================================================================================================================



    Route::middleware(AdminAuthMiddleware::class)->group(function () {
        Route::get('/dash',[StudentsController::class,'dash_all'])->name('dashboard');
        Route::get('/dash_s',[StudentsController::class,'dash'])->name('dashboard_s');
        Route::get('/dash_a',[AdminController::class,'dash'])->name('dashboard_a');
        Route::get('/dash_n',[NoticeController::class,'dash'])->name('dashboard_n');
        Route::get('/dash_t',[TeacherController::class,'dash'])->name('dashboard_t');
        Route::get('/dash_m',[MeetController::class,'dash'])->name('dashboard_m');

        
        Route::get('/dash_admission',[AdmissionController::class,'dash'])->name('dashboard_ad');
        Route::get('/dash_message',[NoticeController::class,'dash_message'])->name('dashboard_me');
       




        Route::get('/a_register',[AdminController::class,'register_view'])->name('a_register');
        Route::post('/a_register',[AdminController::class,'register'])->name('a_register');
     
        
        Route::get('/register',[StudentsController::class,'register_view'])->name('register');
        Route::post('/register',[StudentsController::class,'register'])->name('register');
       
       Route::delete('/student/{student}/destroy',[StudentsController::class,'destroy'])->name('student.destroy');
        Route::get('/student/{student}/edit',[StudentsController::class,'edit'])->name('student.edit');
        Route::put('/student/{id}/update',[StudentsController::class,'update'])->name('student.update');
        
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

  
        Route::get('/add_marks',[MarksController::class,'marks_view'])->name('add_marks');
        Route::post('/add_marks',[MarksController::class,'add_marks'])->name('add_marks');
        Route::delete('/marks/{marks}/destroy',[MarksController::class,'destroy'])->name('marks.destroy');
        Route::get('/marks/{marks}/edit',[MarksController::class,'edit'])->name('marks.edit');
        Route::put('/marks/{id}/update',[MarksController::class,'update'])->name('marks.update');

   

        Route::get('/approve_meet/{id}', [MeetController::class,'approve_view'])->name('approve_meet');
        Route::post('/approve_meet/{id}', [MeetController::class,'approve_meet'])->name('approve_meet');
        Route::delete('/meet/{meet}/destroy',[MeetController::class,'destroy'])->name('meet.destroy');
        Route::delete('/meet/{meet}/destroy2',[MeetController::class,'destroy2'])->name('meet.destroy2');

    
    });
    