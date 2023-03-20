//slider
document.querySelector('.escapeGameFGauche').addEventListener('click', slider);

document.querySelector('.escapeGameFDroite').addEventListener('click', slider);

var sliderCurrent = 1;

//fonction permettant de changer d'image dans le slider de vueEscapeGame.php
function slider(){
    let rectSelec = document.querySelector('.escapeGSliderRect>div:nth-child(' + sliderCurrent + ')');
    let imgSelec = document.querySelector('.escapeGSliderIMG>img:nth-child(' + sliderCurrent + ')');
    
    if(this.id=="next"){
        if(sliderCurrent!=4){
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            rectSelec.nextElementSibling.classList = "escapeGameRectSelec";
            imgSelec.nextElementSibling.classList =     "escapeGameSCenterSelec";
        
            sliderCurrent++;

        } else if(sliderCurrent==4){
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            document.querySelector('.escapeGSliderRect>div:nth-child(1)').classList = 'escapeGameRectSelec';
            document.querySelector('.escapeGSliderIMG>img:nth-child(1)').classList = "escapeGameSCenterSelec";

            sliderCurrent = 1;
        }

    } else if(this.id=="previous"){
        if(sliderCurrent!=1){
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            rectSelec.previousElementSibling.classList = "escapeGameRectSelec";
            imgSelec.previousElementSibling.classList =     "escapeGameSCenterSelec";

            sliderCurrent--;

        } else if(sliderCurrent==1){
            rectSelec.classList = "escapeGameRect";
            imgSelec.classList = "escapeGameSCenter";

            document.querySelector('.escapeGSliderRect>div:nth-child(4)').classList = 'escapeGameRectSelec';
            document.querySelector('.escapeGSliderIMG>img:nth-child(4)').classList = "escapeGameSCenterSelec";

            sliderCurrent = 4;
        }   
    }
}



//map
var mapEscapeGame = L.map('mapEscapeGame').setView([48.04297152074871, 7.648250017883536], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(mapEscapeGame);
var marker = L.marker([48.0429728656882, 7.648250017883536]).addTo(mapEscapeGame);
marker.bindPopup("Event's place").openPopup();

//q&a, pour faire afficher les questions en + au clic sur le boutton "More answers" (même chose pour les reviews).
var answersButton = document.querySelector('.escapeMoreAnswersButton');
var moreAnswers = document.querySelector('.escapeMoreAnswers');

answersButton.addEventListener('click', function(){
    moreAnswers.classList.toggle('displayNone');

    if(moreAnswers.classList[1] == "displayNone"){
        answersButton.innerText = 'More answers';
    } else {
        answersButton.innerText = 'Mask answers';
    }
})

var reviewsButton = document.querySelector('.escapeMoreReviewsButton');
var moreReviews = document.querySelector('.escapeMoreReviews');

reviewsButton.addEventListener('click', function(){
    moreReviews.classList.toggle('displayNone');

    if(moreReviews.classList[1] == "displayNone"){
        reviewsButton.innerText = 'More reviews';
    } else {
        reviewsButton.innerText = 'Mask reviews';
    }
})