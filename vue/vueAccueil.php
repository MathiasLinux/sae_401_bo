<section class="LogoAccueil">
    <div class="accueilLogo">
        <img src="img/logo.png" alt="logo">
    </div>
    <div class="underline">
        <p>
            <?= HOME_FIRST_DESCRIPTION ?>

        </p>
    </div>
</section>

<?php
//var_dump($frontEscape);
?>
<?php
if ($_SESSION["lang"] == "fr") {
    $titre = $frontEscape["nameFR"];
    $description = $frontEscape["descriptionFR"];
} elseif ($_SESSION["lang"] == "en") {
    $titre = $frontEscape["name"];
    $description = $frontEscape["description"];
} else {
    $titre = $frontEscape["name"];
    $description = $frontEscape["description"];
}
?>
<section class="newEscapeGame">
    <h2 class="titleUnderline div1"><?= $titre ?></h2>

    <p class="descLastEscape div2">
        <?= $description ?>
    </p>
    <?php
    //if file exists in img/escapeGames/escapeGameId.jpg then display it elseif the file exists in img/escapeGames/escapeGameId.png then display it else display the default image
    if (file_exists("img/escapeGames/" . $frontEscape["id_escapeGame"] . ".jpg")) {
        $img = "img/escapeGames/" . $frontEscape["id_escapeGame"] . ".jpg";
    } elseif (file_exists("img/escapeGames/" . $frontEscape["id_escapeGame"] . ".png")) {
        $img = "img/escapeGames/" . $frontEscape["id_escapeGame"] . ".png";
    } else {
        $img = "img/escapeGames/default.jpg";
    }
    ?>
    <img class="imgBorder div3" src="<?= $img ?>" alt="<?= $titre ?>">
    <div class="linkGroup div4">
        <a class="greenLink div5" href="index.php?action=escapegames"><?= HOME_MORE_INFO ?></a>
        <a class="greenLink div6" href="index.php?action=escapegames"><?= HOME_BUY ?></a>
    </div>
    <div>

    </div>
</section>

<h2 class="titleUnderline"><?= HOME_GIFT_CARD_TITLE ?></h2>

<section class="GC">
    <div class="divImg">
        <img class="imgBorder" src="img/giftCards.png" alt="giftcard logo">
    </div>

    <div>
        <p><?= HOME_GIFT_CARD_P ?></p>
        <div class="linkGroup">
            <a class="greenLink" href="index.php?action=giftCards"><?= HOME_BUY ?></a>
        </div>
    </div>
</section>

<h2 class="titleUnderline"><?= HOME_OTHER_ESCAPE_TITLE ?></h2>
<?php
//var_dump($escapeGames);
?>

<section class="Vue">
    <?php
    // foreach ($escapeGames as $escapeGame)
    for($i=0; $i<4; $i++)
    {
        $escapeGame = $escapeGames[$i];
        if ($_SESSION["lang"] == "fr") {
            $titre = $escapeGame["nameFR"];
            $description = $escapeGame["descriptionFR"];
        } elseif ($_SESSION["lang"] == "en") {
            $titre = $escapeGame["name"];
            $description = $escapeGame["description"];
        } else {
            $titre = $escapeGame["name"];
            $description = $escapeGame["description"];
        }
        ?>
        <div class="contourTitleImage">
            <div class="titleAndImage">
                <?php
                //if file exists in img/escapeGames/escapeGameId.jpg then display it elseif the file exists in img/escapeGames/escapeGameId.png then display it else display the default image
                if (file_exists("img/escapeGames/" . $escapeGame["id_escapeGame"] . ".jpg")) {
                    $img = "img/escapeGames/" . $escapeGame["id_escapeGame"] . ".jpg";
                } elseif (file_exists("img/escapeGames/" . $escapeGame["id_escapeGame"] . ".png")) {
                    $img = "img/escapeGames/" . $escapeGame["id_escapeGame"] . ".png";
                } else {
                    $img = "img/escapeGames/default.jpg";
                }
                ?>
                <img src="<?= $img ?>" alt="<?= $titre ?>">
                <div>
                    <h2 class="titleYellow"><?= $titre ?></h2>
                    <a class="yellowLinkHomeEscapeMobile" href="index.php?action=escapegames"><?= HOME_MORE_INFO ?></a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</section>

<section class="Vue2">
    <?php
    // var_dump($escapeGames);
    // foreach ($escapeGames as $escapeGame)
    $escapeGamesR = array_reverse($escapeGames);
    for($i=0;$i<4;$i++)
    {
        $escapeGame = $escapeGamesR[$i];
        // var_dump($escapeGame);
        if ($_SESSION["lang"] == "fr") {
            $titre = $escapeGame["nameFR"];
            // $description = $escapeGame["descriptionFR"];
        } elseif ($_SESSION["lang"] == "en") {
            $titre = $escapeGame["name"];
            // $description = $escapeGame["description"];
        } else {
            $titre = $escapeGame["name"];
            // $description = $escapeGame["description"];
        }
        if (file_exists("img/escapeGames/" . $escapeGame["id_escapeGame"] . "-home.jpg")) {
            $img = "img/escapeGames/" . $escapeGame["id_escapeGame"] . "-home.jpg";
        } elseif (file_exists("img/escapeGames/" . $escapeGame["id_escapeGame"] . "-home.png")) {
            $img = "img/escapeGames/" . $escapeGame["id_escapeGame"] . "-home.png";
        } else {
            $img = "img/escapeGames/default.png";
        }
        ?>
        <a href="index.php?action=escapeGame&escapeGame=<?= $escapeGame["id_escapeGame"] ?>">
            <div>
                <div class="Posi">
                    <div>
                        <img class="img1" src="<?= $img ?>" alt="<?= $escapeGame["id_escapeGame"] ?>_<?= $titre ?>">
                    </div>
                    <h2><?= $titre ?></h2>
                    <!-- <a href="index.php?action=admin&page=escapeGame&id=<?= $escapeGame["id_escapeGame"] ?>"><?= HOME_OTHER_ESCAPE_LINK ?></a> -->
                </div>
            </div>
        </a>
        <?php
    }
    ?>
</section>

<?php
//var_dump($reviews);
?>

<h2 class="titleUnderline"><?= HOME_REVIEW_TITLE ?></h2>
<div class="reviewsHome">
    <?php
    $length = count($reviews);
    if (count($reviews) < 4) {
        $length = count($reviews);
    } else {
        $length = 4;
    }
    for ($i = 0; $i < $length; $i++) {
        if ($_SESSION["lang"] == "fr") {
            $description = $reviews[$i]["descriptionFR"];
        } elseif ($_SESSION["lang"] == "en") {
            $description = $reviews[$i]["description"];
        } else {
            $description = $reviews[$i]["description"];
        }
        ?>
        <div class="aReview">
            <div class="leftReview">
                <p class="reviewName"><?= $reviews[$i]["firstName"] . " " . $reviews[$i]["lastName"] ?></p>
                <div class="reviewStars">
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
            <div class="rightReview">
                <p><?= $description ?></p>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>