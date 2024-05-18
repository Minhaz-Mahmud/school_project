<?php

namespace App\Http\Controllers;
use App\Models\Marks;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function marks_view(){
        return view('marks.add');
     }
    
    
     public function add_marks(Request $request)
     {
         $request->validate([
            'id' => 'required',
            'exam' => 'required',
            'bangla' => 'required',
            'english' => 'required',
            'math' => 'required',
            'science' => 'required',
            'dew' => 'required',
         ]);
     
         $marks = Marks::create([
            'id' => $request->id,
            'exam' => $request->exam,
            'bangla' => $request->bangla,
            'english' => $request->english,
            'math' => $request->math,
            'science' => $request->science,
            'dew' => $request->dew,

         ]);
     
         if ($marks) {
            
                 return redirect('dash');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function destroy(Marks $marks){
        $marks->delete();
        return redirect(route('dashboard_s'))->with('success','Admin deleted successfully');
    }

    

    public function edit(Marks $marks){
        return view('marks.edit',['marks'=>$marks]);
    }
    
    
    public function update($id,Request $request){
        $marks = Marks::findOrFail($id);
        $data=$request->validate([
            'id' => 'required',
            'exam' => 'required',
            'bangla' => 'required',
            'english' => 'required',
            'math' => 'required',
            'science' => 'required',
            'dew' => 'required',
           ]);   
           
           $marks->update($data);
           return redirect(route('dashboard_s'))->with('success','Student updated successfully');
    }



    public function updateAndCheckout($id)
    {
         $mark = Marks::find($id);
        if ($mark) {
            $mark->dew = 0;         
            $mark->save();
        }
        return redirect()->route('checkout',['id'=>$mark]);
    }
}


