<?php

namespace App\Http\Controllers;
use App\Models\Mrequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class MeetController extends Controller
{
     
    public function dash(){
        $meet = Mrequest::all();
        $a = Schedule::all();
        return view('dash.meet', compact('meet', 'a'));
    }

  

    public function meet_view(){
        return view('meet.add_meet');
     }

     public function approve_view($id)
     {
         return view('meet.approve_meet', ['id' => $id]);
     }
     

    
    
     public function add_meet(Request $request)
     {
        

            $request->validate([
                'name' => 'required',
                'email' => 'required', 
                'mobile' => 'required',
                'topic' => 'required',
            ]);
     
         $meet = Mrequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'topic' => $request->topic,
         ]);
     
         if ($meet) {
            
                 return redirect('teacher');
            
         }
     
         return redirect('teacher')->withError('Registration failed.');
     }




     public function approve_meet(Request $request, $id)
     {
         $validatedData = $request->validate([
             'teacher_id' => 'required',
         ]);
     
        
         $request = Mrequest::find($id);
     
         if ($request) {
             $schedule = Schedule::create([
                 'teacher_id' => $validatedData['teacher_id'],
                 'name' => $request->name,
                 'email' => $request->email,
                 'mobile' => $request->mobile,
                 'topic' => $request->topic,
             ]);
     
             if ($schedule) {
                 $request->delete();
                 
                 return redirect('teacher')->withSuccess('Meeting scheduled successfully.');
             }
         }
     
         return redirect('teacher')->withError('Request not found or meeting could not be scheduled.');
     }
     





     public function destroy(Mrequest $meet){
        $meet->delete();
        return redirect(route('dashboard_m'))->with('success','Meet deleted successfully');
    }

   
    public function destroy2(Schedule $meet){
        $meet->delete();
        return redirect(route('dashboard_m'))->with('success','Meet deleted successfully');
    }
}
