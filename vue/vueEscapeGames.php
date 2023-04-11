<?php
$counter = 0;
foreach ($escapeGames as $escapeGame) {
    $counter++;
    ?>
    <div class="escapeGamesAlign <?php echo ($counter % 2 == 0) ? 'escapeGamesReverse' : ''; ?>">
        <?php
        if ($_SESSION['lang'] == 'fr') {
            $escapeGameName = $escapeGame['nameFR'];
        } elseif ($_SESSION['lang'] == 'en') {
            $escapeGameName = $escapeGame['name'];
        } else {
            $escapeGameName = $escapeGame['name'];
        }
        ?>
        <h2 class="titleYellow titreEscape"><?= $escapeGameName ?></h2>
        <div class="imgEscape">
            <?php
            if (file_exists("img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.jpg")) {
                $img = "img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.jpg";
            } elseif (file_exists("img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.png")) {
                $img = "img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.png";
            } else {
                $img = "img/escapeGames/default.jpg";
            }
            ?>
            <img class="imgBorder " src="<?= $img ?>" alt="<?= $escapeGameName ?>">
        </div>
        <p class="paraEscape"><?php echo $_SESSION["lang"] == "fr" ? $escapeGame['descriptionFR'] : $escapeGame['description']; ?></p>
        <a class="greenLink buttonEscape"
           href="index.php?action=escapeGame&escapeGame=<?= $escapeGame['id_escapeGame'] ?>"><?= ESCAPE_GAMES_BUTTON ?></a>
    </div>
    <div class="contourTitleImage" style="padding-bottom: 50px; margin-bottom: 50px;"></div>
    <?php
}
?>