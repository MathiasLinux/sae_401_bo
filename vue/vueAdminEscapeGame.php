<a href="index.php?action=admin&page=escapeGames">
    <button class="returnAdmin">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7"/>
        </svg> <?= ADMIN_QANDA_RETURN ?> </button>
</a>

<?php
if (isset($EG)) {
    ?>

    <form class="formAdminEG" action="index.php?action=admin&page=modifyEscapeGame&id=<?= $EG["id_escapeGame"] ?>"
          method="post" enctype="multipart/form-data">
        <div>
            <label>
                <span><?= ADMIN_EG_NAME ?></span>
                <input type="text" value="<?= $EG['name'] ?>" id="name" name="name">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_NAME_FR ?></span>
                <input type="text" value="<?= $EG['nameFR'] ?>" id="nameFR" name="nameFR">
            </label>
        </div>

        <div class="visibilityEGBig">
            <div class="visibilityEG">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                     stroke="#fff"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <div><?= ADMIN_EG_DISPLAY ?></div>
                <?php
                if ($EG['visible'] == 1) {
                    ?>
                    <input type="range" min="0" max="1" id="visible" name="visible" value="1">
                    <?php
                } else {
                    ?>
                    <input type="range" min="0" max="1" id="visible" name="visible" value="0">
                    <?php
                }
                ?>
            </div>
            <div class="visibilityEG">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                     stroke="#fff"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <div><?= ADMIN_EG_FRONT ?></div>
                <?php
                if ($EG['onFront'] == 1) {
                    ?>
                    <input type="range" min="0" max="1" id="onFront" name="onFront" value="1">
                    <?php
                } else {
                    ?>
                    <input type="range" min="0" max="1" id="onFront" name="onFront" value="0">
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Gestion des images à faire -->

        <div class="imgAdminEG">
            <?php
            //verify if the folder exist
            if (file_exists("img/escapeGame/" . $EG['id_escapeGame'] . "/")) {
                $imgs = scandir("img/escapeGame/" . $EG['id_escapeGame'] . "/");
                array_shift($imgs);
                array_shift($imgs);
                foreach ($imgs as $img)
                    echo "<img src='img/escapeGame/" . $EG['id_escapeGame'] . "/$img' alt='$img image'>";
            }
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


        <h2 class="titleUnderline"><?= ADMIN_EG_DIFFICULTY_DURATION ?></h2>

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
        //echo $difficultiesENArr[0];
        ?>
        <div class="difficultyAdmin">
            <label>
                <span><?= ADMIN_EG_DIFFICULTY ?></span>
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
                <span><?= ADMIN_EG_DIFFICULTY_FR ?></span>
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
                <span><?= ADMIN_EG_DURATION ?></span>
                <input type="number" value="<?= $EG['duration'] ?>" id="duration" name="duration" min="1">
            </label>
        </div>

        <h2 class="titleUnderline"><?= ADMIN_EG_PRESENTATION ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_DESCRIPTION ?></span>
                <textarea id="description" name="description"><?= $EG['description'] ?></textarea>
            </label>
        </div>

        <div>
            <label>
                <span><?= ADMIN_EG_DESCRIPTION_FR ?></span>
                <textarea id="descriptionFR" name="descriptionFR"><?= $EG['descriptionFR'] ?></textarea>
            </label>
        </div>

        <h2 class="titleUnderline"><?= ADMIN_EG_MAP ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_ADDRESS ?></span>
                <input type="text" value="<?= $EG['address'] ?>" id="address" name="address">
            </label>
        </div>
        <h2 class="titleUnderline"><?= ADMIN_EG_PRICES ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_2_3 ?></span>
                <input type="number" value="<?= $EG['price2_3Persons'] ?>" id="price2_3Persons" name="price2_3Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_4 ?></span>
                <input type="number" value="<?= $EG['price4Persons'] ?>" id="price4Persons" name="price4Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_5 ?></span>
                <input type="number" value="<?= $EG['price5Persons'] ?>" id="price5Persons" name="price5Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_6 ?></span>
                <input type="number" value="<?= $EG['price6Persons'] ?>" id="price6Persons" name="price6Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_7 ?></span>
                <input type="number" value="<?= $EG['price7Persons'] ?>" id="price7Persons" name="price7Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_8 ?></span>
                <input type="number" value="<?= $EG['price8Persons'] ?>" id="price8Persons" name="price8Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_9 ?></span>
                <input type="number" value="<?= $EG['price9Persons'] ?>" id="price9Persons" name="price9Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_10 ?></span>
                <input type="number" value="<?= $EG['price10Persons'] ?>" id="price10Persons" name="price10Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_11 ?></span>
                <input type="number" value="<?= $EG['price11Persons'] ?>" id="price11Persons" name="price11Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_12 ?></span>
                <input type="number" value="<?= $EG['price12Persons'] ?>" id="price12Persons" name="price12Persons"
                       min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_12_PLUS ?></span>
                <input type="number" value="<?= $EG['price12PlusPersons'] ?>" id="price12PlusPersons"
                       name="price12PlusPersons" min="1">
            </label>
        </div>

        <input class="yellowButton" type="submit" value="<?= ADMIN_EG_UPDATE_BUTTON ?>" name="ok">
    </form>
    <div class="redButton">
        <?= ADMIN_JOB_DISPLAY_DELETE ?>
    </div>
    <div class="validationDeleteUser">
        <h3><?= ADMIN_EG_DISPLAY_DELETE_WARNING ?></h3>
        <div class="delUserDivButton">
            <a href="index.php?action=admin&page=delEscapeGame&id=<?= $EG["id_escapeGame"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
            <div class="noDeleteUser"><?= ADMIN_CONTACT_FROM_DELETE_NO ?></div>
        </div>
    </div>
    <script defer src="js/adminEscapeGame.js"></script>
    <?php
} else {
    ?>
    <form class="formAdminEG" action="index.php?action=admin&page=addEscapeGame" method="post"
          enctype="multipart/form-data">
        <div>
            <label>
                <span><?= ADMIN_EG_NAME ?></span>
                <input type="text" id="name" name="name">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_NAME_FR ?></span>
                <input type="text" id="nameFR" name="nameFR">
            </label>
        </div>

        <div class="visibilityEGBig">
            <div class="visibilityEG">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                     stroke="#fff"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <div><?= ADMIN_EG_DISPLAY ?></div>
                <input type="range" min="0" max="1" id="visible" name="visible">
            </div>
            <div class="visibilityEG">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                     stroke="#fff"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <div><?= ADMIN_EG_FRONT ?></div>
                <input type="range" min="0" max="1" id="onFront" name="onFront" value="0">
            </div>
        </div>

        <!-- Gestion des images à faire -->
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


        <h2 class="titleUnderline"><?= ADMIN_EG_DIFFICULTY_DURATION ?></h2>

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
        //echo $difficultiesENArr[0];
        ?>
        <div class="difficultyAdmin">
            <label>
                <span><?= ADMIN_EG_DIFFICULTY ?></span>
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
                <span><?= ADMIN_EG_DIFFICULTY_FR ?></span>
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
                <span><?= ADMIN_EG_DURATION ?></span>
                <input type="number" id="duration" name="duration" min="1">
            </label>
        </div>

        <h2 class="titleUnderline"><?= ADMIN_EG_PRESENTATION ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_DESCRIPTION ?></span>
                <textarea id="description" name="description"></textarea>
            </label>
        </div>

        <div>
            <label>
                <span><?= ADMIN_EG_DESCRIPTION_FR ?></span>
                <textarea id="descriptionFR" name="descriptionFR"></textarea>
            </label>
        </div>

        <h2 class="titleUnderline"><?= ADMIN_EG_MAP ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_ADDRESS ?></span>
                <input type="text" id="address" name="address">
            </label>
        </div>
        <h2 class="titleUnderline"><?= ADMIN_EG_PRICES ?></h2>

        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_2_3 ?></span>
                <input type="number" id="price2_3Persons" name="price2_3Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_4 ?></span>
                <input type="number" id="price4Persons" name="price4Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_5 ?></span>
                <input type="number" id="price5Persons" name="price5Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_6 ?></span>
                <input type="number" id="price6Persons" name="price6Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_7 ?></span>
                <input type="number" id="price7Persons" name="price7Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_8 ?></span>
                <input type="number" id="price8Persons" name="price8Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_9 ?></span>
                <input type="number" id="price9Persons" name="price9Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_10 ?></span>
                <input type="number" id="price10Persons" name="price10Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_11 ?></span>
                <input type="number" id="price11Persons" name="price11Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_12 ?></span>
                <input type="number" id="price12Persons" name="price12Persons" min="1">
            </label>
        </div>
        <div>
            <label>
                <span><?= ADMIN_EG_PRICE_12_PLUS ?></span>
                <input type="number" id="price12PlusPersons"
                       name="price12PlusPersons" min="1">
            </label>
        </div>

        <input class="yellowButton" type="submit" value="<?= ADMIN_EG_CREATE_BUTTON ?>" name="ok">
    </form>
    <?php
}
?>