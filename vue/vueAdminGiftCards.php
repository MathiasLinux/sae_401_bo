<h2 class="titleUnderline">Gift Cards</h2>
<div class="amount">
    <p>Available amounts</p>
    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-a43n">Price</th>
                <th class="tg-a43n">Delete ?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($giftCardAmount as $amount) {
                ?>
                <tr>
                    <td class="tg-m5d1"><?= $amount['price'] ?> €</td>
                    <td class="tg-q4wl"><a
                                href="index.php?action=admin&page=delGiftCard&id=<?= $amount["id_giftCardAmount"] ?>">Delete</a>
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
    <p>Create a new amount</p>
    <form action="#">
        <label>
            <p>Amount in €</p>
            <input type="number" name="amount" id="amount">
        </label>
        <div class="submitDivNewAmount">
            <input type="submit" value="Create">
        </div>
    </form>
</div>
