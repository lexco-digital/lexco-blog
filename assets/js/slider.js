var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
var currentSlide = 1;
var currentDot = 0;
var slideInterval = setInterval(nextSlides, 5000);
var playing = true;

// Start by showing the current slide (currentSlide)
slides[currentSlide].className = "mySlides show";
// Add class active to current dot
dots[currentDot].className = "dot active";

function nextSlides() {
    goToSlide(currentSlide + 1);
    changeDots(currentDot + 1);
}

function previousSlide() {
    goToSlideReverse(currentSlide + 1);
    changeDots(currentDot - 1);
}

function goToSlide(n) {
    //Add '.after' class to current slide and slide it right
    slides[currentSlide].className = "mySlides after";
    
    //Make the previous slide current, by changing the index number of the current class
    currentSlide = (n + slides.length) % slides.length;
    nextSlide = (n + slides.length + 1) % slides.length;
	
    //Add '.show' class to previous slide to make it appear
    slides[currentSlide].className = "mySlides show";
    //Remove '.after' class to next slide, to placen it at the beginning of the slider
    slides[nextSlide].className = "mySlides";
}

function goToSlideReverse(n) {
    //Add '.after' class to current slide and slide it right
    slides[currentSlide].className = "mySlides";
	
    //Make the previous slide current, by changing the index number of the current class
    currentSlide = (n + slides.length) % slides.length;
    nextSlide = (n + slides.length + 1) % slides.length;
    
    //Add '.show' class to previous slide to make it appear
    slides[currentSlide].className = "mySlides show";
    
    //Remove '.after' class to next slide, to make it place at the beginning of the slider
    slides[nextSlide].className = "mySlides after";
}

function changeDots(n) {
    dots[currentDot].className = "dot";
    currentDot = (n + dots.length) % dots.length;
    dots[currentDot].className = "dot active";
}

var pauseButton = document.getElementById('pause');

function pauseSlideshow() {
    playing = false;
    
}

function playSlideshow() {
    playing = true;
    slideInterval = setInterval(nextSlides, 3000);
}

var next = document.getElementById('next');
var previous = document.getElementById('previous');

next.onclick = function() {
    clearInterval(slideInterval);
    nextSlides();
};
          
previous.onclick = function() {
    clearInterval(slideInterval);
    previousSlide();
};