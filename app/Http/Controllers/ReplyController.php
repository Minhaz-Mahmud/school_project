<?php

namespace App\Http\Controllers;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Admission;
use App\Models\User;

class ReplyController extends Controller
{

    public function reply_view($r_id){
        return view('reply.register',['r_id'=>$r_id]);
     }


     public function admission_reply_view($r_id){
        return view('reply.admission_reg',['r_id'=>$r_id]);
     }
    
    
     public function add_reply($id,Request $request)
     {
        $validatedData =   $request->validate([
             'topic' => 'required',
             'message' => 'required',
         ]);

         $req = Schedule::where('request_id',$id)->first();
          
         $reply = Reply::create([
            'request_id' => $req->request_id,
             'topic' =>  $validatedData['topic'],
             'message' => $validatedData['message'],
         ]);
     
         if ($reply) {
                  $req->delete();
                 return redirect('teacher_profile');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function admission_add_reply($id,Request $request)
     {
        $validatedData =   $request->validate([
             'topic' => 'required',
             'message' => 'required',
         ]);

         $req = Admission::where('request_id',$id)->first();
          
         $reply = Reply::create([
            'request_id' => $req->request_id,
             'topic' =>  $validatedData['topic'],
             'message' => $validatedData['message'],
         ]);
     
         if ($reply) {
                  $req->delete();
                 return redirect('dashboard');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function destroy(Reply $reply){
        $reply->delete();
        return redirect(route('user_profile'))->with('success','Message deleted successfully');
    }
}
