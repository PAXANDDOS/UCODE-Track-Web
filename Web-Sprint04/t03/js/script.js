let slideIndex = 1;
let slides = document.getElementsByClassName("slide");
let timeId = 0;

showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;

    if (n > slides.length)
        slideIndex = 1;
    if (n < 1)
        slideIndex = slides.length;
    for (i = 0; i < slides.length; i++)
        slides[i].style.display = "none";
    slides[slideIndex - 1].style.display = "block";

    clearInterval(timeId);
    timeId = setInterval(showSlides, 3000, slideIndex += 1);
}
