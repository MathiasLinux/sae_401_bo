<h2 class="titleUnderline"><?= BUY_CARDS_TITLE ?></h2>
<?php
/*echo "<div style='border: solid 1px red'>";
echo "<br><br><strong>id Escape Game</strong><br><br>";
var_dump($idEscapeGame);
echo "<br><br><strong>Persons</strong><br><br>";
var_dump($persons);
echo "<br><br><strong>Error</strong><br><br>";
var_dump($error);
echo "</div>";*/


if (isset($nameEscapeGame) and isset($priceEscapeGame)) {
    ?>
    <div class="amount">
        <h3><?= BUY_CARDS_H3_1 ?></h3>
        <div>
            <?php
            if (!empty($nameEscapeGame) and !empty($priceEscapeGame)) {
                echo "<p> " . ESCAPE_CARDS_ESCAPE_NAME . $nameEscapeGame . ESCAPE_CARDS_ESCAPE_FOR . $priceEscapeGame . "€</p>";
            } else
                if ($_SESSION['lang'] == 'fr')
                    echo "<p class='errorMessageBuy'> Vous n'avez pas sélectionné d'escape game.</p>";
                else
                    echo "<p class='errorMessageBuy'> You have not selected an escape game.</p>";
            ?>
        </div>
        <form class="contactForm contactJobs" action="index.php?action=buyCardValidEscape" method="post">
            <div class="formGroup">
                <label>
                    <?= BUY_CARDS_CARD_NUMBER ?> <input type="number" id="cardNumber" name="cardNumber"
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
                    <?= BUY_CARDS_CARD_DATE ?> <input type="text" id="cardDate" name="cardDate" placeholder="04/24"<?php
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
                    <?= BUY_CARDS_CARD_CVC ?> <input type="number" id="cardCVC" name="cardCVC" placeholder="456"<?php
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
                    <?= BUY_CARDS_CARD_NAME ?> <input type="text" id="cardName" name="cardName"
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
            <input type="hidden" name="idEscapeGame" value="<?= $idEscapeGame ?>">
            <div class="formGroup formInput">
                <input type="submit" value="<?= BUY_CARDS_CARD_SUBMIT ?>">
            </div>
        </form>
    </div>
    <?php
}
?>
