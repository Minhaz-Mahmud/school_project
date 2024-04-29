<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{




    public function dash(){
        $notice = Notice::all();
    
        return view('dash.notice', ['notice' => $notice]);
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
        return redirect(route('dashboard'))->with('success','Admin deleted successfully');
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

    

}
