// public/js/scripts.js
function scrollToProducts() {
    const productsSection = document.getElementById("products");
    window.scrollTo({
        top: productsSection.offsetTop,
        behavior: 'smooth'
    });
}
