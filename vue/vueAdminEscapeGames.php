<h2 class="titleUnderline"><?= ADMIN_EG_TITLE ?></h2>
<div class="topAdminJob">
    <a class="yellowButtonAddAdmin" href="index.php?action=admin&page=escapeGame"><?= ADMIN_EG_ADD_BUTTON ?></a>
</div>
<div class="allEscapeGamesAdmin">
    <?php
    if (isset($EGs) && !empty($EGs)) {
        foreach ($EGs as $EG) {
            $_SESSION['lang'] == 'fr' ? $EGname = $EG['nameFR'] : $EGname = $EG['name'];
            echo '<div class="anEscapeGameAdmin">';
            // verify if the image exist in the folder in jpg or png
            if (file_exists("img/escapeGame/" . $EG["id_escapeGame"] . "/1.jpg")) {
                $img = "img/escapeGame/" . $EG["id_escapeGame"] . "/1.jpg";
            } elseif (file_exists("img/escapeGame/" . $EG["id_escapeGame"] . "/1.png")) {
                $img = "img/escapeGame/" . $EG["id_escapeGame"] . "/1.png";
            } else {
                $img = "img/escapeGames/default.jpg";
            }
            echo '<img src="' . $img . '" alt="' . $EGname . '">';
            echo '<p>' . $EGname . '</p>';
            echo '<a class="greenButton" href="index.php?action=admin&page=escapeGame&id=' . $EG['id_escapeGame'] . '">' . ADMIN_EG_BUTTON . '</a>';
            echo '</div>';
        }
    }
    ?>
</div>