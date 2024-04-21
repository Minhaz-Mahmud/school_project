function myMenuFunction(){
  var menuBtn = document.getElementById("myNavMenu");

  if(menuBtn.className === "nav-menu"){
    menuBtn.className += " responsive";
  } else {
    menuBtn.className = "nav-menu";
  }
}


// // JavaScript to handle the download CV button click
// document.getElementById("dwbtn").addEventListener("click", function () {
//   // Specify the URL of your CV file here
//   var cvUrl = 'docs/cv.pdf';

//   // Create an anchor element
//   var link = document.createElement("a");
//   link.href = cvUrl;
//   link.download = "Ahmed_CV.pdf"; // Specify the filename for the downloaded file
//   document.body.appendChild(link);
//   link.click();
//   document.body.removeChild(link);
// });

/* ----- ADD SHADOW ON NAVIGATION BAR WHILE SCROLLING ----- */
window.onscroll = function() {headerShadow()};

function headerShadow() {
  const navHeader =document.getElementById("header");

  if (document.body.scrollTop > 50 || document.documentElement.scrollTop >  50) {

    navHeader.style.boxShadow = "0 1px 6px rgba(0, 0, 0, 0.1)";
    navHeader.style.height = "70px";
    navHeader.style.lineHeight = "70px";

  } else {

    navHeader.style.boxShadow = "none";
    navHeader.style.height = "90px";
    navHeader.style.lineHeight = "90px";

  }
}




/* ----- TYPING EFFECT ----- */
var typingEffect = new Typed(".typedText",{
  strings : ["Student","Learner","Developer"],
  loop : true,
  typeSpeed : 100, 
  backSpeed : 80,
  backDelay : 2000
})

/* ----- CHANGE ACTIVE LINK ----- */

const sections = document.querySelectorAll('section[id]')

function scrollActive() {
const scrollY = window.scrollY;

sections.forEach(current =>{
  const sectionHeight = current.offsetHeight,
    sectionTop = current.offsetTop - 50,
    sectionId = current.getAttribute('id')

  if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) { 

      document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.add('active-link')

  }  else {

    document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.remove('active-link')

  }
})
}

window.addEventListener('scroll', scrollActive)




// notice
document.addEventListener("DOMContentLoaded", function() {
  const noticeHeaders = document.querySelectorAll(".noticeHeader");

  noticeHeaders.forEach(header => {
      header.addEventListener("click", function() {
          const description = this.nextElementSibling;
          description.style.display = description.style.display === "none" || description.style.display === "" ? "block" : "none";
      });
  });
});

