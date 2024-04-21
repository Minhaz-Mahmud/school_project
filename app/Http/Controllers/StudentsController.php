<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Notice;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function index(){
        return view('auth.login');
     }


     public function dash(){
        $students=Student::all();
        $admin=Admin::all();
        $notice=Notice::all();
        $teacher=Teacher::all();
        return view('dashboard', compact('students', 'admin','notice','teacher'));
     }




     
     
     public function profile()
     {
         $user = Auth::guard('students')->user();
         return view('auth.profile', ['user' => $user]);
     }
     
    

  
     public function login(Request $request){
          // dd($request->all());
              $request->validate([
              'email'=>'required',
              'password'=>'required'
          ]);
  
          if (Auth::guard('students')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('students')->user();
            return redirect()->route('profile')->with('user', $user);
        } else {
            // Authentication failed
            return redirect('login')->withError('Login details are not valid');
        }
  
     }
  
     public function register_view(){
      return view('auth.register');
   }
  
  
   public function register(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'gender' => 'required',
           'birth' => 'required', // Adjust this field name if necessary
           'roll' => 'required',
           'blood' => 'required',
           'email' => 'required|email|unique:students,email',
           'class' => 'required',
           'section' => 'required',
           'phone' => 'required',
           'password' => 'required',
           'religion' => 'required', // Add validation rule for religion field
       ]);
   
       $student = Student::create([
           'name' => $request->name,
           'gender' => $request->gender,
           'date_of_birth' => $request->birth, // Adjust this field name if necessary
           'roll' => $request->roll,
           'blood_group' => $request->blood, // Adjust this field name if necessary
           'religion' => $request->religion, // Add religion field
           'email' => $request->email,
           'class' => $request->class,
           'section' => $request->section,
           'phone_number' => $request->phone, // Adjust this field name if necessary
           'password' => Hash::make($request->password)
       ]);
   
       if ($student) {
           if (Auth::guard('students')->attempt($request->only('email', 'password'))) {
               return redirect('dash');
           }
       }
   
       return redirect('register')->withError('Registration failed.');
   }

   public function edit(Student $student){
    return view('auth.edit',['student'=>$student]);
}
   public function update(Student $student,Request $request){
    $data=$request->validate([
           'name' => 'required',
           'gender' => 'required',
           'birth' => 'required', // Adjust this field name if necessary
           'roll' => 'required',
           'blood' => 'required',
           'email' => 'required|email',
           'class' => 'required',
           'section' => 'required',
           'phone' => 'required',
           'password' => 'required',
           'religion' => 'required',
       ]);   
       
       $student->update($data);
       return redirect(route('dashboard'))->with('success','Student updated successfully');
}
   
   
   
  
   public function home(){

    $students=Student::all();
    $admin=Admin::all();
    $notice=Notice::all();
    return view('home', compact('students', 'admin','notice'));
      
   }

   
  
   public function logout(){
     Session::flush();
     Auth::logout();
     return redirect('');    

  }


  public function destroy(Student $student){
    $student->delete();
    return redirect(route('dashboard'))->with('success','Admin deleted successfully');
}

}
