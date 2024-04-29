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
         ]);
     
         $marks = Marks::create([
            'id' => $request->id,
            'exam' => $request->exam,
            'bangla' => $request->bangla,
            'english' => $request->english,
            'math' => $request->math,
            'science' => $request->science,
         ]);
     
         if ($marks) {
            
                 return redirect('dash');
            
         }
     
         return redirect('add')->withError('Registration failed.');
     }


     public function destroy(Marks $marks){
        $marks->delete();
        return redirect(route('dashboard'))->with('success','Admin deleted successfully');
    }

    

    public function edit(Marks $marks){
        return view('marks.edit',['marks'=>$marks]);
    }
    
    
    public function update(Marks $marks,Request $request){
        $data=$request->validate([
            'id' => 'required',
            'exam' => 'required',
            'bangla' => 'required',
            'english' => 'required',
            'math' => 'required',
            'science' => 'required',
           ]);   
           
           $marks->update($data);
           return redirect(route('dashboard'))->with('success','Student updated successfully');
    }
}
