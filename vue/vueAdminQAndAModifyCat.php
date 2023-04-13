<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>
<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndAModifyCat_S&id_qAndACat=<?= $qAndAs['id_qAndACat'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_CAT_EN ?>:</p>
        <input class="addTitle" type="text" name="nameCat" id="nameCat" value="<?=$qAndAs['title'] ?>">
    </label>
    <div class="greenBar"></div>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_CAT_FR ?>:</p>
        <input class="addTitle" type="text" name="nameCatFR" id="nameCatFR" value="<?=$qAndAs['titleFR']?>">
    </label>
    <input class="yellowButton" type="submit" value="<?= ADMIN_QANDA_MOD_CAT_SUBMIT ?>">
    </form>
</div>