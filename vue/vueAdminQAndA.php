<h2 class="titleUnderline"> <?= ADMIN_QANDA_TITLE ?> </h2>
<h3 class="adminQandA"> <?= ADMIN_QANDA_H3 ?> </h3>
<form class="formAdmin" action="index.php?action=admin&page=qAndANewCat_S" method="post">
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_NEW_CAT ?> </p>
        <input class="addTitle" type="text" name="newCat" id="newCat">
    </label>
    <div class="greenBar"></div>
    <label>
        <p class="titleAdminQAndA"> <?= ADMIN_QANDA_NEW_CAT_FR ?> </p>
        <input class="addTitle" type="text" name="newCatFR" id="newCatFR">
    </label>
    <input class="yellowButton" type="submit" value=" <?= ADMIN_QANDA_NEW_CAT_SUBMIT ?> ">
</form>

<div class="categoriesQAndA">
    <p class="categoryQAndA"> <?= ADMIN_QANDA_CAT ?> </p>
    <?php
        // Display the category and these affiliates buttons (Modify questions / Modify name of the category / Modify escape game association / Delete the category)
        if(count($qAndAs)){ // Verify if a category exist
            foreach ($qAndAs as $qAndA) {
                echo '<div class="oneCategory">';
                echo '<p class="titleCategoryQAndA">';
                if($_SESSION['lang']=='fr')
                    echo $qAndA['titleFR'];
                else
                    echo $qAndA['title'];
                echo '</p>';
                echo '<div class="buttonsQandA">';
                echo '<a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAQuestions&id_qAndACat='.$qAndA['id_qAndACat'].'">'.ADMIN_QANDA_MOD_Q.'</a>';
                echo '<a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAModifyCat&id_qAndACat='.$qAndA['id_qAndACat'].'">'.ADMIN_QANDA_MOD_CAT.'</a>';
                echo '<a class="greenButtonEscapeGames" href="index.php?action=admin&page=qAndAModifyEG&id_qAndACat='.$qAndA['id_qAndACat'].'">'.ADMIN_QANDA_MOD_EG.'</a>';
                echo '<a class="redButtonQandA" href="index.php?action=admin&page=qAndADeleteCat&id_qAndACat='.$qAndA['id_qAndACat'].'">'.ADMIN_QANDA_DELETE.'</a>';
                echo '</div>';
                echo '</div>';
            }
        }
        else
            echo ADMIN_QANDA_NO_CAT;
    ?>
</div>