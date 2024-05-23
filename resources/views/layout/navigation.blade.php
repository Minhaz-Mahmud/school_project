<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
     <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    
      <style>
      .nav-link.underline {
    text-decoration: underline;
    text-decoration-color:  rgb(195, 60, 11);
}

      </style>

    
</head>
<body>
   <div class="container">
   

<nav id="header">
    <div class="nav-logo">
        <p class="nav-name">ABC SCHOOL</p>
        <span>_</span>
    </div>
    <div class="nav-menu" id="myNavMenu">
        <ul class="nav_menu_list">
        <li class="nav_list">
        <a href="{{ route('home') }}" class="nav-link  active-link">Home</a>
          <div class="circle"></div>
       </li>
            <li class="nav_list">
                <a href="{{ route('admission_f') }}" class="nav-link   active-link">Admission</a>
                <div class="circle"></div>
            </li>
            <li class="nav_list">
                <a href="{{ route('teacher') }}" class="nav-link   active-link">Teachers</a>
                <div class="circle"></div>
            </li>

            <li class="nav_list">
                <a href="{{ route('dashboard') }}" class="nav-link   active-link">Dashboard</a>
                <div class="circle"></div>
            </li>


<!-- Rest of your navigation items -->            
              
                

<li class="nav_list">
                    <!-- <a href="{{ route('admin_login') }}" class="nav-link  active-link">Login</a> -->
               


                    @php
   $loggedIn = session()->has('user_id');

    $loggedIn2 = Auth::guard('admin')->check();
    $loggedIn3 = Auth::guard('teacher_guard')->check();

    $loggedIn4 = session()->has('u_user');


@endphp


@if ($loggedIn)
    <li class="nav_list">
                    < <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>

@elseif ($loggedIn2)
<li class="nav_list">
                    < <a href="{{ route('a_logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>
@elseif ($loggedIn3)
<li class="nav_list">
                    < <a href="{{ route('t_logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>
                @elseif ($loggedIn4)
<li class="nav_list">
                    < <a href="{{ route('u_logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>

                
@else
    <select id="dropdown">
        <option value="">Login as</option>
        <option value="{{ route('login') }}">Student</option>
        <option value="{{ route('a_login') }}">Admin</option>
        <option value="{{ route('t_login') }}">Teacher</option>
        <option value="{{ route('u_login') }}">User</option>
    </select>
    <button id="goButton" onclick="redirectToSelectedOption()">Login</button>

    <script>
        function redirectToSelectedOption() {
            var dropdown = document.getElementById("dropdown");
            var selectedOption = dropdown.options[dropdown.selectedIndex].value;
            if (selectedOption) {
                window.location.href = selectedOption;
            }
        }
    </script>
@endif




                    <div class="circle"></div>
                </li>
        </ul>
    </div>
    <div class="nav-menu-btn">
        <i class="uil uil-bars" onclick="myMenuFunction()"></i>
    </div>
</nav>


<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>
    function myMenuFunction() {
        var menuBtn = document.getElementById("myNavMenu");

        if (menuBtn.className === "nav-menu") {
            menuBtn.className += " responsive";
        } else {
            menuBtn.className = "nav-menu";
        }
    }

    


    document.addEventListener("DOMContentLoaded", function () {
        var links = document.querySelectorAll(".nav-link");
        var currentUrl = window.location.href;

        links.forEach(function (link) {
            // Check if the link's href matches the current URL
            if (link.href === currentUrl) {
                link.classList.add("underline");
            }

            link.addEventListener("click", function (event) {
                // Remove underline from all links
                links.forEach(function (l) {
                    l.classList.remove("underline");
                });
                // Add underline to the clicked link
                event.target.classList.add("underline");
            });
        });
    });
</script>

</script>


</body>
</html>