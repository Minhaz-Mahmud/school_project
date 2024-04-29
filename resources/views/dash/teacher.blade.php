
        <br><br>
        <a
    href="{{ route('add_teacher') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add  a Teacher
  </a><br><br><br>



  <table border="1">
       <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Qualification</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Designation</th>
          <th>Edit</th>
          <th>Delete</th>
          
       </tr>


       @foreach($teacher as $teacher)
         <tr>
            <td>{{$teacher->id}}</td>
            <td><img src="{{asset($teacher->image)}}" style="width:70px; height:70px" alt="img"></td>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->qualification}}</td>
            <td>{{$teacher->gender}}</td>
            <td>{{$teacher->age}}</td>
            <td>{{$teacher->designation}}</td>
            
            <td><a href="{{route('teacher.edit',['teacher'=>$teacher])}}">Edit</a></td>
            <td><form  method="post" action="{{route('teacher.destroy',['teacher'=>$teacher])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
         </tr>

       @endforeach
        </table>


        
        <br><br>
