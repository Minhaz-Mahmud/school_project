

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
      <style>
      .nav-link.underline {
    text-decoration: underline;
    text-decoration-color:  rgb(195, 60, 11);}
    </style>

    
</head>
<body>
   <div class="container">
   

<nav id="header">
    <div class="nav-logo">
        <p class="nav-name">X SCHOOL</p>
        <span>_</span>
    </div>
    <div class="nav-menu" id="myNavMenu">
        <ul class="nav_menu_list">
        <li class="nav_list">
        <a href="{{ route('home') }}" class="nav-link  active-link ">Home</a>
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
           
              
                

<li class="nav_list">
                 
               


 @php
    $loggedIn = Auth::guard('students')->check();
    $loggedIn2 = Auth::guard('admin')->check();
    $loggedIn3 = Auth::guard('teacher_guard')->check();

@endphp

@if ($loggedIn)
    <li class="nav_list">
                    < <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>

@elseif ($loggedIn2)
<li class="nav_list">
                    < <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>
@elseif ($loggedIn3)
<li class="nav_list">
                    < <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    <div class="circle"></div>
                </li>

@else
    <select id="dropdown">
        <option value="">Login as</option>
        <option value="{{ route('login') }}">Student</option>
        <option value="{{ route('a_login') }}">Admin</option>
        <option value="{{ route('t_login') }}">Teacher</option>
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


 <!--============================================= image slider==================================================================== --> 




 <div class="slideshow-container">

 <h1 class="gallery-title">Gallery</h1>
 

    <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        <img src="{{ asset('image/image1.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="{{ asset('image/image2.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
        <img src="{{ asset('image/image3.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Caption Three</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="{{ asset('image/image4.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Caption Four</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
</div>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1; }
        if (n < 1) { slideIndex = slides.length; }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    // Automatically show the first slide when the page loads
    window.onload = function () {
        showSlides(slideIndex);
    };
</script>




 <!-- -------------- ABOUT BOX ---------------- -->
 <section class="section" id="about">
          <div class="top-header">
            <h1>About Me</h1>
          </div>
                <div class="about-info">
                    <h3>My introduction</h3>
                    <p>
                        Hi, I'm Minhaz Mahmud, a Computer Science and Engineering student at 
                        Khulna University of Engineering and Technology.
                         I'm passionate about programming and always eager to learn new things.
                          As a developer in the making,
                          I explore various aspects of software development,
                           with a particular interest in mobile app development.
                         I enjoy tackling challenges and constantly improving my skills.
                          Let's connect and share our programming journey!
                    </p>
                    <div class="about-btn">
                </div>
            
       </section>
       <br><br><br>
       





<!-- ----------------------------------NoticeBoard==================================================== -->
     
    <div class="noticeboard">
        <h1>Noticeboard</h1>
        @foreach($notice->reverse() as $notice)
        <div class="notice">
            <div class="noticeHeader" onclick="toggleDescription(this)">
                {{$notice->head}}___________{{$notice->created_at}}
            </div>
            <div class="noticeDescription">
                {{$notice->des}}
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function toggleDescription(header) {
            const allDescriptions = document.querySelectorAll('.noticeDescription');
            const clickedDescription = header.nextElementSibling;

            allDescriptions.forEach(description => {
                if (description !== clickedDescription) {
                    description.style.display = 'none';
                }
            });

            clickedDescription.style.display = clickedDescription.style.display === 'none' || clickedDescription.style.display === '' ? 'block' : 'none';
        }
    </script>




<section class="section" id="contact">
            <div class="top-header">
              <h1>Get in touch</h1>
              <span>Do you have a project in your mind, contact me here</span>
            </div>
            <div class="row">
               <div class="col">
                  <div class="contact-info">
                      <h2>Contact Us <i class="uil uil-corner-right-down"></i></h2>
                      <p><i class="uil uil-envelope"></i> Email: mmahmud25dec@gmail.com</p>
                      <p><i class="uil uil-phone"></i> Tel: +8801771-057177</p>
                  </div>
               </div>

            <form action="{{ route('message') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
               <div class="col">
                  <div class="form-control">
                      <div class="form-inputs">

                     
                          <input type="text" name="name" class="input-field" placeholder="Name">
                          <input type="text" name="email" class="input-field" placeholder="Email">
                      </div>
                      <div class="text-area">
                          <textarea name="message" placeholder="Message"></textarea>
                      </div>
                      <div class="form-button">
                          <!-- <input type="submit"  class="btn">Send <i class="uil uil-message"></i></input> -->
                          <input type="submit" class="btn" name="send" value="Send">
                      </div>
                
                  </div>
               </div>
            </div>
            </form>
         </section>








       
      <!-- ----- TYPING JS Link ----- -->
      <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    
    <!-- ----- MAIN JS ----- -->
    <!-- <script src="main.js"></script> -->
    <!-- <script src="{{ asset('js/main.js') }}"></script> -->

  
  </body>
  </html>



 
    