<h2 class="titleUnderline">Contact us</h2>
<form class="contactForm contactJobs" action="index.php?action=sendForm" method="post">
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