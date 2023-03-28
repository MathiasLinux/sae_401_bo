<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>
<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndAModifyEG_S&id_qAndACat=<?= $qAndAs['id_qAndACat'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA">
            <?php
                echo ADMIN_QANDA_MOD_EG_TITLE.": <br>";
                if($_SESSION['lang']=='fr')
                    echo $qAndAs['titleFR'];
                else
                    echo $qAndAs['title'];
            ?>
        </p>
        <select class="greenButtonEscapeGames" name="escapeGames" title="escapeGames">
            <option value=""></option>
            <?php
                if(!empty($EGs)){
                    foreach($EGs as $EG){
                        echo "<option value='".$EG["id_escapeGame"]."'>";
                        echo $_SESSION['lang']=='fr' ? $EG['nameFR'] : $EG['name'];
                        echo "</option>";
                    }
                }
            ?>
        </select>
    </label>
    <input class="yellowButton" type="submit" value="<?= ADMIN_QANDA_MOD_EG_SUBMIT ?>">
    </form>
</div>