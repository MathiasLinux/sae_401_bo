<a href="index.php?action=admin&page=escapeGames">
    <button class="returnAdmin">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7"/>
        </svg> <?= ADMIN_QANDA_RETURN ?> </button>
</a>

<form class="formAdminEG" action="index.php?action=admin&page=modifyEscapeGame&id=<?= $EG["id_escapeGame"] ?>"
      method="post" enctype="multipart/form-data">
    <div>
        <label>
            <span>Name</span>
            <input type="text" value="<?= $EG['name'] ?>" id="name" name="name">
        </label>
    </div>
    <div>
        <label>
            <span>Name FR</span>
            <input type="text" value="<?= $EG['nameFR'] ?>" id="nameFR" name="nameFR">
        </label>
    </div>

    <div class="visibilityEG">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#fff"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        </svg>
        <div>Display</div>
        <input type="range" min="0" max="1" id="visible" name="visible">
    </div>

    <!-- Gestion des images à faire -->

    <div class="imgAdminEG">
        <?php
        $imgs = scandir("img/escapeGame/" . $EG['id_escapeGame'] . "/");
        array_shift($imgs);
        array_shift($imgs);
        foreach ($imgs as $img)
            echo "<img src='img/escapeGame/" . $EG['id_escapeGame'] . "/$img' alt='$img image'>";
        ?>
    </div>
    <div class="escapeImgDivUpload ">
        <label for="imgEscapeUpload">
            <svg xmlns="http://www.w3.org/2000/svg" width="74.419" height="74.419"
                 viewBox="0 0 74.419 74.419">
                <path id="Tracé_27" data-name="Tracé 27"
                      d="M3,50.613V66.484a7.959,7.959,0,0,0,7.935,7.936H66.484a7.936,7.936,0,0,0,7.936-7.936V50.613M58.548,22.839,38.71,3,18.871,22.839M38.71,7.761V48.629"
                      transform="translate(-1.5 -1.5)" fill="none" stroke="#b2b2b2"
                      stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="3"/>
            </svg>
        </label>
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
        <input type="file"
               id="imgEscapeUpload" name="imgEscapeUpload[]"
               accept="image/png, image/jpeg" multiple="multiple">
    </div>


    <h2 class="titleUnderline">Difficulty & Duration</h2>

    <?php
    //var_dump($difficultiesEN);
    //separate at the comma
    $difficultiesENArr = explode(",", $difficultiesEN);
    $difficultiesFRArr = explode(",", $difficultiesFR);
    //remove the first bracket and the last one
    $difficultiesENArr[0] = substr($difficultiesENArr[0], 1);
    $difficultiesENArr[count($difficultiesENArr) - 1] = substr($difficultiesENArr[count($difficultiesENArr) - 1], 0, -1);
    $difficultiesFRArr[0] = substr($difficultiesFRArr[0], 1);
    $difficultiesFRArr[count($difficultiesFRArr) - 1] = substr($difficultiesFRArr[count($difficultiesFRArr) - 1], 0, -1);
    //remove the quote at the beginning and the end
    for ($i = 0; $i < count($difficultiesENArr); $i++) {
        $difficultiesENArr[$i] = substr($difficultiesENArr[$i], 1);
        $difficultiesENArr[$i] = substr($difficultiesENArr[$i], 0, -1);
        $difficultiesFRArr[$i] = substr($difficultiesFRArr[$i], 1);
        $difficultiesFRArr[$i] = substr($difficultiesFRArr[$i], 0, -1);
    }
    //var_dump($difficultiesENArr);
    //var_dump($difficultiesFRArr);
    echo $difficultiesENArr[0];
    ?>
    <div class="difficultyAdmin">
        <label>
            <span>Difficulty</span>
            <select name="difficultyEN" id="difficultyEN">
                <option value=""></option>
                <?php
                foreach ($difficultiesENArr as $difficultyEN) {
                    echo "<option value='$difficultyEN'>$difficultyEN</option>";
                }
                ?>
            </select>
        </label>
        <label>
            <!-- add pi character with unicode
            &#960; -->
            <span>Difficulty FR</span>
            <select name="difficultyFR" id="difficultyFR">
                <option value=""></option>
                <?php
                foreach ($difficultiesFRArr as $difficultyFR) {
                    echo "<option value='$difficultyFR'>$difficultyFR</option>";
                }
                ?>
            </select>
        </label>
    </div>
    <div>
        <label>
            <span>Duration</span>
            <input type="text" value="<?= $EG['duration'] ?>" id="duration" name="duration">
        </label>
    </div>

    <h2 class="titleUnderline">Presentation</h2>

    <div>
        <label>
            <span>Description</span>
            <textarea id="description" name="description"><?= $EG['description'] ?></textarea>
        </label>
    </div>

    <div>
        <label>
            <span>Description FR</span>
            <textarea id="descriptionFR" name="descriptionFR"><?= $EG['descriptionFR'] ?></textarea>
        </label>
    </div>

    <h2 class="titleUnderline">Map</h2>

    <div>
        <label>
            <span>Address</span>
            <input type="text" value="<?= $EG['address'] ?>" id="address" name="address">
        </label>
    </div>
    <h2 class="titleUnderline">Prices</h2>

    <div>
        <label>
            <span>Price for 2 to 3 persons</span>
            <input type="number" value="<?= $EG['price2_3Persons'] ?>" id="price2_3Persons" name="price2_3Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 4 persons</span>
            <input type="number" value="<?= $EG['price4Persons'] ?>" id="price4Persons" name="price4Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 5 persons</span>
            <input type="number" value="<?= $EG['price5Persons'] ?>" id="price5Persons" name="price5Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 6 persons</span>
            <input type="number" value="<?= $EG['price6Persons'] ?>" id="price6Persons" name="price6Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 7 persons</span>
            <input type="number" value="<?= $EG['price7Persons'] ?>" id="price7Persons" name="price7Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 8 persons</span>
            <input type="number" value="<?= $EG['price8Persons'] ?>" id="price8Persons" name="price8Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 9 persons</span>
            <input type="number" value="<?= $EG['price9Persons'] ?>" id="price9Persons" name="price9Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 10 persons</span>
            <input type="number" value="<?= $EG['price10Persons'] ?>" id="price10Persons" name="price10Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 11 persons</span>
            <input type="number" value="<?= $EG['price11Persons'] ?>" id="price11Persons" name="price11Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for 12 persons</span>
            <input type="number" value="<?= $EG['price12Persons'] ?>" id="price12Persons" name="price12Persons">
        </label>
    </div>
    <div>
        <label>
            <span>Price for more than 12 persons</span>
            <input type="number" value="<?= $EG['price12PlusPersons'] ?>" id="price12PlusPersons"
                   name="price12PlusPersons">
        </label>
    </div>

    <input class="yellowButton" type="submit" value="Update Escape Game" name="ok">
</form>

<!-- <?= var_dump($EG) ?> -->