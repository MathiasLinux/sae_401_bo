<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""/>

<h2 class="titreUnderline">Titre Escape Game</h2>

<!-- Infos escape game -->
<div class="escapeGameGrid">
    <div>
        <img src="../img/puzzle.png" alt="Puzzle">
        <p>30+ puzzles</p>
    </div>
    <div>
        <img src="../img/aventureuxLeMec.png" alt="Aventurier">
        <p>3 adventures</p>
    </div>
    <div>
        <img src="../img/placeholder.png" alt="Position">
        <p>4 spots in the Kaiserstuhl</p>
    </div>
    <div>
        <img src="../img/book.png" alt="Livre">
        <p>1 story</p>
    </div>
</div>

<!-- Partie présentation de l'escape game  -->
<h2 class="titreUnderline">Presentation</h2>
<p class="alinea">Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh. Mauris sit amet magna non ligula vestibulum eleifend. Nulla varius volutpat turpis sed lacinia. Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis nisi. Proin vitae facilisis nisi, ac posuere leo.</p>
<p class="alinea">Curabitur tempor quis eros tempus lacinia. Nam bibendum pellentesque quam a convallis. Sed ut vulputate nisi. Integer in felis sed leo vestibulum venenatis. Suspendisse quis arcu sem. Aenean feugiat ex eu vestibulum vestibulum. Morbi a eleifend magna. Nam metus lacus, porttitor eu mauris a, blandit ultrices nibh. Mauris sit amet magna non ligula vestibulum eleifend. Nulla varius volutpat turpis sed lacinia. Nam eget mi in purus lobortis eleifend. Sed nec ante dictum sem condimentum ullamcorper quis venenatis nisi. Proin vitae facilisis nisi, ac posuere leo.</p>

<!-- Slider d'images représentatives de l'escape game -->
<h2 class="titreUnderline">Gallery</h2>
<div class="escapeGameSlider">

    <div class="escapeGameF">
        <img class="escapeGameFGauche" src="../img/flecheGauche.png" alt="Left arrow" id='previous'>
        <img class="escapeGameFDroite" src="../img/flecheDroite.png" alt="Right arrow" id='next'>
    </div>

    <div class="escapeGSliderRect">
        <div class='escapeGameRectSelec' id='1'></div>
        <div class='escapeGameRect' id='2'></div>
        <div class='escapeGameRect' id='3'></div>
        <div class='escapeGameRect' id='4'></div>
    </div>

    <div class="escapeGSliderIMG">
        <img class="escapeGameSCenterSelec" src="../img/codexMinia.png">
        <img class="escapeGameSCenter" src="../img/codexMinia.png">
        <img class="escapeGameSCenter" src="../img/codexMinia.png">
        <img class="escapeGameSCenter" src="../img/codexMinia.png">
    </div>
</div>

<!-- Map -->
<h2 class="titreUnderline">Map</h2>

<p>Wasenweilerstraße 8, 79241 Ihringen, Germany</p>
<div id='mapEscapeGame'></div>

<!-- Q&A -->
<h2 class="titreUnderline">Q&A</h2>

<div class="aQuestion">
    <div class="titleQuestion">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ?</p>
        <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414" viewBox="0 0 14.828 8.414">
            <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
    </div>
    <div class="descQuestion displayQuestion">
        <p>eh connais-tu les deux frères ? Les deux frères plombiers ! Héros pas zéros dans les jeux vidéos</p>
    </div>
</div>

<div class="escapeMoreAnswers displayNone">
<div class="aQuestion">
    <div class="titleQuestion">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ?</p>
        <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414" viewBox="0 0 14.828 8.414">
            <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
    </div>
    <div class="descQuestion displayQuestion">
        <p>euh ouais je</p>
    </div>
</div>

<div class="aQuestion">
    <div class="titleQuestion">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ?</p>
        <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414" viewBox="0 0 14.828 8.414">
            <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
    </div>
    <div class="descQuestion displayQuestion">
        <p>mmmm spaghettis</p>
    </div>
</div>

<div class="aQuestion">
    <div class="titleQuestion">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ?</p>
        <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414" viewBox="0 0 14.828 8.414">
            <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
        </svg>
    </div>
    <div class="descQuestion displayQuestion">
        <p>n'hésitez pas à jouer a celeste c'est un bon jeu</p>
    </div>
</div>
</div>

<div class="escapeMoreAnswersButton greenButton">
    More answers
</div>

<!-- reviews -->
<h2 class="titreUnderline">Reviews</h2>

<div class="escapeGameReview">
    <div class="reviewNom">John Smith</div>
    <div class="reviewDesc">Yorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
    <div class="reviewNote">
        <svg height="20" width="20">
            <circle cx="10" cy="10" r="10" fill="white"/>
        </svg>
        <svg height="20" width="20">
            <circle cx="10" cy="10" r="10" fill="white"/>
        </svg>
        <svg height="20" width="20">
            <circle cx="10" cy="10" r="10" fill="white"/>
        </svg>
        <svg height="20" width="20">
            <circle cx="10" cy="10" r="10" fill="white"/>
        </svg>
        <svg height="20" width="10"> <!-- On réduit le width pour que le cercle soit coupé en deux -->
            <circle cx="10" cy="10" r="10" fill="white"/>
        </svg>
    </div> 
</div>

<div class="escapeMoreReviews displayNone">

    <div class="escapeGameReview">
        <div class="reviewNom">John Smith</div>
        <div class="reviewDesc">Yorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
        <div class="reviewNote">
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="10"> <!-- On réduit le width pour que le cercle soit coupé en deux -->
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
        </div> 
    </div>

    <div class="escapeGameReview">
        <div class="reviewNom">John Smith</div>
        <div class="reviewDesc">Yorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
        <div class="reviewNote">
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="20">
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
            <svg height="20" width="10"> <!-- On réduit le width pour que le cercle soit coupé en deux -->
                <circle cx="10" cy="10" r="10" fill="white"/>
            </svg>
        </div> 
    </div>
</div>

<div class="escapeMoreReviewsButton escapeYellowButton">
    More Reviews
</div>

<!-- Buy -->
<h2 class="titreUnderline">Buy</h2>

<p>Number of person</p>
<input class="inputBuy" type="number" id="buyPerson">

<p>Date</p>
<input class="inputBuy" type="date" id="buyDate">

<div class="escapeSearchButton">Search</div>


<!-- La partie possibleSchedules apparaitra seulement au clic sur .escapeSearchButton au dessus -->
<div class="possibleSchedules">
    <h3>Possible schedules</h3> 
    <div class="hoursSchedules">
        <div class="greenButton">10h</div>
        <div class="greenButton occupied">14h</div>
        <div class="greenButton">18h</div>
        <div class="greenButton">20h</div>
    </div>
    <div class="escapeYellowButton">Order now</div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>

<script src="js/qAndA.js"></script>
<script src="js/escapeGame.js"></script>