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

document.querySelector(".searchUser").addEventListener("input", liveSearch);

function liveSearch() {
    // Locate the card elements
    let cards = document.querySelectorAll('.searchContent')
    // Locate the search input
    let search_query = document.querySelector(".searchUser").value;
    // Loop through the cards
    for (var i = 0; i < cards.length; i++) {
        // If the text is within the card...
        if (cards[i].innerText.toLowerCase()
            // ...and the text matches the search query...
            .includes(search_query.toLowerCase())) {
            // ...remove the `.is-hidden` class.
            cards[i].classList.remove("is-hidden");
        } else {
            // Otherwise, add the class.
            cards[i].classList.add("is-hidden");
        }
    }
}