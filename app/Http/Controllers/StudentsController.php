<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Notice;
use App\Models\Marks;
use App\Models\Teacher;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class StudentsController extends Controller
{
    public function index(){
        return view('auth.login');
     }

     public function admin_login(){
        return view('welcome');
     }



     public function dash_all(){
        $students=Student::all();
        $admin=Admin::all();
        $notice=Notice::all();
        $teacher=Teacher::all();
        return view('dashboard', compact('students', 'admin','notice','teacher'));
     }


     public function dash(){
        $students = Student::all();
        $a = Marks::all();
    
        return view('dash.student', compact('students', 'a'));
    }
    

    // public function dash_marks(){
    //     $a = Marks::all();
    
    //     return view('dash.student', ['a' => $a]);
    // }



     
     
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
         'image' => 'required|mimes:png,jpg,jpeg,webp',
           'name' => 'required',
           'gender' => 'required',
           'birth' => 'required', 
           'roll' => 'required',
           'blood' => 'required',
           'email' => 'required|email|unique:students,email',
           'class' => 'required',
           'section' => 'required',
           'phone' => 'required',
           'password' => 'required',
           'religion' => 'required', 
       ]);
           
       if($request->has('image')){
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $path='uploads/';
        $file->move($path,$filename);
     }

       $student = Student::create([
           'image' => $path.$filename,
           'name' => $request->name,
           'gender' => $request->gender,
           'date_of_birth' => $request->birth, 
           'roll' => $request->roll,
           'blood_group' => $request->blood, 
           'religion' => $request->religion, 
           'email' => $request->email,
           'class' => $request->class,
           'section' => $request->section,
           'phone_number' => $request->phone, 
           'password' => Hash::make($request->password)
       ]);
   
       if ($student) {
        //    if (Auth::guard('students')->attempt($request->only('email', 'password'))) {
               return redirect('dash');
        //    }
       }
   
       return redirect('register')->withError('Registration failed.');
   }

   public function edit(Student $student){
    return view('auth.edit',['student'=>$student]);
}
public function update(int $id, Request $request)
{
    $data = $request->validate([
        'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        'name' => 'required',
        'gender' => 'required',
        'birth' => 'required', 
        'roll' => 'required',
        'blood' => 'required',
        'email' => 'required|email',
        'class' => 'required',
        'section' => 'required',
        'phone' => 'required',
        'password' => 'nullable',
        'religion' => 'required',
    ]);   

    $student = Student::findOrFail($id);

    $path = ''; 
    $filename = ''; 
    if ($request->has('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'uploads/';
        $file->move($path, $filename);
        if (File::exists($student->image)) {
            File::delete($student->image);
        }
    }

    $updatedData = [
        'image' => $path . $filename, 
        'name' => $request->name,
        'gender' => $request->gender,
        'date_of_birth' => $request->birth, 
        'roll' => $request->roll,
        'blood_group' => $request->blood, 
        'religion' => $request->religion,
        'email' => $request->email,
        'class' => $request->class,
        'section' => $request->section,
        'phone_number' => $request->phone,
    ];

    // Update password only if provided by the user
    if ($request->filled('password')) {
        $updatedData['password'] = Hash::make($request->password);
    }

    $student->update($updatedData);

    return redirect(route('profile'))->with('success', 'Student Profile updated successfully');
}

   
   
   public function home(){

    $students=Student::all();
    $admin=Admin::all();
    $notice=Notice::all();
    return view('home', compact('students', 'admin','notice'));
      
   }

   
   public function logout()
   {
       Log::info('Before logout: ' . json_encode(session()->all()));
   
       Session::flush();
       Auth::logout();
   
       Log::info('After logout: ' . json_encode(session()->all()));
   
       return redirect('');
   }
   


  public function destroy(Student $student){
    $student->delete();
    return redirect(route('dashboard'))->with('success','Admin deleted successfully');
}


}
