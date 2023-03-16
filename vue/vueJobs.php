<?php
//var_dump($jobs);
?>
<h2 class="titleUnderline">Team Spirit and Dynamic Team</h2>
<div class="jobsFirstIcons jobsIcons">
    <div class="doubleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/moneyHand.svg" alt="Money in a hand">
            <p>Fair Salary</p>
        </div>
        <div class="jobsIcon">
            <img src="img/svg/work.svg" alt="Briefcase">
            <p>Flexible Working Hours</p>
        </div>
    </div>
    <div class="doubleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/audience.svg" alt="3 people">
            <p>Young Team</p>
        </div>
        <div class="jobsIcon">
            <img src="img/svg/presentation.svg" alt="Presentation with a group of people">
            <p>Continuing Education</p>
        </div>
    </div>
    <div class="singleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/employee.svg" alt="An employee">
            <p>Permanent Job</p>
        </div>
    </div>
</div>
<h2 class="titleUnderline">Your Skills</h2>
<div class="jobsFirstIcons jobsIcons">
    <div class="doubleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/userResponsability.svg" alt="User with responsabilties">
            <p>Responsible</p>
        </div>
        <div class="jobsIcon">
            <img src="img/svg/positive.svg" alt="A human head with a sun into it">
            <p>Intiative</p>
        </div>
    </div>
    <div class="doubleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/team.svg" alt="A team of persons">
            <p>Team Player</p>
        </div>
        <div class="jobsIcon">
            <img src="img/svg/exchange.svg" alt="Two persons making a exchange">
            <p>Adaptable</p>
        </div>
    </div>
</div>
<h2 class="titleUnderline">Job offers</h2>
<div class="jobsOffers">
    <?php
    foreach ($jobs as $job) {
        ?>
        <div class="aJobOffer">
            <div class="titleJobOffer">
                <h3><?= $job['title'] ?></h3>
                <p><?= $job['position'] ?></p>
            </div>
            <div class="taskJobOffer">
                <p>Your Task :</p>
                <ul>
                    <?php
                    //Detection the \r et on le remplace par un <li>
                    $jobTask = str_replace("\r", "<li>", $job['task']);
                    //On ajoute le <li> au début de la chaine
                    $jobTask = "<li>" . $jobTask;
                    echo $jobTask . "</li>";
                    ?>
                </ul>
            </div>
            <div class="strenghtJobOffer">
                <p>Your strenght :</p>
                <ul>
                    <?php
                    //Detection the \r et on le remplace par un <li>
                    $jobStrength = str_replace("\r", "<li>", $job['strength']);
                    //On ajoute le <li> au début de la chaine
                    $jobStrength = "<li>" . $jobStrength;
                    echo $jobStrength . "</li>";
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<h2 class="titleUnderline">Contact us</h2>
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
<form class="contactForm contactJobs" action="#" method="post">
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
</div>