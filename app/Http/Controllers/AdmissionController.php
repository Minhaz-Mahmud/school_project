<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{   
    
    public function dash(){
        $a = Admission::all();
    
        return view('dash.admission', ['a' => $a]);
    }
    
    
    
    public function admission_view(){
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
     $userId = session('u_user');
     $notice = Admission::create([
         'request_id' => $userId, 
         'name' => $request->name,
         'class' => $request->class,
         'age' => $request->age,
         'gender' => $request->gender,
         'previous_school' => $request->previous_school,
     ]);
 
     if ($notice) {
        
        return redirect(route('admission_f'))->with('success','Admission Form Filled Successfully');
        
     }
 
    //  return redirect('home')->withError('Registration failed.')
 }

 public function destroy(Admission $admission){
    $admission->delete();
    return redirect(route('dashboard'))->with('success','Admission deleted successfully');
}


}
