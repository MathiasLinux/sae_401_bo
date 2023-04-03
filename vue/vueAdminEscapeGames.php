<h2 class="titleUnderline"><?= ADMIN_EG_TITLE ?></h2>
<div class="allEscapeGamesAdmin">
    <?php
        if(isset($EGs) && !empty($EGs)){
            foreach($EGs as $EG){
                $_SESSION['lang']=='fr' ? $EGname=$EG['nameFR'] : $EGname=$EG['name'];
                echo '<div class="anEscapeGameAdmin">';
                echo '<img src="img/escapeGames/'.$EG['id_escapeGame'].'.jpg" alt="'.$EGname.' image">';
                echo '<p>'.$EGname.'</p>';
                echo '<a class="greenButton" href="index.php?action=admin&page=escapeGame&id='.$EG['id_escapeGame'].'">'.ADMIN_EG_BUTTON.'</a>';
                echo '</div>';
            }
        }
    ?>
</div>