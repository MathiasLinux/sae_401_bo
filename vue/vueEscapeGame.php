<?php
// require_once "modele/escapeGame.class.php";
//create a cookie to store the lang of the user with the session lang
if (isset($_SESSION["lang"])) {
    if (!isset($_COOKIE["lang"])) {
        setcookie("lang", $_SESSION["lang"], time() + 3600 * 24 * 30, "/");
    }
}
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""/>


<h2 class="titreUnderline"><?php
    echo $_SESSION['lang'] ? $escapeGame['nameFR'] : $escapeGame['name'];
    ?></h2>

<!-- Infos escape game -->
<div class="escapeGameGrid">
    <div>
        <img src="img/puzzle.png" alt="Puzzle">
        <p><?php echo $escapeGame['duration']; ?>h</p>
    </div>
    <div>
        <img src="img/aventureuxLeMec.png" alt="Aventurier">
        <p><?php
            echo $_SESSION['lang'] == 'fr' ? $escapeGame['difficultyFR'] : $escapeGame['difficulty'];
            ?></p>
    </div>
</div>

<!-- Partie présentation de l'escape game  -->
<h2 class="titreUnderline"><?= ESCAPEGAME_H2_PRESENTATION ?></h2>
<p class="alinea">
    <?php echo $_SESSION['lang'] == 'fr' ? $escapeGame['descriptionFR'] : $escapeGame['description'];
    ?>
</p>

<!-- Slider d'images représentatives de l'escape game -->
<h2 class="titreUnderline"><?= ESCAPEGAME_H2_GALLERY ?></h2>
<div class="escapeGameSlider">

    <div class="escapeGameF">
        <img class="escapeGameFGauche" src="../img/flecheGauche.png" alt="Left arrow" id='previous'>
        <img class="escapeGameFDroite" src="../img/flecheDroite.png" alt="Right arrow" id='next'>
    </div>

    <div class="escapeGSliderRect">
        <?php
        // $dir = "img/escapeGame/" . $escapeGame["id_escapeGame"];
        // $a = scandir($dir);
        // print_r($a);

        $nbImg = count(glob("img/escapeGame/" . $escapeGame['id_escapeGame'] . "/*.*"));

        echo "<div class='escapeGameRectSelec'></div>";
        for ($i = 1; $i < $nbImg; $i++) {
            echo "<div class='escapeGameRect'></div>";
        }
        ?>
    </div>

    <div class="escapeGSliderIMG">
        <?php
        echo "<img class='escapeGameSCenterSelec' src='../img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.jpg'>";
        for ($i = 1; $i < $nbImg; $i++) {
            echo "<img class='escapeGameSCenter' src='../img/escapeGame/" . $escapeGame["id_escapeGame"] . "/" . $i + 1 . ".jpg'>";
        }
        ?>
    </div>
</div>

<!-- Map -->
<h2 class="titreUnderline"><?= ESCAPEGAME_H2_MAP ?></h2>

<p>
    <?php
    echo "<div class='escapeGameMap' data-x='" . $escapeGame['x'] . "' data-y='" . $escapeGame['y'] . "'>" . $escapeGame["address"] . "</div>";
    ?>
</p>
<div class="divOutsideMapEG">
    <div id='mapEscapeGame'></div>
</div>

<!-- Q&A -->
<h2 class="titreUnderline"><?= ESCAPEGAME_H2_QANDA ?></h2>

<?php if ($qAndAEG != 0) { ?>

    <div class="aQuestion">
        <div class="titleQuestion">
            <?php echo "<p>" . ($_SESSION['lang'] == 'fr' ? $qAndAEG[0]['titleFR'] : $qAndAEG[0]['title']) . '</p>' ?>
            <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414"
                 viewBox="0 0 14.828 8.414">
                <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none"
                      stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
        </div>
        <div class="descQuestion displayQuestion">
            <?php echo "<p>" . ($_SESSION['lang'] == 'fr' ? $qAndAEG[0]['answerFR'] : $qAndAEG[0]['answer']) . '</p>' ?>
        </div>
    </div>

    <div class="escapeMoreAnswers displayNone">
        <?php
        for ($i = 0; $i < sizeof($qAndAEG) - 1; $i++) {
            echo "<div class='aQuestion'>";
            echo "<div class='titleQuestion'><p>" . $qAndAEG[$i + 1]['title'] . "</p>"; ?>
            <svg class="arrow arrowDown" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414"
                 viewBox="0 0 14.828 8.414">
                <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)" fill="none"
                      stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
            <?php echo "</div><div class='descQuestion displayQuestion'><p>" . $qAndAEG[$i + 1]['answer'] . "</p></div>";
            echo "</div>";
        }
        ?>
    </div>

    <?php if (sizeof($qAndAEG) > 1) { ?>
        <div class="escapeMoreAnswersButton greenButton">
            <?= ESCAPEGAME_MOREANSWERS ?>
        </div>

    <?php }
} else {
    echo "<p class='vide'>There's no question for this escape game yet.</p>";
} ?>

