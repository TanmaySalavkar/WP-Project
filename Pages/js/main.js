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
  
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    slides[i].style.transition = "transform 0.5s ease"; // Add transition property
    slides[i].style.transform = "translateX(100%)"; // Start off-screen to the right
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  slides[slideIndex - 1].style.display = "block";

 
  setTimeout(function() {
    slides[slideIndex - 1].style.transform = "translateX(0)"; 
    dots[slideIndex - 1].classList.add("active");
  }, 10); 
  setTimeout(function() {
    plusSlides(1); 
  }, 2000);
}
