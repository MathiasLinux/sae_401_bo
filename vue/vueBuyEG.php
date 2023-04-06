
<h2 class="titleUnderline"><?= BOOK_ESCAPEGAME_TITLE ?></h2>
<?php

var_dump($buyEG);
// var_dump($dateEscapeGame);
// var_dump($nameEscapeGame);
// var_dump($priceEscapeGame);
// var_dump($hourEscapeGame);

if (isset($buyEG)) {
    ?>
    <div class="amount">
        <h3><?= BOOK_ESCAPEGAME_H3_1 ?></h3>
        <div>
            <?php
            if (!empty($nameEscapeGame) and !empty($priceEscapeGame)) {
                echo "<p> " . BOOK_ESCAPEGAME_ESCAPE_NAME . $nameEscapeGame . BOOK_ESCAPEGAME_ESCAPE_DAY . $dateEscapeGame . BOOK_ESCAPEGAME_ESCAPE_HOUR . $hourEscapeGame . "h" . BOOK_ESCAPEGAME_ESCAPE_FOR . $priceEscapeGame . "€</p>";
            } else
                if ($_SESSION['lang'] == 'fr')
                    echo "<p class='errorMessageBuy'> Vous n'avez pas sélectionné d'escape game.</p>";
                else
                    echo "<p class='errorMessageBuy'> You have not selected an escape game.</p>";
            ?>
        </div>
        <form class="contactForm contactJobs" action="index.php?action=buyEGValid" method="post">
            <div class="formGroup">
                <label>
                    <?= BOOK_ESCAPEGAME_CARD_NUMBER ?> <input type="number" id="cardNumber" name="cardNumber"
                                                        placeholder="4123456789012345" <?php
                    if (isset($error['cardNumber'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['cardNumber'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['cardNumber'])) {
                        echo "value='" . $okValue['cardNumber'] . "'";
                    }
                    ?>>
                </label>
                <div>
                    <?php
                    if (isset($error['cardNumber'])) {
                        echo "<p class='errorMessageBuy'>" . $error['cardNumber'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="formGroup">
                <label>
                    <?= BOOK_ESCAPEGAME_CARD_DATE ?> <input type="text" id="cardDate" name="cardDate" placeholder="04/24"<?php
                    if (isset($error['cardDate'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['cardDate'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['cardDate'])) {
                        echo "value='" . $okValue['cardDate'] . "'";
                    }
                    ?>>
                </label>
                <div>
                    <?php
                    if (isset($error['cardDate'])) {
                        echo "<p class='errorMessageBuy'>" . $error['cardDate'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="formGroup">
                <label>
                    <?= BOOK_ESCAPEGAME_CARD_CVC ?> <input type="number" id="cardCVC" name="cardCVC" placeholder="456"<?php
                    if (isset($error['cardCVC'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['cardCVC'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['cardCVC'])) {
                        echo "value='" . $okValue['cardCVC'] . "'";
                    }
                    ?>>
                </label>
                <div>
                    <?php
                    if (isset($error['cardCVC'])) {
                        echo "<p class='errorMessageBuy'>" . $error['cardCVC'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="formGroup">
                <label>
                    <?= BOOK_ESCAPEGAME_CARD_NAME ?> <input type="text" id="cardName" name="cardName"
                                                      placeholder="John Doe"<?php
                    if (isset($error['cardName'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['cardName'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['cardName'])) {
                        echo "value='" . $okValue['cardName'] . "'";
                    }
                    ?>>
                </label>
                <div>
                    <?php
                    if (isset($error['cardName'])) {
                        echo "<p class='errorMessageBuy'>" . $error['cardName'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="amount" value="<?= $priceEscapeGame ?>">
            <input type="hidden" name="idEscapeGame" value="<?= $_GET["escapeGame"] ?>">
            <div class="formGroup formInput">
                <input type="submit" value="<?= BOOK_ESCAPEGAME_CARD_SUBMIT ?>">
            </div>
        </form>
    </div>
    <?php
}
?>
