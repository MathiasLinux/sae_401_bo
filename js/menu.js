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

// if (action == "admin") {
//     document.querySelector(".mobileMenuAdmin").classList.add("show");
// } else {
//     document.querySelector(".PCMenuDiv").classList.add("none");}

document.querySelector(".PCMenuDiv").addEventListener("click", function () {
    if (action == "admin") {
        document.querySelector(".mobileMenuAdmin").classList.add("show");
    } else {
        document.querySelector(".PCMenuDiv").classList.add("none");
    }
});

if (action !== "admin") {
    document.querySelector(".PCMenuDiv").classList.add("none");
}

document.querySelector(".closeMenu").addEventListener("click", function () {
    document.querySelector(".mobileMenu").classList.remove("show");
});
document.querySelector(".closeMenuAdmin").addEventListener("click", function () {
    document.querySelector(".mobileMenuAdmin").classList.remove("show");
});


document.querySelector(".linksPC>.endLinksPC>.loginLinksPC").addEventListener("click", open);

function open(){
    document.querySelector(".hoverLoginPC").classList.toggle("open");
}

document.querySelector(".hoverLoginPC").addEventListener("click", open);
