<a href="index.php?action=admin&page=qAndA"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a> 
<h3 class="adminQandA"> 
    <?php
        echo ADMIN_QANDA_Q_H3." : <br>";
        if($_SESSION['lang']=='fr')
            echo $qAndAs["titleFR"];
        else
            echo $qAndAs["title"];
    ?>
</h3>

<form class="formAdmin" action="index.php?action=admin&page=qAndAQuestionsAdd_S&id_qAndACat=<?= $qAndAs["id_qAndACat"] ?>" method="post">
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_FORM_Q ?> </p>
        <input class="addTitle" type="text" name="question" id="question">
    </label>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_FORM_A ?> </p>
        <textarea class="addTitle" type="text" name="answer" id="answer"></textarea>
    </label>
    <div class="greenBar"></div>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_FORM_Q_FR ?> </p>
        <input class="addTitle" type="text" name="questionFR" id="questionFR">
    </label>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_FORM_A_FR ?> </p>
        <textarea class="addTitle" type="text" name="answerFR" id="answerFR"></textarea>
    </label>
    <input class="yellowButton" type="submit" value=" <?= ADMIN_QANDA_NEW_QANDA_SUBMIT ?> ">
</form>

<div class="listQandA">
    <?php 
    if(!empty($qAndAQs)){
        foreach($qAndAQs as $qAndAQ){
            echo '<div class="oneQandA">';
            echo '<div class="oneQ">';
            echo '<div class="titleQ">'.ADMIN_QANDA_TITLE_Q.'</div>';
            echo '<p>';
            if($_SESSION['lang'] == 'fr')
                echo $qAndAQ['titleFR'];
            else
                echo $qAndAQ['title'];
            echo '</p></div>';
            echo '<div class="oneA">';
            echo '<div class="titleA">'.ADMIN_QANDA_TITLE_A.'</div>';
            echo '<p>';
            if($_SESSION['lang'] == 'fr')
                echo $qAndAQ['answerFR'];
            else
                echo $qAndAQ['answer'];
            echo '</p></div>';
            echo '<div class="buttonsQandA buttonsQandAQuestions">';
            echo '<a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAQuestionsModify&id_qAndAQ='.$qAndAQ['id_qAndAQuestion'].'">'.ADMIN_QANDA_MOD_QANDA.'</a>';
            echo '<a class="redButtonQandA" href="index.php?action=admin&page=qAndAQuestionsDelete&id_qAndAQ='.$qAndAQ['id_qAndAQuestion'].'">'.ADMIN_QANDA_DELETE.'</a>';
            echo '</div>';
            echo '</div>';
        }
    }
    else
        echo ADMIN_QANDA_NO_QANDA;
    ?>
</div>