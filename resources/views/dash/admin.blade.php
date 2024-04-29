<a
    href="{{ route('a_register') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add a Admin
  </a><br><br><br>


      
  <table border="1">
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Edit</th>
          <th>Delete</th>
       </tr>


       @foreach($admin as $admin)
         <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->username}}</td>
            <td>{{$admin->email}}</td>
            <td><a href="{{route('admin.edit',['admin'=>$admin])}}">Edit</a></td>
            <td><form  method="post" action="{{route('admin.destroy',['admin'=>$admin])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
         </tr>

       @endforeach
        </table>



        <br><br>
 