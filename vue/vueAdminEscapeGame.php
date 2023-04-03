<a href="index.php?action=admin&page=escapeGames"><button class="returnAdmin"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg> <?= ADMIN_QANDA_RETURN ?> </button></a>

<form class="formAdminEG" action="#" method="post">
    <div>
        <label>
            <span>Name</span>
            <input type="text" value="<?= $EG['name'] ?>">
        </label>
    </div>
    <div>
        <label>
            <span>Name FR</span>
            <input type="text" value="<?= $EG['nameFR'] ?>">
        </label>
    </div>

    <div class="visibilityEG">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        <div>Display</div>
        <input type="range" name="" id="" min="0" max="1">
    </div>

    <!-- Gestion des images à faire -->

    <?php
        $imgs = scandir("img/".$EG['id_escapeGame']."/");
        var_dump($imgs);
    ?>

    <h2 class="titleUnderline">Difficulty & Duration</h2>

    <div class="difficultyAdmin">
        <label>
            <span>Difficulty</span>
            <select name="" id="">
                <option></option>
                <option value="">Beginner</option>
                <option value="">Easy</option>
                <option value="">Medium</option>
                <option value="">Hard</option>
                <option value="">Expert</option>
            </select>
        </label>
        <label>
            <span>Difficulty FR</span>
            <select name="" id="">
                <option></option>
                <option value="">Débutant</option>
                <option value="">Facile</option>
                <option value="">Moyen</option>
                <option value="">Difficile</option>
                <option value="">Expert</option>
            </select>
        </label>
    </div>    
    <div>
        <label>
            <span>Duration</span>
            <input type="text" value="<?= $EG['duration'] ?>">
        </label>
    </div>

    <h2 class="titleUnderline">Presentation</h2>

    <div>
        <label>
            <span>Description</span>
            <textarea><?= $EG['description'] ?></textarea>
        </label>
    </div>

    <div>
        <label>
            <span>Description FR</span>
            <textarea><?= $EG['descriptionFR'] ?></textarea>
        </label>
    </div>

    <h2 class="titleUnderline">Map</h2>

    <div>
        <label>
            <span>Address</span>
            <input type="text" value="<?= $EG['address'] ?>">
        </label>
    </div>

    <input class="yellowButton" type="submit" value="Update Escape Game">
</form>

<!-- <?= var_dump($EG) ?> -->