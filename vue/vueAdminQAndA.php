<h2 class="titleUnderline">Q&A</h2>
<h3 class="adminQandA">List of title</h3>
<form class="formAdmin" action="#">
    <label>
        <p class="titleAdminQAndA">New Title</p>
        <input class="addTitle" type="text" name="title" id="title">
    </label>
    <input class="yellowButton" type="submit" value="Add new title">
</form>
<div class="categoriesQAndA">
    <p class="categorieQAndA">Categories</p>
    <div>
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
    </div>
</div>