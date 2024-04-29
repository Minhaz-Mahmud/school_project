<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dash(){
        $admin = Admin::all();
    
        return view('dash.admin', ['admin' => $admin]);
    }

    public function index(){
        return view('auth_admin.login');
     }
  
     public function login(Request $request){
          // dd($request->all());
              $request->validate([
              'email'=>'required',
              'password'=>'required'
          ]);
  
          if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Authentication successful
            return redirect('dash');
        } else {
            // Authentication failed
            return redirect('login')->withError('Login details are not valid');
        }
  
     }
  
     public function register_view(){
      return view('auth_admin.register');
   }
  
  
   public function register(Request $request)
   {
       $request->validate([
           'username' => 'required',
           'email' => 'required|email',
           'password' => 'required',
       ]);
   
       $admin = Admin::create([
           'username' => $request->username,
           'email' => $request->email,
           'password' => Hash::make($request->password)
       ]);
   
       if ($admin) {
           if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
               return redirect('dash');
           }
       }
   
       return redirect('add')->withError('Registration failed.');
   }


   
//    public function dash(){
//     $admin=Admin::all();
//     return view ('dashboard',['admin'=>$admin]);
//  }
   
   
   
  
   public function home(){
      return view('home');
   }
  
   public function logout(){
     Session::flush();
     Auth::logout();
     return redirect('');    
  }


  public function edit(admin $admin){
    return view('auth_admin.edit',['admin'=>$admin]);
}


public function update(Admin $admin,Request $request){
    $data=$request->validate([
           'username' => 'required',
           'email' => 'required|email',
           'password' => 'required',
       ]);   
       
       $admin->update($data);
       return redirect(route('dashboard'))->with('success','Student updated successfully');
}
  
  public function destroy(Admin $admin){
    $admin->delete();
    return redirect(route('dashboard'))->with('success','Product deleted successfully');
}
}
