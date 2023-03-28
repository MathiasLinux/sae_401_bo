<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>
<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndADeleteCat_S&id_qAndACat=<?= $qAndAs['id_qAndACat'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA">
            <?php
                echo ADMIN_QANDA_DELETE_CAT.": <br>";
                if($_SESSION['lang'] == 'fr')
                    echo $qAndAs['titleFR'];
                else
                    echo $qAndAs['title'];
            ?>
        </p>
    </label>
    <input class="redButtonQandA" type="submit" value=" <?= ADMIN_QANDA_DELETE_CAT_SUBMIT ?>">
    </form>
</div>