<!-- reviews -->
<h2 class="titreUnderline"><?= ESCAPEGAME_H2_REVIEWS ?></h2>

<?php if ($reviewsEG != 0) { ?>

    <div class="escapeGameReview">
        <div class="reviewNom"><?php echo $reviewsEG[0]["firstName"]; ?></div>
        <div
            class="reviewDesc"><?php echo $_SESSION['lang'] == 'fr' ? $reviewsEG[0]["descriptionFR"] : $reviewsEG[0]["description"] ?></div>
        <div class="reviewNote">
            <?php
            $splitRating = preg_split("/[.]/", $reviewsEG[0]["rating"]);
            if (sizeof($splitRating) > 1) {
                $rating = (int)$splitRating[0];
                for ($i = 0; $i < $rating; $i++) {
                    ?>
                    <svg height='20' width='20'>
                        <circle cx='10' cy='10' r='10' fill='white'/>
                    </svg> <?php
                }
                ?>
                <svg height="20" width="10">
                    <circle cx="10" cy="10" r="10" fill="white"/>
                </svg> <?php
            } else if (sizeof($splitRating) == 1) {
                $rating = $reviewsEG[0]["rating"];
                for ($i = 0; $i < $rating; $i++) {
                    ?>
                    <svg height='20' width='20'>
                        <circle cx='10' cy='10' r='10' fill='white'/>
                    </svg> <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="escapeMoreReviews displayNone">
        <?php
        //var_dump($reviewsEG);
        //var_dump(sizeof($reviewsEG));
        for ($i = 1;
             $i < sizeof($reviewsEG);
             $i++) {
            ?>
            <div class="escapeGameReview">
                <div class="reviewNom"><?php echo $reviewsEG[$i]["firstName"] ?></div>
                <div class="reviewDesc"><?php echo $reviewsEG[$i]["description"] ?></div>
                <div class="reviewNote">
                    <?php
                    //create a circle for each rating if the rating is a float number (ex: 4.5) or a whole number (ex: 4) and a half circle if the rating is a float number with a decimal (ex: 4.3)
                    $splitRating = preg_split("/[.]/", $reviewsEG[$i]["rating"]);
                    if (sizeof($splitRating) > 1) {
                        $rating = (int)$splitRating[0];
                        for ($j = 0; $j < $rating; $j++) {
                            ?>
                            <svg height='20' width='20'>
                                <circle cx='10' cy='10' r='10' fill='white'/>
                            </svg> <?php
                        }
                        ?>
                        <svg height="20" width="10">
                            <circle cx="10" cy="10" r="10" fill="white"/>
                        </svg> <?php
                    } else if (sizeof($splitRating) == 1) {
                        $rating = $reviewsEG[$i]["rating"];
                        for ($j = 0; $j < $rating; $j++) {
                            ?>
                            <svg height='20' width='20'>
                                <circle cx='10' cy='10' r='10' fill='white'/>
                            </svg> <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    </div>

    <?php if (sizeof($reviewsEG) > 1) { ?>
        <div class="escapeMoreReviewsButton escapeYellowButton">
            <?= ESCAPEGAME_MOREREVIEWS ?>
        </div>

        <?php
    }
} else {
    echo "<p class='vide'>" . ESCAPEGAME_NOREVIEW . "</p>";
} ?>

<?php
//Check if the user is connected
if (isset($_SESSION["email"])) {
    //Check if the user has already reviewed the escape game
    //var_dump($reviewed);
    if (!$reviewed) {
        ?>
        <a href="index.php?action=addReview&id=<?= $escapeGame["id_escapeGame"] ?>">
            <div class="greenButton">
                <?= ESCAPEGAME_ADD_REVIEW ?>
            </div>
        </a>
        <?php
    }
}
?>

<!-- Buy -->
<h2 id="buyEscapeGame" class="titreUnderline"><?= ESCAPEGAME_H2_BUY ?></h2>

<form id="search" action="index.php?action=escapeGame&escapeGame=<?= $escapeGame["id_escapeGame"] ?>#hours"
      method="POST">

    <p><?= ESCAPEGAME_NBPERSONS ?></p>
    <input class="inputBuy" type="number" id="buyPerson" name="nbPersons" required>

    <p>Date</p>
    <!-- Min date after the current date and the user can't select sunday -->
    <input class="inputBuy" type="date" id="buyDate" name="buyDate" min="<?= date("Y-m-d", strtotime("+1 day")) ?>"
           required>
    <input type="hidden" name="research" value="true">

    <input class="escapeSearchButton" value="<?= ESCAPEGAME_ESCAPESEARCHBUTTON ?>" type="submit" name="submit">

</form>

<form id="search" action="index.php?action=buyEG&escapeGame=<?= $escapeGame["id_escapeGame"] ?>" method="POST">
    <div class="possibleSchedules <?php
    if (!isset($_POST["research"]) or $_POST["buyDate"] < date("Y-m-d", strtotime("+1 day"))) {
        echo "displayNone";
    }
    ?>">
        <?php
        if (isset($_POST["research"]) and $_POST["buyDate"] >= date("Y-m-d", strtotime("+1 day"))) {
            if ($_SESSION["lang"] == "fr") {
                //set the date in french with the month in french like "1 janvier 2020"
                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
            } else {
                //set the date in english with the month in english like "1 january 2020"
                setlocale(LC_TIME, 'en_US.utf8', 'eng');
            }
            ?>
            <h3><?= ESCAPEGAME_SCHEDULES ?><span
                    class="inserDate"><?= strftime("%#d %B %Y", strtotime($_POST["buyDate"])) ?></span>:</h3>
        <?php } else { ?>
            <h3><?= ESCAPEGAME_SCHEDULES ?><span class="inserDate">DATE</span>:</h3>
        <?php } ?>
        <?php
        //var_dump($reservation);

        $ten = false;
        $fourteen = false;
        $eightteen = false;
        $twenty = false;
        if (!empty($reservation)) {
            //var_dump($reservation);
            //verify that none of the date contain de hours 10 or 14 or 18 or 20
            foreach ($reservation as $res) {
                if ($res["hours"] == 10) {
                    $ten = true;
                } else if ($res["hours"] == 14) {
                    $fourteen = true;
                } else if ($res["hours"] == 18) {
                    $eightteen = true;
                } else if ($res["hours"] == 20) {
                    $twenty = true;
                }
            }
        }
        ?>

        <div class="hoursSchedules" id="hours">
            <?php
            if (isset($_POST["research"]) and $_POST["buyDate"] >= date("Y-m-d", strtotime("+1 day"))) {
                ?>
                <input type="radio" name="hour" id="ten" value="ten" <?php
                if ($ten) {
                    echo "disabled";
                }
                ?>>
                <label for="ten" class="greenButton">10h</label>
                <input type="radio" name="hour" id="fourteen" value="fourteen" <?php
                if ($fourteen) {
                    echo "disabled";
                }
                ?>>
                <label for="fourteen" class="greenButton">14h</label>
                <input type="radio" name="hour" id="eightteen" value="eightteen" <?php
                if ($eightteen) {
                    echo "disabled";
                }
                ?>>
                <label for="eightteen" class="greenButton">18h</label>
                <input type="radio" name="hour" id="twenty" value="twenty" <?php
                if ($twenty) {
                    echo "disabled";
                }
                ?>>
                <label for="twenty" class="greenButton">20h</label>
                <?php
            }
            ?>
        </div>
        <input type="hidden" name="buyDate" value="<?= $_POST["buyDate"] ?>">
        <input type="hidden" name="nbPersons" value="<?= $_POST["nbPersons"] ?>">
        <input type="submit" value="Order now" class="escapeYellowButton">
    </div>
    <?php
    //     }
    // }
    ?>
</form>


<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>

<script src="js/qAndA.js"></script>
<script src="js/escapeGame.js"></script>