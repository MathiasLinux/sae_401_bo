<?php
$counter = 0;
foreach ($escapeGames as $escapeGame) {
    $counter++;
    ?>
    <div class="escapeGamesAlign <?php echo ($counter % 2 == 0) ? 'escapeGamesReverse' : ''; ?>">
        <h2 class="titleYellow titreEscape"><?php echo $escapeGame['name']; ?></h2>
        <div class="imgEscape">
            <img class="imgBorder " src="img/escapeGames/<?php echo $escapeGame['id_escapeGame']; ?>.jpg"
             alt="<?php echo $escapeGame['name']; ?>">
        </div>
        <p class="paraEscape"><?php echo $escapeGame['description']; ?></p>
        <a class="greenLink buttonEscape" href="index.php?action=escapeGame&escapeGame=<?php echo $escapeGame['id_escapeGame']; ?>">Go the
            escape game page</a>
    </div>
    <div class="contourTitleImage" style="padding-bottom: 50px; margin-bottom: 50px;"></div>
    <?php
}
?>