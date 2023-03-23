<h2 class="titleUnderline"><?= GIFT_CARDS_TITLE ?></h2>
<div class="giftCardsIcons">
    <div class="ligneOneGiftCards">
        <div class="giftCardsIcon">
            <img src="img/svg/dollar.svg" alt="Logo dollar">
            <p><?= GIFT_CARDS_LOGO_1 ?></p>
        </div>
        <div class="giftCardsIcon">
            <img src="img/svg/key.svg" alt="Logo escape game">
            <p><?= GIFT_CARDS_LOGO_2 ?></p>
        </div>
    </div>
    <div class="ligneTwoGiftCards">
        <div class="giftCardsIcon">
            <img src="img/svg/audience.svg" alt="Logo persons">
            <p><?= GIFT_CARDS_LOGO_3 ?></p>
        </div>
    </div>
</div>
<h2 class="titleUnderline"><?= GIFT_CARDS_H2_1 ?></h2>
<p><?= GIFT_CARDS_P_1 ?></p>
<h2 class="titleUnderline"><?= GIFT_CARDS_H2_2 ?></h2>
<a href="#moneyCards" class="greenButton"><?= GIFT_CARDS_BUTTON_1 ?></a>
<div id="moneyCards">
    <form class="giftCardsForm" action="index.php?action=buyCard&type=money" method="post">
        <select class="selectGiftCards" name="moneyCardsAmount" id="moneyCardsAmount">
            <option><?= GIFT_CARDS_MONEY_SELECT ?></option>
            <?php
            foreach ($giftCardAmount as $amount) {
                ?>
                <option value="<?= $amount['price'] ?>"><?= $amount['price'] ?> €</option>
                <?php
            }
            ?>
            ?>
        </select>
        <input class="submitGiftCards" type="submit" value="Order Now">
    </form>
</div>
<a href="#escapeCards" class="greenButton"><?= GIFT_CARDS_BUTTON_2 ?></a>
<div id="escapeCards">
    <form class="giftCardsForm" action="index.php?action=buyCard&type=money" method="post">
        <select class="selectGiftCards" name="escapeCardsChoose" id="escapeCardsChoose">
            <option value=""><?= GIFT_CARDS_ESCAPE_SELECT ?></option>
            <?php
            foreach ($escapeGames as $escapeGame) {
                ?>
                <option value="<?= $escapeGame['id_escapeGame'] ?>"><?= $escapeGame['name'] ?></option>
                <?php
            }
            ?>
        </select>
        <label for="persons">Number of persons</label>
        <input type="number" name="persons" id="persons">
        <input class="submitGiftCards" type="submit" value="Order Now">
    </form>
</div>