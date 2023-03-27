<h2 class="titleUnderline"><?= ADMIN_GIFT_CARDS_TITLE ?></h2>
<div class="amount">
    <p><?= ADMIN_GIFT_CARDS_P_1 ?></p>
    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_PRICE ?></th>
                <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_DELETE ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($giftCardAmount as $amount) {
                ?>
                <tr>
                    <td class="tg-m5d1"><?= $amount['price'] ?> €</td>
                    <td class="tg-q4wl">
                        <div class="deleteUser"><?= ADMIN_CONTACT_FORM_DELETE ?></div>
                        <div class="validationDeleteUser">
                            <h3><?= ADMIN_GIFT_CARDS_DELETE_WARNING ?></h3>
                            <div class="delUserDivButton">
                                <a
                                        href="index.php?action=admin&page=delGiftCard&id=<?= $amount["id_giftCardAmount"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
                                <div class="noDeleteUser"><?= ADMIN_CONTACT_FROM_DELETE_NO ?></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="newAmount">
    <p><?= ADMIN_GIFT_CARDS_P_2 ?></p>
    <form action="index.php?action=admin&page=addGiftCardsAmount" method="post">
        <label>
            <p><?= ADMIN_GIFT_CARDS_AMOUNT ?></p>
            <input type="number" name="amount" id="amount">
        </label>
        <div class="submitDivNewAmount">
            <input type="submit" value="<?= ADMIN_GIFT_CARDS_SUBMIT ?>">
        </div>
    </form>
</div>
<div class="selledCard">
    <h2 class="titleUnderline"><?= ADMIN_GIFT_CARDS_H2_2 ?></h2>
    <?php
    //var_dump($moneyCards);
    //var_dump($escapeCards);
    ?>
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_CODE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USAGE_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_AMOUNT ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_FIRST_NAME ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_LAST_NAME ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_EMAIL ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($moneyCards as $card) {
            ?>
            <tr class="searchContent">
                <td class="tg-m5d1 pad"><?= $card['buyingDate'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['code'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['usageDate'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['price'] ?> €</td>
                <td class="tg-m5d1 pad"><?= $card['firstName'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['lastName'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['email'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <h2 class="titleUnderline"><?= ADMIN_GIFT_CARDS_H2_3 ?></h2>
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_CODE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USAGE_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_ESCAPEGAME ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_FIRST_NAME ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_LAST_NAME ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_USER_EMAIL ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($escapeCards as $card) {
            ?>
            <tr class="searchContent">
                <td class="tg-m5d1 pad"><?= $card['buyingDate'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['code'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['usageDate'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['name'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['firstName'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['lastName'] ?></td>
                <td class="tg-m5d1 pad"><?= $card['email'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script src="js/adminGiftCards.js"></script>
