//cookie lang
$cookie = document.cookie;
//console.log($cookie)
$cookie = $cookie.split(';');
//console.log($cookie)
//search for the cookie "lang"
let lang = "en";
for ($i = 0; $i < $cookie.length; $i++) {
    //console.log($cookie[$i].split('=')[0])
    if ($cookie[$i].split('=')[0] === " lang") {
        lang = $cookie[$i].split('=')[1];
    }
}

//slider
document.querySelector('.escapeGameFGauche').addEventListener('click', slider);

document.querySelector('.escapeGameFDroite').addEventListener('click', slider);

var sliderCurrent = 1;

// document.querySelector('.escapeGSliderIMG>img:nth-child(1)').classList = "escapeGameSCenterSelec";

//fonction permettant de changer d'image dans le slider de vueEscapeGame.php
function slider() {
    let rectSelec = document.querySelector('.escapeGSliderRect>div:nth-child(' + sliderCurrent + ')');
    let imgSelec = document.querySelector('.escapeGSliderIMG>img:nth-child(' + sliderCurrent + ')');
    let sliderLength = 0;

    document.querySelectorAll('.escapeGSliderIMG>img').forEach(e => {
        sliderLength++;
    })

    if (this.id == "next") {
        if (sliderCurrent != sliderLength) {
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            rectSelec.nextElementSibling.classList = "escapeGameRectSelec";
            imgSelec.nextElementSibling.classList = "escapeGameSCenterSelec";

            sliderCurrent++;

        } else if (sliderCurrent == sliderLength) {
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            document.querySelector('.escapeGSliderRect>div:nth-child(1)').classList = 'escapeGameRectSelec';
            document.querySelector('.escapeGSliderIMG>img:nth-child(1)').classList = "escapeGameSCenterSelec";

            sliderCurrent = 1;
        }

    } else if (this.id == "previous") {
        if (sliderCurrent != 1) {
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            rectSelec.previousElementSibling.classList = "escapeGameRectSelec";
            imgSelec.previousElementSibling.classList = "escapeGameSCenterSelec";

            sliderCurrent--;

        } else if (sliderCurrent == 1) {
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            document.querySelector('.escapeGSliderRect>div:nth-child(' + sliderLength + ')').classList = 'escapeGameRectSelec';
            document.querySelector('.escapeGSliderIMG>img:nth-child(' + sliderLength + ')').classList = "escapeGameSCenterSelec";

            sliderCurrent = sliderLength;
        }
    }
}


//map
var p = document.querySelector('.escapeGameMap').dataset;

var mapEscapeGame = L.map('mapEscapeGame').setView([p.x, p.y], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(mapEscapeGame);
var marker = L.marker([p.x, p.y]).addTo(mapEscapeGame);
marker.bindPopup("Event's place").openPopup();

//q&a, pour faire afficher les questions en + au clic sur le boutton "More answers" (même chose pour les reviews).
var answersButton = document.querySelector('.escapeMoreAnswersButton');
var moreAnswers = document.querySelector('.escapeMoreAnswers');

if (moreAnswers != null) {
    answersButton.addEventListener('click', function () {
        moreAnswers.classList.toggle('displayNone');

        if (moreAnswers.classList[1] == "displayNone") {
            //with the cookie "lang" we can change the text of the button
            if (lang === "fr") {
                answersButton.innerText = 'Plus de réponses';
            } else {
                answersButton.innerText = 'More answers';
            }
        } else {
            if (lang === "fr") {
                answersButton.innerText = 'Masquer les réponses';
            } else {
                answersButton.innerText = 'Mask answers';
            }
        }
    })
}

var reviewsButton = document.querySelector('.escapeMoreReviewsButton');
var moreReviews = document.querySelector('.escapeMoreReviews');

if (reviewsButton != null) {
    reviewsButton.addEventListener('click', function () {
        moreReviews.classList.toggle('displayNone');

        if (moreReviews.classList[1] == "displayNone") {
            if (lang === "fr") {
                reviewsButton.innerText = 'Plus de commentaires';
            } else {
                reviewsButton.innerText = 'More reviews';
            }
        } else {
            if (lang === "fr") {
                reviewsButton.innerText = 'Masquer les commentaires';
            } else {
                reviewsButton.innerText = 'Mask reviews';
            }
        }
    })
}

//buy


document.querySelector('.escapeSearchButton').addEventListener('click', function () {
    if ((document.querySelector('#buyPerson').value != "") && (document.querySelector('#buyDate').value != "")) {

        var buyPersons = document.querySelector('#buyPerson').value;
        var buyDate = document.querySelector('#buyDate').value;

        var day = buyDate.split('-')[2];
        var month = getMonthName(buyDate.split('-')[1], 'en-US');
        var mois = getMonthName(buyDate.split('-')[1], 'fr-FR');
        var year = buyDate.split('-')[0];

        document.querySelector('.possibleSchedules').classList.remove('displayNone');
        document.querySelector('.inserDate').innerText = day + " " + month + " " + year;
    }

})

function getMonthName(monthNumber, lang) {
    const date = new Date();
    date.setMonth(monthNumber - 1);

    return date.toLocaleString(lang, {
        month: 'long',
    });
}