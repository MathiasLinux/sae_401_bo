<h2 class="titleUnderline"><?= BUY_CARDS_TITLE ?></h2>

<?php
var_dump($amount);

if (isset($amount)) {
    ?>
    <div class="amount">
        <h3>Please enter your card information</h3>
        <form class="contactForm contactJobs" action="index.php?action=buyCardValid" method="post">
            <div class="formGroup">
                <label>
                    Card Number <input type="number" id="cardNumber" name="cardNumber">
                </label>
            </div>
            <div class="formGroup">
                <label>
                    Card Date <input type="text" id="cardDate" name="cardDate">
                </label>
            </div>
            <div class="formGroup">
                <label>
                    CVC <input type="number" id="cardCVC" name="cardCVC">
                </label>
            </div>
            <div class="formGroup">
                <label>
                    Name <input type="text" id="cardName" name="cardName">
                </label>
            </div>
            <input type="hidden" name="amount" value="<?= $amount ?>">
            <div class="formGroup formInput">
                <input type="submit" value="Pay">
            </div>
        </form>
    </div>
    <?php
}
?>
