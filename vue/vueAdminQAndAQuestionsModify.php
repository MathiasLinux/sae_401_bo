<a href="index.php?action=admin&page=qAndAQuestions&id_qAndACat=<?= $qAndAQs['id_qAndACat'] ?>"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>

<div class="deuxTiers">
    <form class="formAdmin" action="index.php?action=admin&page=qAndAQuestionsModify_S&id_qAndACat=<?= $qAndAQs['id_qAndACat'] ?>&id_qAndAQ=<?= $qAndAQs['id_qAndAQuestion'] ?>" method="post">
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_QANDA_Q ?>:</p>
        <input class="addTitle" type="text" name="question" id="question" value="<?= $qAndAQs['title'] ?>">
    </label>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_QANDA_A ?>:</p>
        <textarea class="addTitle" type="text" name="answer" id="answer"><?= $qAndAQs['answer'] ?></textarea>
    </label>
    <div class="greenBar"></div>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_QANDA_Q_FR ?>:</p>
        <input class="addTitle" type="text" name="questionFR" id="questionFR" value="<?= $qAndAQs['titleFR'] ?>">
    </label>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_MOD_QANDA_A_FR ?>:</p>
        <textarea class="addTitle" type="text" name="answerFR" id="answerFR"><?= $qAndAQs['answerFR'] ?></textarea>
    </label>
    <input class="yellowButton" type="submit" value="<?= ADMIN_QANDA_MOD_QANDA_SUBMIT ?>">
    </form>
</div>