<table border="1">
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Delete</th>
       </tr>


       @foreach($a as $a)
         <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->name}}</td>
            <td>{{$a->email}}</td>
            <td>{{$a->message}}</td>
            

           
            <td><form  method="post" action="{{route('notice.destroy2',['message'=>$a])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>
