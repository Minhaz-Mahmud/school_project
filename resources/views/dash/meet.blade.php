<br><br>
        <a
    href="{{ route('add_meet') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add  a meeting
  </a><br><br><br>


  <table border="1">
       <tr>
          <th>ID</th>
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
            <td><form  method="post" action="{{route('meet.destroy',['id' => $meet->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>
