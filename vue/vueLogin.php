<h2 class="titleUnderline"><?= LOGIN_TITLE ?></h2>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == 1) {
        echo "<p class='errorSignUp'>" . LOGIN_ERROR_1 . "</p>";
    } elseif ($_GET["error"] == 2) {
        echo "<p class='errorSignUp'>" . LOGIN_ERROR_2 . "</p>";
    }
}
?>
<form class="contactForm signInForm" action="index.php?action=connexion" method="post">
    <div class="formGroup">
        <label>
            <?= LOGIN_EMAIL ?>
            <input type="email" id="email" name="email" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= LOGIN_PASSWORD ?>
            <input type="password" id="password" name="password" required>
        </label>
    </div>
    <div class="formGroup">
        <label class="labelCheckbox">
            <input type="checkbox" name="keepSignIn" id="keepSignIn">
            <div><?= LOGIN_REMEMBER_ME ?></div>
        </label>
    </div>
    <div class="formGroup formInput loginSubmit">
        <input type="submit" value="<?= LOGIN_SIGN_IN ?>">
    </div>
</form>
<div class="toSignUp">
    <div class="greenLigne"></div>
    <p><?= LOGIN_DONT_HAVE_ACCOUNT ?></p>
    <a class="yellowLinkSignUp" href="index.php?action=signUp"><?= LOGIN_SIGN_UP ?></a>
</div>