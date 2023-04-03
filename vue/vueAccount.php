<h2 class="titleUnderline"><?= ACCOUNT_TITLE ?></h2>
<?php
echo "<h3 class='welcomeBack'>" . ACCOUNT_WELCOME . " " . $user["firstName"] . " " . $user["lastName"] . "</h3>";
?>
<p><?= ACCOUNT_EMAIL . $user["email"] ?></p>
<p><?= ACCOUNT_FIRST_NAME . $user["firstName"] ?></p>
<p><?= ACCOUNT_LAST_NAME . $user["lastName"] ?></p>
<div class="divYellowButtonAccount">
    <a class="escapeYellowButton yellowButtonAccount"
       href="index.php?action=accountChangeInfos"><?= ACCOUNT_CHANGE_INFOS ?></a>
</div>
<h2><?= ACCOUNT_PURCHASES ?></h2>
<h3><?= ACCOUNT_GIFT_CARDS_MONEY ?></h3>
<div class="tg-wrap accountTables">
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_CODE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_AMOUNT ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($moneyCards) and !empty($moneyCards)) {
            foreach ($moneyCards as $card) {
                ?>
                <tr class="searchContent">
                    <td class="tg-m5d1 pad"><?= $card['buyingDate'] ?></td>
                    <td class="tg-m5d1 pad"><?= $card['code'] ?></td>
                    <td class="tg-m5d1 pad"><?= $card['price'] ?> €</td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="searchContent">
                <td class="tg-m5d1 pad" colspan="3"><?= ACCOUNT_NO_PURCHASES ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<h3><?= ACCOUNT_GIFT_CARDS_ESCAPE_GAME ?></h3>
<div class="tg-wrap accountTables">
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_DATE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_CODE ?></th>
            <th class="tg-a43n"><?= ADMIN_GIFT_CARDS_SOLD_ESCAPEGAME ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($escapeCards) and !empty($escapeCards)) {
            // var_dump($escapeCards);
            foreach ($escapeCards as $card) {
                ?>
                <tr class="searchContent">
                    <td class="tg-m5d1 pad"><?= $card['buyingDate'] ?></td>
                    <td class="tg-m5d1 pad"><?= $card['code'] ?></td>
                    <?php
                    if ($_SESSION["lang"] == "en") {
                        ?>
                        <td class="tg-m5d1 pad"><?= $card['name'] ?></td>
                        <?php
                    } elseif ($_SESSION["lang"] == "fr") {
                        ?>
                        <td class="tg-m5d1 pad"><?= $card['nameFR'] ?></td>
                        <?php
                    } else {
                        ?>
                        <td class="tg-m5d1 pad"><?= $card['name'] ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="searchContent">
                <td class="tg-m5d1 pad" colspan="3"><?= ACCOUNT_NO_PURCHASES ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<h3><?= ACCOUNT_ESCAPE_GAME ?></h3>
<div class="tg-wrap accountTables">
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-a43n"><?= ACCOUNT_ESCAPE_GAME_NAME ?></th>
            <th class="tg-a43n"><?= ACCOUNT_ESCAPE_GAME_DATE ?></th>
            <th class="tg-a43n"><?= ACCOUNT_ESCAPE_GAME_NB_PLAYERS ?></th>
            <th class="tg-a43n"><?= ACCOUNT_ESCAPE_GAME_BUYERS_FIRST_NAME ?></th>
            <th class="tg-a43n"><?= ACCOUNT_ESCAPE_GAME_BUYERS_LAST_NAME ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($reservation) and !empty($reservation)) {
            foreach ($reservation as $res) {
                ?>
                <tr class="searchContent">
                    <?php
                    if ($_SESSION["lang"] == "en") {
                        ?>
                        <td class="tg-m5d1 pad"><?= $res['name'] ?></td>
                        <?php
                    } elseif ($_SESSION["lang"] == "fr") {
                        ?>
                        <td class="tg-m5d1 pad"><?= $res['nameFR'] ?></td>
                        <?php
                    } else {
                        ?>
                        <td class="tg-m5d1 pad"><?= $res['name'] ?></td>
                        <?php
                    }
                    ?>
                    <td class="tg-m5d1 pad"><?= $res['gameDateDisplay'] ?></td>
                    <td class="tg-m5d1 pad"><?= $res['nbPlayers'] ?></td>
                    <td class="tg-m5d1 pad"><?= $res['buyersFirstName'] ?></td>
                    <td class="tg-m5d1 pad"><?= $res['buyersLastName'] ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="searchContent">
                <td class="tg-m5d1 pad" colspan="5"><?= ACCOUNT_NO_PURCHASES ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<?php
//var_dump($reservation);