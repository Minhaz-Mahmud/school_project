<a
    href="{{ route('add_notice') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add Notice
  </a><br><br><br>


  <table border="1">
       <tr>
          <th>ID</th>
          <th>Header</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delete</th>
          
       </tr>


       @foreach($notice as $notice)
         <tr>
            <td>{{$notice->id}}</td>
            <td>{{$notice->head}}</td>
            <td>{{$notice->des}}</td>
            <td><a href="{{route('notice.edit',['notice'=>$notice])}}">Edit</a></td>
            <td><form  method="post" action="{{route('notice.destroy',['notice'=>$notice])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form></td>
         </tr>

       @endforeach
        </table>