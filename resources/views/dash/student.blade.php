<a
    href="{{ route('register') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
     <br><br>
 Register a student
  </a><br><br>
  <div>
        @if(session()->has('success'))
          <div>
            {{session('success')}}
          </div>
        @endif
    </div><br><br><br><br><br>


      
  <table border="1">
       <tr>
          <th>ID</th>
          <td>Image</td>
          <th>Name</th>
          <th>Gender</th>
          <th>DOB</th>
          <th>Roll</th>
          <th>Blood Group</th>
          <th>Religion</th>
          <th>Email</th>
          <th>Class</th>
          <th>Section</th>
          <th>Phone Number</th>
          <th>Edit</th>
          <th>Delete</th>
       </tr>

       @foreach($students as $student)
         <tr>
            <td>{{$student->id}}</td>
            <td><img src="{{asset($student->image)}}" style="width:70px; height:70px" alt="img"></td>
            <td>{{$student->name}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->date_of_birth}}</td>
            <td>{{$student->roll}}</td>
            <td>{{$student->blood_group}}</td>
            <td>{{$student->religion}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->class}}</td>
            <td>{{$student->section}}</td>
            <td>{{$student->phone_number}}</td>
            <td><a href="{{route('student.edit',['student'=>$student])}}">Edit</a></td>
           
            <td><form  method="post" action="{{route('student.destroy',['student'=>$student])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
         </tr>
       @endforeach
        </table>

<br><br>



<br><br>
        <a
    href="{{ route('add_marks') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add  Studnts Marks
  </a>


  </a><br><br><br>


<table border="1">
     <tr>
        <th>ID</th>
        <th>Exam Name</th>
        <th>Bangla</th>
        <th>English</th>
        <th>Math</th>
        <th>Science</th>
        <th>Edit</th>
        <th>Delete</th>
        
     </tr>


     @foreach($a as $a)
       <tr>
          <td>{{$a->id}}</td>
          <td>{{$a->exam}}</td>
          <td>{{$a->bangla}}</td>
          <td>{{$a->english}}</td>
          <td>{{$a->math}}</td>
          <td>{{$a->science}}</td>
          <td><a href="{{route('marks.edit',['marks'=>$a])}}">Edit</a></td>
          <td><form  method="post" action="{{route('marks.destroy',['marks'=>$a])}}">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Delete">
              </form></td>
       </tr>

     @endforeach
      </table>