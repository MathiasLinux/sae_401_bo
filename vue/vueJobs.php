<?php
//var_dump($jobs);
?>
<h2 class="titleUnderline"><?= JOBS_TITLE ?></h2>
<div class="jobsFirstIcons jobsIcons">
    <div class="jobsIcon">
        <img src="img/svg/moneyHand.svg" alt="Money in a hand">
        <p><?= JOBS_LOGO_1_1 ?></p>
    </div>
    <div class="jobsIcon">
        <img src="img/svg/work.svg" alt="Briefcase">
        <p><?= JOBS_LOGO_1_2 ?></p>
    </div>


    <div class="jobsIcon">
        <img src="img/svg/audience.svg" alt="3 people">
        <p><?= JOBS_LOGO_1_3 ?></p>
    </div>
    <div class="jobsIcon">
        <img src="img/svg/presentation.svg" alt="Presentation with a group of people">
        <p><?= JOBS_LOGO_1_4 ?></p>
    </div>
    <div class="singleLigneJobs">
        <div class="jobsIcon">
            <img src="img/svg/employee.svg" alt="An employee">
            <p><?= JOBS_LOGO_1_5 ?></p>
        </div>
    </div>
</div>
<h2 class="titleUnderline"><?= JOBS_H2_1 ?></h2>
<div class="jobsFirstIcons jobsIcons">
    <div class="jobsIcon">
        <img src="img/svg/userResponsability.svg" alt="User with responsabilties">
        <p><?= JOBS_LOGO_2_1 ?></p>
    </div>
    <div class="jobsIcon">
        <img src="img/svg/positive.svg" alt="A human head with a sun into it">
        <p><?= JOBS_LOGO_2_2 ?></p>
    </div>
    <div class="jobsIcon">
        <img src="img/svg/team.svg" alt="A team of persons">
        <p><?= JOBS_LOGO_2_3 ?></p>
    </div>
    <div class="jobsIcon">
        <img src="img/svg/exchange.svg" alt="Two persons making a exchange">
        <p><?= JOBS_LOGO_2_4 ?></p>
    </div>
</div>
<h2 class="titleUnderline"><?= JOBS_H2_2 ?></h2>
<div class="jobsOffers">
    <?php
    foreach ($jobs as $job) {
        ?>
        <div class="topJob">
            <div class="titleJob">
                <?php
                if ($_SESSION['lang'] == "fr") {
                    $jobTitle = $job['titleFR'];
                    $jobPosition = $job['positionFR'];
                } elseif ($_SESSION['lang'] == "en") {
                    $jobTitle = $job['title'];
                    $jobPosition = $job['position'];
                } else {
                    $jobTitle = $job['title'];
                    $jobPosition = $job['position'];
                }
                ?>
                <h3><?= $jobTitle ?></h3>
                <p><?= $jobPosition ?></p>
            </div>
            <div class="grid1fr">
                <div class="taskJobOffer">
                    <p>Your Task :</p>
                    <ul>
                        <?php
                        if ($_SESSION['lang'] == "fr") {
                            $jobTask = $job['taskFR'];
                        } elseif ($_SESSION['lang'] == "en") {
                            $jobTask = $job['task'];
                        } else {
                            $jobTask = $job['task'];
                        }
                        //Detection the \r et on le remplace par un <li>
                        $jobTaskFinal = str_replace("\r", "<li>", $jobTask);
                        //On ajoute le <li> au début de la chaine
                        $jobTaskFinal = "<li>" . $jobTaskFinal;
                        echo $jobTaskFinal . "</li>";
                        ?>
                    </ul>
                </div>
                <div class="strenghtJobOffer">
                    <p>Your strenght :</p>
                    <ul>
                        <?php
                        if ($_SESSION['lang'] == "fr") {
                            $jobStrength = $job['strengthFR'];
                        } elseif ($_SESSION['lang'] == "en") {
                            $jobStrength = $job['strength'];
                        } else {
                            $jobStrength = $job['strength'];
                        }
                        //Detection the \r et on le remplace par un <li>
                        $jobStrengthFinal = str_replace("\r", "<li>", $jobStrength);
                        //On ajoute le <li> au début de la chaine
                        $jobStrengthFinal = "<li>" . $jobStrengthFinal;
                        echo $jobStrengthFinal . "</li>";
                        ?>
                    </ul>
                </div>
            </div>

        </div>
        <?php
    }
    ?>
</div>
<h2 class="titleUnderline"><?= JOBS_H2_3 ?></h2>

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
    <div class="formGroup nop">
        <label>
            <?= CONTACT_FORM_MESSAGE ?>
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        </label>
    </div>
    <div class="formGroup formInput right">
        <input type="submit" value="<?= CONTACT_FORM_SUBMIT ?>">
    </div>
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
</form>
</div>