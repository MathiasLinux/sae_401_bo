<h2 class="titleUnderline"><?= BOOK_ESCAPEGAME_TITLE ?></h2>
<?php

//var_dump($buyEG);
// var_dump($dateEscapeGame);
// var_dump($nameEscapeGame);
// var_dump($priceEscapeGame);
// var_dump($hourEscapeGame);

if (isset($_POST["hour"]) or isset($_POST["hourEscapeGame"])) {
    //var_dump($_POST);
    $nbPersons = $_POST['nbPersons'];
    if (!empty($discount[0]["price"])) {
        $discount = $discount[0]["price"];
    }
    if (isset($priceEscapeGame) and isset($discount)) {
        //if price contains a dot use floatval else use intval
        if (str_contains($priceEscapeGame, '.'))
            $priceEscapeGame = floatval($priceEscapeGame) - floatval($discount);
        else {
            $priceEscapeGame = intval($priceEscapeGame) - intval($discount);
        }
        $priceEscapeGame = floatval($priceEscapeGame) - floatval($discount);
    } elseif (isset($_POST['amount']) and isset($discount)) {
        //if price contains a dot use floatval else use intval
        if (str_contains($_POST['amount'], '.'))
            $priceEscapeGame = floatval($_POST['amount']) - floatval($discount);
        else {
            //var_dump(intval($_POST['amount']));
            //var_dump($discount);
            //var_dump(intval($discount));
            $_POST['amount'] = intval($_POST['amount']) - intval($discount);
        }
    }
    ?>
    <div class="amount">
        <h3><?= BOOK_ESCAPEGAME_H3_1 ?></h3>
        <div>
            <?php
            if (!empty($nameEscapeGame) and !empty($priceEscapeGame) and !empty($dateEscapeGame) and !empty($hourEscapeGame) and !empty($nbPersons)) {
                echo "<p> " . BOOK_ESCAPEGAME_ESCAPE_NAME . $nameEscapeGame . BOOK_ESCAPEGAME_ESCAPE_DAY . $dateEscapeGame . BOOK_ESCAPEGAME_ESCAPE_HOUR . $hourEscapeGame . "h" . BOOK_ESCAPEGAME_ESCAPE_FOR . $nbPersons . BOOK_ESCAPEGAME_PERSONS . BOOK_ESCAPEGAME_ESCAPE_FOR . "<strong>" . $priceEscapeGame . "€</strong></p>";
            } elseif (!empty($_POST['nameEscapeGame']) and !empty($_POST['amount']) and !empty($_POST['dateEscapeGame']) and !empty($_POST['hourEscapeGame'])) {
                echo "<p> " . BOOK_ESCAPEGAME_ESCAPE_NAME . $_POST['nameEscapeGame'] . BOOK_ESCAPEGAME_ESCAPE_DAY . $_POST['dateEscapeGame'] . BOOK_ESCAPEGAME_ESCAPE_HOUR . $_POST['hourEscapeGame'] . "h" . BOOK_ESCAPEGAME_ESCAPE_FOR . $_POST["nbPersons"] . BOOK_ESCAPEGAME_ESCAPE_FOR . "<strong>" . $_POST['amount'] . "€</strong></p>";
            } else
                if ($_SESSION['lang'] == 'fr')
                    echo "<p class='errorMessageBuy'> Vous n'avez pas sélectionné d'escape game.</p>";
                else
                    echo "<p class='errorMessageBuy'> You have not selected an escape game.</p>";
            ?>
        </div>
        <form class="contactForm contactJobs giftCardEscapeBuyForm" action="index.php?action=verifyGiftCard"
              method="post">
            <div class="formGroup">
                <p><?= BOOK_ESCAPEGAME_GIFT_CARD_MSG ?></p>
                <label><?= BOOK_ESCAPEGAME_GIFTCARD_NUMBER ?>
                    <input type="number" name="giftCardNumber" id="giftCardNumber" placeholder="1234567890123"<?php
                    if (isset($error['giftCardNumber'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['giftCardNumber'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['giftCardNumber'])) {
                        echo "value='" . $okValue['giftCardNumber'] . "'";
                    }
                    ?>
                           required <?php
                    if (isset($discount)) {
                        echo "disabled";
                        echo " class='okForm'";
                    }
                    ?>>
                </label>
                <div>
                    <?php
                    if (isset($error['giftCardNumber'])) {
                        echo "<p class='errorMessageBuy'>" . $error['giftCardNumber'] . "</p>";
                    }
                    ?>
                </div>
            </div>
            <?php
            //var_dump($_POST);
            if (isset($_POST['nbPersons']))
                $nbPersonsIn = $_POST['nbPersons'];
            elseif (isset($nbPersons))
                $nbPersonsIn = $nbPersons;
            else
                $nbPersonsIn = "";
            if (isset($_POST['nameEscapeGame']))
                $nameEscapeGameIn = $_POST['nameEscapeGame'];
            elseif (isset($nameEscapeGame))
                $nameEscapeGameIn = $nameEscapeGame;
            else
                $nameEscapeGameIn = "";
            if (isset($_POST['dateEscapeGame']))
                $dateEscapeGameIn = $_POST['dateEscapeGame'];
            elseif (isset($dateEscapeGame))
                $dateEscapeGameIn = $dateEscapeGame;
            else
                $dateEscapeGameIn = "";
            if (isset($_POST['hourEscapeGame']))
                $hourEscapeGameIn = $_POST['hourEscapeGame'];
            elseif (isset($hourEscapeGame))
                $hourEscapeGameIn = $hourEscapeGame;
            else
                $hourEscapeGameIn = "";
            if (isset($_POST['amount']))
                $priceEscapeGameIn = $_POST['amount'];
            elseif (isset($priceEscapeGame))
                $priceEscapeGameIn = $priceEscapeGame;
            else
                $priceEscapeGameIn = "";
            if (isset($_POST['idEscapeGame']))
                $idEscapeGameIn = $_POST['idEscapeGame'];
            elseif ($_GET['escapeGame'])
                $idEscapeGameIn = $_GET['escapeGame'];
            else
                $idEscapeGameIn = "";
            ?>
            <input type="hidden" name="nameEscapeGame" value="<?= $nameEscapeGameIn ?>">
            <input type="hidden" name="dateEscapeGame" value="<?= $dateEscapeGameIn ?>">
            <input type="hidden" name="hourEscapeGame" value="<?= $hourEscapeGameIn ?>">
            <input type="hidden" name="amount" value="<?= $priceEscapeGameIn ?>">
            <input type="hidden" name="nbPersons" value="<?= $nbPersonsIn ?>">
            <input type="hidden" name="idEscapeGame" value="<?= $idEscapeGameIn ?>">
            <div class="formGroup submitDivEscapeGameCardUse">
                <input type="submit" <?php
                if (isset($discount)) {
                    if ($_SESSION['lang'] == 'fr')
                        echo "value='Carte cadeau appliquée'";
                    else {
                        echo "value='Gift card applied'";
                    }
                    echo "disabled";
                    echo " class='okForm'";
                } else {
                    echo "value=" . BOOK_ESCAPEGAME_GIFTCARD_SUBMIT;
                }
                ?>>
            </div>
        </form>
        <form class="contactForm contactJobs" action="index.php?action=buyEGValid" method="post">
            <div class="formGroup">
                <label><?= BOOK_ESCAPEGAME_BUYER_FIRST_NAME ?>
                    <input type="text" name="buyerFirstName" id="buyerFirstName" placeholder="John"<?php
                    if (isset($error['buyerFirstName'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['buyerFirstName'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['buyerFirstName'])) {
                        echo "value='" . $okValue['buyerFirstName'] . "'";
                    }
                    ?>>
                </label>
            </div>
            <div class="formGroup">
                <label><?= BOOK_ESCAPEGAME_BUYER_LAST_NAME ?>
                    <input type="text" name="buyerLastName" id="buyerLastName" placeholder="Doe"<?php
                    if (isset($error['buyerLastName'])) {
                        echo "class='errorForm'";
                    } elseif (isset($okValue['buyerLastName'])) {
                        echo "class='okForm'";
                    }
                    if (isset($okValue['buyerLastName'])) {
                        echo "value='" . $okValue['buyerLastName'] . "'";
                    }
                    ?>>
                </label>
            </div>
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
                    <?= BOOK_ESCAPEGAME_CARD_DATE ?> <input type="text" id="cardDate" name="cardDate"
                                                            placeholder="04/24"<?php
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
                    <?= BOOK_ESCAPEGAME_CARD_CVC ?> <input type="number" id="cardCVC" name="cardCVC"
                                                           placeholder="456"<?php
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
            <?php
            if (!empty($nameEscapeGame) and !empty($priceEscapeGame) and !empty($dateEscapeGame) and !empty($hourEscapeGame)) {
                ?>
                <input type="hidden" name="amount" value="<?= $priceEscapeGame ?>">
                <input type="hidden" name="idEscapeGame" value="<?= $_GET["escapeGame"] ?>">
                <input type="hidden" name="dateEscapeGame" value="<?= $dateEscapeGame ?>">
                <input type="hidden" name="hourEscapeGame" value="<?= $hourEscapeGame ?>">
                <input type="hidden" name="nameEscapeGame" value="<?= $nameEscapeGame ?>">
                <input type="hidden" name="nbPersons" value="<?= $nbPersons ?>">
                <?php
            } elseif (!empty($_POST['nameEscapeGame']) and !empty($_POST['amount']) and !empty($_POST['dateEscapeGame']) and !empty($_POST['hourEscapeGame'])) {
                ?>
                <input type="hidden" name="amount" value="<?= $_POST['amount'] ?>">
                <input type="hidden" name="idEscapeGame" value="<?= $_POST['idEscapeGame'] ?>">
                <input type="hidden" name="dateEscapeGame" value="<?= $_POST['dateEscapeGame'] ?>">
                <input type="hidden" name="hourEscapeGame" value="<?= $_POST['hourEscapeGame'] ?>">
                <input type="hidden" name="nameEscapeGame" value="<?= $_POST['nameEscapeGame'] ?>">
                <input type="hidden" name="nbPersons" value="<?= $_POST['nbPersons'] ?>">
                <?php
            }
            ?>
            <div class="formGroup formInput">
                <input type="submit" value="<?= BOOK_ESCAPEGAME_CARD_SUBMIT ?>">
            </div>
        </form>
    </div>
    <?php
} else {
    header('Location: index.php?action=escapeGames');
}
?>
