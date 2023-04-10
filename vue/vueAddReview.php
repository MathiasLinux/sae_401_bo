<?php
/*var_dump($error);
var_dump($okValues);*/
?>
<h2 class="titleUnderline"><?= ADD_REVIEW_TITLE ?></h2>
<p class="escapeGameNameReview"><?= ADD_REVIEW_ESCAPE_GAME_NAME ?>
    <?php
    //choose the name with the right language
    if (isset($_SESSION["lang"]) && $_SESSION["lang"] == "fr") {
        echo $escapeGame["nameFR"];
    } elseif (isset($_SESSION["lang"]) && $_SESSION["lang"] == "en") {
        echo $escapeGame["name"];
    } else {
        echo $escapeGame["name"];
    }
    ?>
</p>
<form class="contactForm contactJobs" action="index.php?action=addReviewInSys" method="post">
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_FIRST_NAME ?>
            <input type="text" id="firstName" name="firstName" <?php
            if (!empty($error["firstName"])) {
                echo "class='errorForm'";
            }
            if (!empty($okValues["firstName"])) {
                echo "value='" . $okValues["firstName"] . "'";
            }
            ?>>
            <?php
            if (!empty($error["firstName"])) {
                echo "<p class='errorMessageBuy'>" . $error["firstName"] . "</p>";
            }
            ?>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_LAST_NAME ?>
            <input type="text" id="name" name="name" <?php
            if (!empty($error["name"])) {
                echo "class='errorForm'";
            }
            if (!empty($okValues["name"])) {
                echo "value='" . $okValues["name"] . "'";
            }
            ?>>
            <?php
            if (!empty($error["name"])) {
                echo "<p class='errorMessageBuy'>" . $error["name"] . "</p>";
            }
            ?>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= ADD_REVIEW_REVIEW ?>
            <textarea name="review" id="review" cols="30" rows="10" <?php
            if (!empty($error["review"])) {
                echo "class='errorForm'";
            }
            ?>><?php
                if (isset($okValues)) {
                    if (!empty($okValues["review"])) {
                        echo $okValues["review"];
                    }
                }
                ?></textarea>
            <?php
            if (!empty($error["review"])) {
                echo "<p class='errorMessageBuy'>" . $error["review"] . "</p>";
            }
            ?>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= ADD_REVIEW_REVIEW_FR ?>
            <textarea name="reviewFR" id="reviewFR" cols="30" rows="10" <?php
            if (!empty($error["reviewFR"])) {
                echo "class='errorForm'";
            }
            ?>><?php
                if (isset($okValues)) {
                    if (!empty($okValues["reviewFR"])) {
                        echo $okValues["reviewFR"];
                    }
                }
                ?></textarea>
            <?php
            if (!empty($error["reviewFR"])) {
                echo "<p class='errorMessageBuy'>" . $error["reviewFR"] . "</p>";
            }
            ?>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <div class="addReviewRatingDiv">
                <?= ADD_REVIEW_RATING ?>
                <div class="outputRatingDiv">
                    <!-- display the value of the range -->
                    <output for="rating" id="ratingValue">0</output>
                    <!-- in javascript, we will update the value of the output -->
                    <div>/5</div>
                </div>
            </div>
            <input type="range" id="rating" name="rating" min="0" max="5" step="0.5"<?php
            if (!empty($okValues["rating"])) {
                echo "value='" . $okValues["rating"] . "'";
            }
            ?>>
            <?php
            if (!empty($error["rating"])) {
                echo "<p class='errorMessageBuy'>" . $error["rating"] . "</p>";
            }
            ?>
        </label>
        <?php
        //var_dump($escapeGame);
        ?>
        <input type="hidden" name="id" value="<?= $escapeGame["id_escapeGame"] ?>">
        <div class="formGroup formInput">
            <input type="submit" value="<?= CONTACT_FORM_SUBMIT ?>">
        </div>
</form>
<script src="js/addReview.js"></script>
