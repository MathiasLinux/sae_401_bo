<?php
//Error 1 is when the passwords don't match
//Error 2 is when the email is not valid
//Error 3 is when a field is empty
//Error 4 is when the first name or last name is not valid
//Error 5 is when the email is already used
?>

<h2 class="titleUnderline">Create an account</h2>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == 1) {
        echo "<p class='errorSignUp'>The passwords don't match</p>";
    } elseif ($_GET["error"] == 2) {
        echo "<p class='errorSignUp'>The email is not valid</p>";
    } elseif ($_GET["error"] == 3) {
        echo "<p class='errorSignUp'>Please fill all the fields</p>";
    } elseif ($_GET["error"] == 4) {
        echo "<p class='errorSignUp'>The first name or last name is not valid</p>";
    } elseif ($_GET["error"] == 5) {
        echo "<p class='errorSignUp'>The email is already used</p>";
    }
}
?>
<form class="contactForm" action="index.php?action=createAccount" method="post">
    <div class="formGroup">
        <label>
            E-mail address
            <input type="email" id="email" name="email" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            First name
            <input type="text" id="firstName" name="firstName" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            Last name
            <input type="text" id="lastName" name="lastName" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            Password
            <input type="password" id="password" name="password" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            Re-enter password
            <input type="password" id="password1" name="password1" required>
        </label>
    </div>
    <div class="formGroup formInput">
        <input type="submit" value="Sign up">
    </div>
</form>