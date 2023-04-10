//console.log("adminReservation.js loaded");
document.querySelectorAll(".deleteUser").forEach(function (element) {
    element.addEventListener("click", warningDeleteUser);
});

function warningDeleteUser() {
    //select the validationDeleteUser div near the .deleteUser button that was clicked
    let validationDeleteUser = this.nextElementSibling;
    validationDeleteUser.style.display = "block";
}

document.querySelectorAll(".noDeleteUser").forEach(function (element) {
    element.addEventListener("click", noDeleteUser);
});

function noDeleteUser() {
    document.querySelectorAll(".validationDeleteUser").forEach(function (element) {
        element.style.display = "none";
    });
}