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

         ]);
     
         if ($teacher) {
            
                 return redirect('dash');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function destroy(Teacher $teacher){
        $teacher->delete();
        return redirect(route('dashboard'))->with('success','Teacher deleted successfully');
    }

    

    public function edit(Teacher $teacher){
        return view('teacher.edit',['teacher'=>$teacher]);
    }
    
    
    public function update(int $id, Request $request){
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'name' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'designation'  => 'required',
        ]);
    
        $cat = Teacher::findOrFail($id)->firstOrFail();
        $path = ''; // Define $path variable here
        $filename = ''; // Define $filename variable here
    
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/';
            $file->move($path, $filename);
            if(File::exists($cat->image)){
                File::delete($cat->image);
            }
        }
    
        $cat->update([
            'image' => $path.$filename, // Ensure $path and $filename are defined
            'name' => $request->name,
            'qualification' => $request->qualification,
            'gender' => $request->gender,
            'age' => $request->age,
            'designation'  => $request->designation,
        ]);
    
        return redirect(route('dashboard'))->with('success', 'Teacher updated successfully');
    }
    
    
}
