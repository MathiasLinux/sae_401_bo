document.querySelectorAll(".messageOpenButton").forEach(function (button) {
    button.addEventListener("click", function () {
        let messageClass = button.className.match(/message\d+/)[0];
        let message = document.querySelector("#" + messageClass);
        message.classList.toggle("messageOpenDisplay");
    });
});

document.querySelectorAll(".yellowButtonAdminContact").forEach(function (e) {
    e.addEventListener("click", function () {
        console.log("click");
        document.querySelectorAll(".messageOpen").forEach(function (f) {
            f.classList.remove("messageOpenDisplay");
        });
    });
});

document.querySelectorAll(".warningDelForm").forEach(function (element) {
    element.addEventListener("click", warningDeleteForm);
});

function warningDeleteForm() {
    //select the validationDeleteUser div near the .deleteUser button that was clicked
    let validationDeleteForm = this.nextElementSibling;
    validationDeleteForm.style.display = "block";
}

document.querySelectorAll(".noDeleteUser").forEach(function (element) {
    element.addEventListener("click", noDeleteForm);
});

function noDeleteForm() {
    document.querySelectorAll(".validationDeleteUser").forEach(function (element) {
        element.style.display = "none";
    });
}