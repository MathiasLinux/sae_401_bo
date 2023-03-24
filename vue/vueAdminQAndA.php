<h2 class="titleUnderline">Q&A</h2>
<h3 class="adminQandA">List of category</h3>
<form class="formAdmin" action="index.php?action=admin&page=qAndANewCat_S" method="post">
    <label>
        <p class="titleAdminQAndA">New category</p>
        <input class="addTitle" type="text" name="newCat" id="newCat">
    </label>
    <div class="greenBar"></div>
    <label>
        <p class="titleAdminQAndA">New category FR</p>
        <input class="addTitle" type="text" name="newCatFR" id="newCatFR">
    </label>
    <input class="yellowButton" type="submit" value="Add new category">
</form>

<!-- <?php var_dump($qAndAs); ?> -->

<div class="categoriesQAndA">
    <p class="categoryQAndA">Categories</p>
    <?php
        if(count($qAndAs)){
            foreach ($qAndAs as $qAndA) {
                echo '<div class="oneCategory">';
                echo '<p class="titleCategoryQAndA">'.$qAndA['title'].'</p>';
                echo '<div class="buttonsQandA">';
                echo '<a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAQuestions&id_qAndACat='.$qAndA['id_qAndACat'].'">Modify questions</a>';
                echo '<a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAModifyCat&id_qAndACat='.$qAndA['id_qAndACat'].'">Modify category</a>';
                echo '<a class="greenButtonEscapeGames" href="index.php?action=admin&page=qAndAModifyES&id_qAndACat='.$qAndA['id_qAndACat'].'">Modify ES</a>';
                echo '<a class="redButtonQandA" href="index.php?action=admin&page=qAndADeleteCat&id_qAndACat='.$qAndA['id_qAndACat'].'">Delete</a>';
                echo '</div>';
            }
        }
        else
            echo "No category";
    ?>

    <!-- <div class="oneCategorie">
        <p class="titleCategorieQAndA">General questions</p>
        <div class="buttonsQandA">
            <a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAQuestions&categorie=general">Modify questions</a>
            <a class="yellowButtonQAndA" href="#">Modify categories</a>
            <select class="greenButtonEscapeGames" name="escapeGames" id="general" title="escapeGames">
                <option value="general">General</option>
            </select>
            <a class="redButtonQandA" href="#">Delete</a>
        </div>
    </div>
    <div class="oneCategorie">
        <p class="titleCategorieQAndA">Questions about "The Codex"</p>
        <div class="buttonsQandA">
            <a class="yellowButtonQAndA" href="index.php?action=admin&page=qAndAQuestions&categorie=thecodex">Modify questions</a>
            <a class="yellowButtonQAndA" href="#">Modify categories</a>
            <select class="greenButtonEscapeGames" name="escapeGames" id="theCodex" title="escapeGames">
                <option value="">Escape Games</option>
                <option value="thecodex">The Codex</option>
            </select>
            <a class="redButtonQandA" href="#">Delete</a>
        </div>
    </div> -->
</div>