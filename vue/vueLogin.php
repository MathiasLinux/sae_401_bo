<h2 class="titleUnderline">Welcome</h2>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == 1) {
        echo "<p class='errorSignUp'>The email or the password is incorrect</p>";
    } elseif ($_GET["error"] == 2) {
        echo "<p class='errorSignUp'>Please fill all the fields</p>";
    }
}
?>
<form class="contactForm" action="index.php?action=connexion" method="post">
    <div class="formGroup">
        <label>
            E-mail address
            <input type="email" id="email" name="email" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            Password
            <input type="password" id="password" name="password" required>
        </label>
    </div>
    <div class="formGroup">
        <label class="labelCheckbox">
            <input type="checkbox" name="keepSignIn" id="keepSignIn">
            <div>Keep me signed in</div>
        </label>
    </div>
    <div class="formGroup formInput loginSubmit">
        <input type="submit" value="Sign in">
    </div>
</form>
<div class="toSignUp">
    <div class="greenLigne"></div>
    <p>Don't have an account ?</p>
    <a class="yellowLinkSignUp" href="index.php?action=signUp">Sign up</a>
</div>