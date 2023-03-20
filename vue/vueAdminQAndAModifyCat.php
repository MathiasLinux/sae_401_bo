<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>Return</button></a>
<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndAModifyCat_S&id_qAndACat=<?= $qAndAs['id_qAndACat'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA">Modify category : <br> <?= $qAndAs['title'] ?></p>
        <input class="addTitle" type="text" name="nameCat" id="nameCat">
    </label>
    <input class="yellowButton" type="submit" value="Update category">
    </form>
</div>