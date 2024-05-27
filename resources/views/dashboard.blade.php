@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: grid;
            grid-template-rows: auto 1fr auto; /* Header, Content, Footer */
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: red;
            margin-top: 20px;
            transform: translateX(-80px); /* Shift heading 80px to the left */
            text-decoration: underline;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 160px; /* Increased gap between dashboard and image */
            padding: 20px;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: center;
            justify-self: center;
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 20px;
            padding: 20px;
            background-color: #fff;
            height: auto; /* Ensure the height matches the content */
            max-width: 300px; /* Adjust width as needed */
        }

        .dashboard > * {
            margin-bottom: 45px; /* Increased margin between child elements */
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 30px; /* Increased gap between buttons */
        }

        .button-group a {
            text-decoration: none;
            display: block;
        }

        .button-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .button-group button:hover {
            background-color: orangered;
        }

        img {
            border-radius: 20px;
        }

        footer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    row-gap: 30px;
    background: black;
    color: white;
    padding-block: 40px 60px;
}
.top-footer p{
    font-size: 25px;
    font-weight: 600;
}
.middle-footer .footer-menu{
    display: flex;
}

.footer-social-icons{
    display: flex;
   
    gap: 30px;   
}
.bottom-footer{
    font-size: 14px;
    margin-top: 10px;
}

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
@include('layout.navigation')
<br><br><br><br><br><br>
<h1>Dashboard</h1><br><br><br>
<div class="content">
    <div class="dashboard">
        <div class="button-group">
            <a href="{{ route('dashboard_t') }}"><button>Teacher Section</button></a>
            <a href="{{ route('dashboard_s') }}"><button>Student Section</button></a>
            <a href="{{ route('dashboard_a') }}"><button>Admin Section</button></a>
            <a href="{{ route('dashboard_n') }}"><button>Notice Section</button></a>
            <a href="{{ route('dashboard_m') }}"><button>Meeting Section</button></a>
            <a href="{{ route('dashboard_ad') }}"><button>Admission Section</button></a>
            <a href="{{ route('dashboard_me') }}"><button>Message Section</button></a>
        </div>
    </div>

    <img src="{{ asset('image/admin.jpg') }}" alt="Description" style="border-radius: 20px;">
</div>
<br><br><br>
                 <!-- --------------- FOOTER --------------- -->
                 <footer>
          <div class="top-footer">
              <p>Abc School</p>
          </div>
          <div class="middle-footer">
            
          </div>
          <div class="footer-social-icons">
              <div class="icon"><i class="uil uil-facebook"></i></div>
              <div class="icon"><i class="uil uil-github-alt"></i></div>
          </div>
          <div class="bottom-footer">
              <p>A <a href="#home" style="text-decoration: none;"> Minhaz  Mahmud </a> - development.</p>
          </div>
       

      </footer>

</body>
</html>








  <!-- <br><br>
        <a
    href="{{ route('add_meet') }}"
      class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
     >
      Add  a meeting
  </a><br><br><br> -->





  <!-- <a
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
    </div><br><br>


      
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
 -->

        





                                   



        