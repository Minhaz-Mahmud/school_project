<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{    public function admission_view(){
    return view('admission');
 }


 public function admission(Request $request)
 {
     $request->validate([
         'name' => 'required',
         'class' => 'required',
         'age' => 'required',
         'gender' => 'required',
         'previous_school' => 'required',
     ]);
 
     $notice = Admission::create([
         'name' => $request->name,
         'class' => $request->class,
         'age' => $request->age,
         'gender' => $request->gender,
         'previous_school' => $request->previous_school,
     ]);
 
     if ($notice) {
        
             return redirect('home');
        
     }
 
    //  return redirect('home')->withError('Registration failed.')
 }
}