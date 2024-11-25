// public/js/scripts.js
function scrollToProducts() {
    const productsSection = document.getElementById("products");
    window.scrollTo({
        top: productsSection.offsetTop,
        behavior: 'smooth'
    });
}

// public/js/carousel.js
let currentIndex = 0;

function showSlide(index) {
    const carousel = document.getElementById('carousel');
    const slides = carousel.children;
    const totalSlides = slides.length;

    // Adjust index to stay within bounds
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }

    // Update the carousel's transform property
    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Event listeners for next and previous buttons
document.getElementById('next').addEventListener('click', () => {
    showSlide(currentIndex + 1);
});

document.getElementById('prev').addEventListener('click', () => {
    showSlide(currentIndex - 1);
});
