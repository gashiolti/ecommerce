var slideIndex = 1;
var timer = null;
showSlides(slideIndex);

        function plusSlides(n) {
        clearTimeout(timer);
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        clearTimeout(timer);
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i; //iteracioni
        var slides = document.getElementsByClassName("mySlides"); //get div's className
        if (n==undefined){n = ++slideIndex}
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
        timer = setTimeout(showSlides, 5000);
        } 