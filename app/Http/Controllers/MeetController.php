<?php

namespace App\Http\Controllers;
use App\Models\Mrequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Log;


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
         // Validate the request data
         $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'mobile' => 'required',
             'topic' => 'required',
         ]);
     
         // Log request data
         Log::info('Request data: ', $request->all());
     
         // Retrieve the user ID from the session
         $userId = session('u_user');
        


     
         // Log session data
         Log::info('Session user_id: ' . $userId);
     
         // Check if the user ID exists
         if (!$userId) {
             return redirect('u_login')->withErrors('You need to login first.');
         }
     
         // Attempt to create the meet request
         try {
             $meet = Mrequest::create([
                 'request_id' => $userId, // Use the user ID retrieved from the session
                 'name' => $request->name,
                 'email' => $request->email,
                 'mobile' => $request->mobile,
                 'topic' => $request->topic,
             ]);
     
             if ($meet) {
                 return redirect('teacher')->with('status', 'Meeting request added successfully.');
             }
         } catch (\Exception $e) {
             // Log the error with detailed information
             Log::error('Meeting request creation failed: ' . $e->getMessage(), ['exception' => $e]);
             return redirect('teacher')->withErrors('Registration failed due to an error.');
         }
     
         return redirect('teacher')->withErrors('Registration failed.');
     }
     
     




     public function approve_meet(Request $request, $id)
     {
         $validatedData = $request->validate([
             'teacher_id' => 'required',
         ]);
     
        
         $request = Mrequest::find($id);


         if ($request) {
             $schedule = Schedule::create([
                'request_id' => $request->request_id,
                 'teacher_id' => $validatedData['teacher_id'],
                 'name' => $request->name,
                 'email' => $request->email,
                 'mobile' => $request->mobile,
                 'topic' => $request->topic,
             ]);
     
             if ($schedule) {
                 $request->delete();
                 
                 return redirect('dash_m')->withSuccess('Meeting scheduled successfully.');
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
