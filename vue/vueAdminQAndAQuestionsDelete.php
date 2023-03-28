<a href="index.php?action=admin&page=qAndAQuestions&id_qAndACat=<?= $qAndAQs['id_qAndACat'] ?>"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>
<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndAQuestionsDelete_S&id_qAndACat=<?= $qAndAQs['id_qAndACat'] ?>&id_qAndAQ=<?= $qAndAQs['id_qAndAQuestion'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA"> 
            <?php
                echo ADMIN_QANDA_DELETE_Q.":<br>";
                if($_SESSION['lang']=='fr')
                    echo $qAndAQs['titleFR'];
                else
                    echo $qAndAQs['title'];
            ?>
        </p>
    </label>
    <input class="redButtonQandA" type="submit" value="<?= ADMIN_QANDA_DELETE_Q_SUBMIT ?>">
    </form>
</div>