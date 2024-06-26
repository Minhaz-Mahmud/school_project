<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

  


    public function index(){
        return view('teacher.login');
     }

    public function teacher_profile()
    {
        $user = Auth::guard('teacher_guard')->user();
        return view('teacher.own_profile', ['user' => $user]);
    }
    

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        if (Auth::guard('teacher_guard')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('teacher_guard')->user();
            return redirect()->route('teacher_profile')->with('user', $user);
        } else {
            return redirect('t_login')->withError('Login details are not valid');
        }
    }
    
    


    
    public function dash(){
        $teacher = Teacher::all();
    
        return view('dash.teacher', ['teacher' => $teacher]);
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('');    
   
     }
     
    public function teacher_view(){
        return view('teacher.register');
     }


     public function dash_list(){
        $teacher = Teacher::all();
        return view('teacher.teacher_list', ['teacher' => $teacher]);
    }
    

    public function profile(Teacher $teacher){
        return view('teacher.profile',['teacher'=>$teacher]);
    }
    
    
     public function add_teacher(Request $request)
     {
         $request->validate([
             'image' => 'required|mimes:png,jpg,jpeg,webp',
             'name' => 'required',
             'qualification' => 'required',
             'gender' => 'required',
             'age' => 'required',
             'designation'  => 'required',
             'email' => 'required|email|unique:teacher,email',
             'password' => 'required',

         ]);

         if($request->has('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/';
            $file->move($path,$filename);
         }
     
         $teacher = Teacher::create([
             'image' => $path.$filename,
             'name' => $request->name,
             'qualification' => $request->qualification,
             'gender' => $request->gender,
             'age' =>$request->age,
             'designation'  => $request->designation,
             'email' => $request->email,
             'password' => Hash::make($request->password)

         ]);
     
         if ($teacher) {
            
            return redirect(route('dashboard'))->with('success','Teacher added successfully');
            
         }
     
         return redirect('add_teacher')->withError('Registration failed.');
     }


     public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect(route('dashboard'))->with('success','Teacher deleted successfully');
    }

    

    public function edit(Teacher $teacher){
        return view('teacher.edit',['teacher'=>$teacher]);
    }
    
    
    public function update(int $id, Request $request)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'name' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'designation'  => 'required',
            'email' => 'required',
            'password' => 'nullable', 
        ]);
    
        $teacher = Teacher::findOrFail($id);
    
        $path = '';
        $filename = '';
    
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/';
            $file->move($path, $filename);
            if (File::exists($teacher->image)) {
                File::delete($teacher->image);
            }
        }
    
        $updatedData = [
            'image' => $path . $filename, 
            'name' => $request->name,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'age' => $request->age,
            'designation'  => $request->designation,
            'email' => $request->email,
        ];
    
       
        if ($request->filled('password')) {
            $updatedData['password'] = Hash::make($request->password);
        }
    
        $teacher->update($updatedData);
    
        return redirect(route('teacher_profile'))->with('success', 'Teacher updated successfully');
    }
    
    
    
}
