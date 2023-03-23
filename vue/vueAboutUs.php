<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""/>
<h2 class="titleUnderline"><?= ABOUT_US_TITLE ?></h2>
<p>
    <?= ABOUT_US_P_1 ?>
</p>
<h2 class="titleUnderline"><?= ABOUT_US_H2_1 ?></h2>
<div class="persons">
    <div class="aPerson">
        <img src="img/team/eva.png" alt="Eva photo">
        <div class="leftPerson">
            <p>Eva</p>
            <p><?= ABOUT_US_PERSON_1_ROLE ?></p>
            <p><?= ABOUT_US_PERSON_1_POSITION ?></p>
        </div>
    </div>
    <div class="aPerson">
        <img src="img/team/eva.png" alt="Eva photo">
        <div class="leftPerson">
            <p>Eva</p>
            <p><?= ABOUT_US_PERSON_1_ROLE ?></p>
            <p><?= ABOUT_US_PERSON_1_POSITION ?></p>
        </div>
    </div>
</div>
<div class="aPerson">
    <img src="img/team/eva.png" alt="Eva photo">
    <div class="leftPerson">
        <p>Eva</p>
        <p><?= ABOUT_US_PERSON_1_ROLE ?></p>
        <p><?= ABOUT_US_PERSON_1_POSITION ?></p>
    </div>
</div>
</div>
</div>
<h2 class="titleUnderline"><?= ABOUT_US_H2_2 ?></h2>
<form class="contactForm" action="#" method="post">
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
<div class="contactInfos">
    <div>
        <img src="img/svg/tel.svg" alt="Phone Icon">
        <a href="tel:017666810096">0176 66810096</a>
    </div>
    <div>
        <img src="img/svg/email.svg" alt="Mail Icon">
        <a href="mailto:booking@we-escape.de">booking@we-escape.de</a>
    </div>
</div>
<h2 class="titleUnderline"><?= ABOUT_US_H2_3 ?></h2>
<p>Am Krebsbach 2G, 79241 Ihringen, Germany</p>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>
<script src="js/aboutUs.js" defer></script>
