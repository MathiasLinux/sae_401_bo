console.log('menu.js loaded');

document.querySelector(".mobileMenuDiv").addEventListener("click", function () {
    document.querySelector(".mobileMenu").classList.add("show");
});

document.querySelector(".closeMenu").addEventListener("click", function () {
    document.querySelector(".mobileMenu").classList.remove("show");
});