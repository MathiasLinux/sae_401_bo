<h2 class="titleUnderline"><?= CONTACT_FROM_TITLE ?></h2>
<form class="contactForm contactJobs" action="index.php?action=sendForm" method="post">
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_FIRST_NAME ?>
            <input type="text" id="firstName" name="firstName" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_LAST_NAME ?>
            <input type="text" id="name" name="name" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_EMAIL ?>
            <input type="email" id="email" name="email" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_PHONE ?>
            <input type="tel" id="phone" name="phone" required>
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_MESSAGE ?>
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        </label>
    </div>
    <div class="formGroup formInput">
        <input type="submit" value="<?= CONTACT_FORM_SUBMIT ?>">
    </div>
</form>