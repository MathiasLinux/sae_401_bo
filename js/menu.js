//get the value of the action in the url
let url = new URL(window.location.href);
let action = url.searchParams.get("action");
document.querySelector(".mobileMenuDiv").addEventListener("click", function () {
    if (action == "admin") {
        document.querySelector(".mobileMenuAdmin").classList.add("show");
    } else {
        document.querySelector(".mobileMenu").classList.add("show");
    }
});

document.querySelector(".closeMenu").addEventListener("click", function () {
    document.querySelector(".mobileMenu").classList.remove("show");
});
document.querySelector(".closeMenuAdmin").addEventListener("click", function () {
    document.querySelector(".mobileMenuAdmin").classList.remove("show");
});

console.log(window.location.href);
console.log(typeof action);