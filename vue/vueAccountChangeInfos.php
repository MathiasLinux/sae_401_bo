<h2 class="titleUnderline"><?= CHANGE_ACCOUNT_INFOS_TITLE ?></h2>
<?php
/**********
 * Liste des erreurs
 * 1: Email déjà utilisé
 * 2: Email invalide
 * 3: Le prénom contient des caractères non autorisés
 * 4: Le nom contient des caractères non autorisés
 * 5: Les mots de passe ne sont pas identiques
 * 6: Le mot de passe actuel est incorrect
 */
?>
<form class="contactForm contactJobs changeInfosForm" action="index.php?action=accountUpdateInfos" method="post">
    <div class="form-group">
        <label for="email"><?= CHANGE_ACCOUNT_INFOS_EMAIL ?></label>
        <input type="email" class="form-control <?php
        if (in_array(1, $error) or in_array(2, $error))
            echo "errorForm";
        ?>" id="email" name="email" value="<?= $user["email"] ?>">
        <?php
        if (in_array(1, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_EMAIL_ALREADY_USED . "</p>";
        elseif (in_array(2, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_EMAIL_INVALID . "</p>";
        ?>
    </div>
    <div class="form-group">
        <label for="firstName"><?= CHANGE_ACCOUNT_INFOS_FIRST_NAME ?></label>
        <input type="text" class="form-control <?php
        if (in_array(3, $error))
            echo "errorForm";
        ?>" id="firstName" name="firstName" value="<?= $user["firstName"] ?>">
        <?php
        if (in_array(3, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_FIRST_NAME_INVALID . "</p>";
        ?>
    </div>
    <div class="form-group">
        <label for="lastName"><?= CHANGE_ACCOUNT_INFOS_LAST_NAME ?></label>
        <input type="text" class="form-control <?php
        if (in_array(4, $error))
            echo "errorForm";
        ?>" id="lastName" name="lastName" value="<?= $user["lastName"] ?>">
        <?php
        if (in_array(4, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_LAST_NAME_INVALID . "</p>";
        ?>
    </div>
    <div class="form-group">
        <label for="password"><?= CHANGE_ACCOUNT_INFOS_PASSWORD ?></label>
        <input type="password" class="form-control <?php
        if (in_array(6, $error))
            echo "errorForm";
        ?>" id="password" name="password">
        <?php
        if (in_array(6, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_ACTUAL_PASSWORD_INVALID . "</p>";
        ?>
    </div>
    <div class="form-group">
        <label for="password"><?= CHANGE_ACCOUNT_INFOS_NEW_PASSWORD ?></label>
        <input type="password" class="form-control" id="password" name="newPassword">
    </div>
    <div class="form-group">
        <label for="passwordConfirm"><?= CHANGE_ACCOUNT_INFOS_NEW_PASSWORD_CONFIRM ?></label>
        <input type="password" class="form-control <?php
        if (in_array(5, $error))
            echo "errorForm";
        ?>" id="passwordConfirm" name="newPasswordConfirm">
        <?php
        if (in_array(5, $error))
            echo "<p class='errorMessageBuy accountInfoError'>" . CHANGE_ACCOUNT_INFOS_NEW_PASSWORDS_NOT_IDENTICAL . "</p>";
        ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="<?= CHANGE_ACCOUNT_INFOS_SUBMIT ?>">
    </div>
</form>
