/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  
} 
        
function fullScreen(){
    var overlay = document.getElementById("overlay");
    overlay.style.display = "block";
    var overlayContent =document.getElementById("overlayContent");
    overlayContent.style.display = "block";
    
    var image = document.getElementsByClassName("myImages");
    var imgBig = document.getElementById("imgBig");
    imgBig.src = image[slideIndex-1].src;
    
}

function exitFullScreen(){
    var overlay = document.getElementById("overlay");
    overlay.style.display = "none";
    var overlayContent =document.getElementById("overlayContent");
    overlayContent.style.display = "none";
}

        