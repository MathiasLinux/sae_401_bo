<?php
//Error 1 is when the passwords don't match
//Error 2 is when the email is not valid
//Error 3 is when a field is empty
//Error 4 is when the first name or last name is not valid
//Error 5 is when the email is already used
?>

<h2 class="titleUnderline"><?= SIGNUP_CREATE_ACCOUNT ?></h2>
<?php
if (isset($error) and !empty($error)) {
    if (in_array(1, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_1 . "</p>";
    }
    if (in_array(7, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_7 . "</p>";
    }
    if (in_array(2, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_2 . "</p>";
    }
    if (in_array(3, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_3 . "</p>";
    }
    if (in_array(4, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_4 . "</p>";
    }
    if (in_array(5, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_5 . "</p>";
    }
    if (in_array(6, $error)) {
        echo "<p class='errorSignUp'>" . SIGNUP_ERROR_6 . "</p>";
    }
}
?>
<form class="contactForm" action="index.php?action=createAccount" method="post">
    <div class="formGroup">
        <label>
            <?= SIGNUP_EMAIL ?>
            <input type="email" id="email" name="email" value="<?php
            if (isset($ok["email"])) {
                echo $ok["email"];
            }
            ?>" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= SIGNUP_FIRST_NAME ?>
            <input type="text" id="firstName" name="firstName" value="<?php
            if (isset($ok["firstName"])) {
                echo $ok["firstName"];
            }
            ?>" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= SIGNUP_LAST_NAME ?>
            <input type="text" id="lastName" name="lastName" value="<?php
            if (isset($ok["lastName"])) {
                echo $ok["lastName"];
            }
            ?>" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= SIGNUP_PASSWORD ?>
            <input type="password" id="password" name="password" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= SIGNUP_CONFIRM_PASSWORD ?>
            <input type="password" id="password1" name="password1" required>
        </label>
    </div>
    <div class="formGroup formInput">
        <input type="submit" value="<?= LOGIN_SIGN_UP ?>">
    </div>
</form>