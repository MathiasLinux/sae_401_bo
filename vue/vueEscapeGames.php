<?php
$counter = 0;
foreach ($escapeGames as $escapeGame) {
    $counter++;
    ?>
    <div class="escapeGamesAlign <?php echo ($counter % 2 == 0) ? 'escapeGamesReverse' : ''; ?>">
        <h2 class="titleYellow titreEscape"><?php echo $escapeGame['name']; ?></h2>
        <div class="imgEscape">
            <?php
            echo $escapeGame['id_escapeGame'];
            if (file_exists("img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.jpg")) {
                $img = "img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.jpg";
            } elseif (file_exists("img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.png")) {
                $img = "img/escapeGame/" . $escapeGame["id_escapeGame"] . "/1.png";
            } else {
                $img = "img/escapeGames/default.jpg";
            }
            ?>
            <img class="imgBorder " src="<?= $img ?>" alt="<?php echo $escapeGame['name']; ?>">
        </div>
        <p class="paraEscape"><?php echo $_SESSION["lang"] == "fr" ? $escapeGame['descriptionFR'] : $escapeGame['description']; ?></p>
        <a class="greenLink buttonEscape"
           href="index.php?action=escapeGame&escapeGame=<?php echo $escapeGame['id_escapeGame']; ?>"><?= ESCAPE_GAMES_BUTTON ?></a>
    </div>
    <div class="contourTitleImage" style="padding-bottom: 50px; margin-bottom: 50px;"></div>
    <?php
}
?>