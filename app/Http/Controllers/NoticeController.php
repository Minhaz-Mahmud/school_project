<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use App\Models\Message;

use Illuminate\Http\Request;

class NoticeController extends Controller
{




    public function dash(){
        $notice = Notice::all();
    
        return view('dash.notice', ['notice' => $notice]);
    }

    public function dash_message(){
        $a = Message::all();
    
        return view('dash.message', ['a' => $a]);
    }
    public function notice_view(){
        return view('notice.register');
     }
    
    
     public function add_notice(Request $request)
     {
         $request->validate([
             'head' => 'required',
             'des' => 'required',
         ]);
     
         $notice = Notice::create([
             'head' => $request->head,
             'des' => $request->des,
         ]);
     
         if ($notice) {
            
                 return redirect('dash');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function destroy(Notice $notice){
        $notice->delete();
        return redirect(route('dashboard_n'))->with('success','Admin deleted successfully');
    }

    public function destroy2(Message $message){
        $message->delete();
        return redirect(route('dashboard_me'))->with('success','Admin deleted successfully');
    }



    

    public function edit(notice $notice){
        return view('notice.edit',['notice'=>$notice]);
    }
    
    
    public function update(Notice $notice,Request $request){
        $data=$request->validate([
               'head' => 'required',
               'des' => 'required',
           ]);   
           
           $notice->update($data);
           return redirect(route('dashboard'))->with('success','Student updated successfully');
    }


    public function add_msg(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
    
        $notice = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

        ]);
    
        if ($notice) {
           
                return redirect('');
           
        }
    
        return redirect('add')->withError('Registration failed.');
    }





    

}
