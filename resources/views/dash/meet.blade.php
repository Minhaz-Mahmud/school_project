<table border="1">
       <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Topic</th>
          <th>Approve</th>
          <th>Delete</th>
       </tr>


       @foreach($meet as $meet)
         <tr>
            <td>{{$meet->id}}</td>
            <td>{{$meet->name}}</td>
            <td>{{$meet->email}}</td>
            <td>{{$meet->mobile}}</td>
            <td>{{$meet->topic}}</td>

            <td><a href="{{ route('approve_meet', ['id' => $meet->id]) }}">Approve</a></td>
            <td><form  method="post" action="{{route('meet.destroy',['meet' => $meet])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>


<h1>Schedule table</h1>
        <table border="1">
       <tr>
          <th>Teacher Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Topic</th>
          <th>Delete</th>
       </tr>


       @foreach($a as $a)
         <tr>
            <td>{{$a->teacher_id}}</td>
            <td>{{$a->name}}</td>
            <td>{{$meet->email}}</td>
a           <td>{{$a->mobile}}</td>
            <td>{{$a->topic}}</td>
            <td><form  method="post" action="{{route('meet.destroy2',['meet' => $a])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>

