<table border="1">
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Class</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Previous School</th>
          <th>Delete</th>
       </tr>


       @foreach($a as $a)
         <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->name}}</td>
            <td>{{$a->class}}</td>
            <td>{{$a->gender}}</td>
            <td>{{$a->age}}</td>
            <td>{{$a->previous_school}}</td>

           
            <td><form  method="post" action="{{route('admission.destroy',['admission'=>$a])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>
