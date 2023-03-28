<h2 class="titleUnderline"><?= PARTNERS_TITLE ?></h2>
<div class="partners">
    <div class="partnersLigne">
        <img src="img/partners/Partners_01.png" alt="Aldi">
        <img src="img/partners/Partners_02.png" alt="Haufe">
        <img src="img/partners/Partners_03.png" alt="Miele">
    </div>
    <div class="partnersLigne">
        <img src="img/partners/Partners_04.png" alt="DM">
        <img src="img/partners/Partners_05.png" alt="Caritas">
        <img src="img/partners/Partners_06.png" alt="Daimler">
    </div>
    <div class="partnersLigne">
        <img src="img/partners/Partners_07.png" alt="Endress+Hauser">
        <img src="img/partners/Partners_08.png" alt="Edeka">
        <img src="img/partners/Partners_09.png" alt="SAP">
    </div>
    <div class="partnersLigne">
        <img src="img/partners/Partners_10.png" alt="ZAPF">
        <img src="img/partners/Partners_11.png" alt="Kreativi Team">
        <img src="img/partners/Partners_12.png" alt="Werbetechnik + design Lützner">
    </div>
    <div class="partnersLigne">
        <img src="img/partners/Partners_13.png" alt="Zimmerei Gumpert">
        <img src="img/partners/Partners_14.png" alt="Calligraphy Art">
        <img src="img/partners/Partners_15.png" alt="Staatsweingut Freiburg">
    </div>
    <div class="partnersLigne">
        <img src="img/partners/Partners_16.png" alt="Ihringen">
        <img src="img/partners/Partners_17.png" alt="Baumschubser">
        <img src="img/partners/Partners_18.png" alt="Kaiser">
    </div>
</div>
<p class="textPartners ">
    <?= PARTNERS_P_1 ?>
</p>
<form class="contactForm contactJobs" action="#" method="post">
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_FIRST_NAME ?>
            <input type="text" id="firstName" name="firstName">
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_LAST_NAME ?>
            <input type="text" id="name" name="name">
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_EMAIL ?>
            <input type="email" id="email" name="email">
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_PHONE ?>
            <input type="tel" id="phone" name="phone">
        </label>
    </div>
    <div class="formGroup">
        <label>
            <?= CONTACT_FORM_MESSAGE ?>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </label>
    </div>
    <div class="formGroup formInput">
        <input type="submit" value="<?= CONTACT_FORM_SUBMIT ?>">
    </div>
</form>