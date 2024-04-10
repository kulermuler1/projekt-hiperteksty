var slideIndex = 1;

        function showSlide(n) {
            var slides = document.getElementsByClassName("slide");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }

        function nextSlide() {
            showSlide(slideIndex += 1);
        }

        function prevSlide() {
            showSlide(slideIndex -= 1);
        }

        showSlide(slideIndex);