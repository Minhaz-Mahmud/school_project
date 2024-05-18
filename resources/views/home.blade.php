@if(session('success'))
    <script type="text/javascript">
        window.onload = function () { alert("{{ session('success') }}"); }
    </script>
@endif


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
        <p class="nav-name">ABC SCHOOL</p>
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




 <div class="sllideshow-container">

 <h1 class="gallery-title">Gallery</h1>
 

    <div class="mySlides fade">
        <div class="numbertext">1 / 4</div>
        <img src="{{ asset('image/image1.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Campus</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 4</div>
        <img src="{{ asset('image/image2.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Class</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 4</div>
        <img src="{{ asset('image/image3.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Clasroom</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">4 / 4</div>
        <img src="{{ asset('image/image4.jpg') }}" style="width: 100%" alt="Description">
        <div class="text">Playground</div>
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
 <br><br>
 <section class="section" id="about">
          <div class="top-header">
            <!-- <h1>About Me</h1> -->
          </div>
                <div class="about-info">
                    <h3>OUR HISTORY</h3>
                    <div class="school-history">
    <p>ABC School: Nurturing Minds, Building Futures in Khulna, Bangladesh</p>
    <p>Established in 1935 by the visionary educator Professor Abdullah Rahman, ABC School has been a cornerstone of educational excellence in Khulna, Bangladesh, for nearly nine decades.</p>

    <p>Professor Rahman founded ABC School with a mission to revolutionize education by providing students with more than just academic knowledge. He envisioned a school that would foster creativity, critical thinking, and compassion among its students, preparing them to navigate the complexities of the world with confidence and integrity.</p>

    <p>From its humble beginnings in a small building in the heart of Khulna, ABC School has grown into a sprawling institution renowned for its progressive teaching methodologies and unwavering commitment to holistic development. Over the years, the school has expanded its facilities and curriculum offerings, integrating modern technology and innovative pedagogy to provide students with a comprehensive learning experience.</p>

    <p>Despite its growth and evolution, ABC School has remained true to its founding principles, prioritizing individualized attention, experiential learning, and community engagement. Students at ABC School are not just learners; they are active participants in their own education, encouraged to explore their interests, pursue their passions, and make a positive impact on the world around them.</p>

    <p>Today, ABC School stands as a testament to Professor Rahman's vision, empowering generations of students to excel academically, thrive personally, and contribute meaningfully to Bangladeshi society. As it continues to adapt to the changing needs of the 21st century, ABC School remains committed to providing a transformative educational experience that prepares students for success in an increasingly interconnected and dynamic world.</p>
</div>

            
       </section>
       <br><br>
       <!--     ====================Why to choose  Us================================================================= -->
       <section class="abc">
       
        <div class="text_new">
            <h1 class="n_txt">Why to chose us!</h1>
            <div class="school-features">
    <h4>Academic Excellence</h4>
    <p>Our rigorous curriculum and dedicated faculty ensure students excel academically, developing critical thinking and a deep understanding of subjects.</p>

    <h4>Holistic Development</h4>
    <p>We offer a range of extracurricular activities, including sports, arts, and music, fostering well-rounded individuals.</p>

    <h4>Modern Facilities</h4>
    <p>Our facilities include modern classrooms, well-stocked libraries, advanced labs, and extensive sports facilities, providing a conducive learning environment.</p>

    <h4>Caring and Qualified Faculty</h4>
    <p>Our passionate teachers provide personalized attention and use innovative methods to engage students and foster a love for learning.</p>

    <h4>Safe and Inclusive Environment</h4>
    <p>We maintain a safe and inclusive environment where every student feels valued, promoting diversity and ensuring equal opportunities for success.</p>
</div>

        </div>
        <div class="new_image">
        <img src="{{ asset('image/choose.png') }}">
        </div>

    </section>


<br><br><br>


        <!-- -------------- PROJECT BOX ---------------- -->

        <section class="section" id="projects">
            <div class="top-header">
                <h1>Services</h1>
            </div>
            <div class="project-container">
              <div class="project-box">
              <i class="uil uil-bus-school"></i>
                  <h3>Bus Service</h3>
                  <label>10+ Buses</label>
                  
              </div>
              <div class="project-box">
              <i class="uil uil-utensils"></i>
                  <h3>Lunch Service</h3>
                  <label>Meal For Students</label>
              </div>
              <div class="project-box">
              <i class="uil uil-graduation-cap"></i>
                  <h3>Scholarship</h3>
                  <label>Scholarship For Students</label>
              </div>
            </div>
         </section>

         <br><br>



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
  





       
      <!-- ----- TYPING JS Link ----- -->
      <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    
    <!-- ----- MAIN JS ----- -->
    <!-- <script src="main.js"></script> -->
    <!-- <script src="{{ asset('js/main.js') }}"></script> -->

  
  </body>
  </html>



 
    