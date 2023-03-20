<?php
//var_dump($escapeGames);
?>
    <h2 class="titleUnderline">Escape Games</h2>

<?php
foreach ($escapeGames as $escapeGame) {
    ?>
    <div class="escapeGamesAlign">
        <h2 class="titleYellow"><?php echo $escapeGame['name']; ?></h2>
        <img class="imgBorder" src="../img/escapeGames/<?php echo $escapeGame['id_escapeGame']; ?>.jpg"
             alt="<?php echo $escapeGame['name']; ?>">
        <p><?php echo $escapeGame['description']; ?></p>
        <a class="greenLink" href="index.php?action=escapeGame&escapeGame=<?php echo $escapeGame['id']; ?>">Go the
            escape game page</a>
    </div>
    <div class="contourTitleImage" style="padding-bottom: 50px; margin-bottom: 50px;"></div>
    <?php
}
?>