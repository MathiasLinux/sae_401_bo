<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""/>
<h2 class="titleUnderline">About us</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, fugit, maiores. Sapiente, unde, voluptatum!
    Architecto aspernatur, cum dolore, dolorum eveniet facilis ipsam maxime officia officiis quae sit, tempora.
    Necessitatibus, officiis?
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam aliquid autem commodi consectetur
    deleniti id illum, in inventore maiores minima natus neque nostrum obcaecati quaerat quibusdam quos reiciendis
    veniam.
</p>
<h2 class="titleUnderline">The Team</h2>
<div class="persons">
    <div class="aPerson">
        <img src="img/team/eva.png" alt="Eva photo">
        <div class="leftPerson">
            <p>Eva</p>
            <p>The annunciator</p>
            <p>Head of Marketing Sales Management</p>
        </div>
    </div>
    <div class="aPerson">
        <img src="img/team/eva.png" alt="Eva photo">
        <div class="leftPerson">
            <p>Eva</p>
            <p>The annunciator</p>
            <p>Head of Marketing Sales Management</p>
        </div>
    </div>
    <div class="aPerson">
        <img src="img/team/eva.png" alt="Eva photo">
        <div class="leftPerson">
            <p>Eva</p>
            <p>The annunciator</p>
            <p>Head of Marketing Sales Management</p>
        </div>
    </div>
</div>
<h2 class="titleUnderline">Contact</h2>
<form class="contactForm" action="#" method="post">
    <div class="formGroup">
        <label>
            First name
            <input type="text" id="firstName" name="firstName">
        </label>
    </div>
    <div class="formGroup">
        <label>
            Last name
            <input type="text" id="name" name="name">
        </label>
    </div>
    <div class="formGroup">
        <label>
            E-mail address
            <input type="email" id="email" name="email">
        </label>
    </div>
    <div class="formGroup">
        <label>
            Phone number
            <input type="tel" id="phone" name="phone">
        </label>
    </div>
    <div class="formGroup">
        <label>
            Your message
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </label>
    </div>
    <div class="formGroup formInput">
        <input type="submit" value="Send">
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
<h2 class="titleUnderline">Map</h2>
<p>Am Krebsbach 2G, 79241 Ihringen, Germany</p>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>
<script src="js/aboutUs.js" defer></script>
