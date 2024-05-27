<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

    public function profile()
    {
        if (session()->has('u_user')) {
            $user = User::find(session('u_user'));
    
            if ($user) {
                return view('user_profile', ['user' => $user]);
            }
        }
    
        return redirect('login')->withErrors('You need to login first.');
    }



    public function u_login(){
        return view('user.login');
     }

    // public function teacher_profile()
    // {
    //     $user = Auth::guard('teacher_guard')->user();
    //     return view('teacher.own_profile', ['user' => $user]);
    // }
    

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            session(['u_user' => $user->id]);
    
            return redirect()->route('user_profile');
        } else {
            return redirect('u_login')->withErrors('Login details are not valid');
        }
    }
    
    
    
    
    // public function dash(){
    //     $teacher = Teacher::all();
    
    //     return view('dash.teacher', ['teacher' => $teacher]);
    // }

    public function logout(Request $request)
    {
        $request->session()->forget('u_user');
    
        return redirect('')->with('status', 'You have been logged out');
    }
    




     
    public function user_view(){
        return view('user.register');
     }


    //  public function dash_list(){
    //     $teacher = Teacher::all();
    //     return view('teacher.teacher_list', ['teacher' => $teacher]);
    // }
    

    // public function profile(Teacher $teacher){
    //     return view('teacher.profile',['teacher'=>$teacher]);
    // }
    
    
     public function add_user(Request $request)
     {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $admin =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        if ($admin) {
            
                return redirect('');
            
        }
    
        return redirect('add_user')->withError('Registration failed.');
     }


     public function destroy(User $user){
        $user->delete();
        return redirect(route('dashboard'))->with('success','Teacher deleted successfully');
    }

    

    public function edit(User $user){
        return view('user.edit',['user'=>$user]);
    }
    
    public function update($id, Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable', 
    ]);   

    $updatedData = [
        'name' => $request->username,
        'email' => $request->email,
    ];

   
    if ($request->filled('password')) {
        $updatedData['password'] = Hash::make($request->password);
    }

    $id->update($updatedData);

    return redirect(route(''))->with('success', 'User updated successfully');
}
}
