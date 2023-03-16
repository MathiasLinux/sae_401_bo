<div class="adminJobs">
    <div class="topAdminJob">
        <a class="yellowButtonAddAdmin" href="index.php?action=admin&page=job">Create a new job</a>
    </div>
    <?php
    foreach ($jobs as $job) {
        ?>
        <div class="aJob">
            <div class="topJob">
                <div class="titleJob">
                    <p class="firstTitleJob"><?= $job['title'] ?></p>
                    <p class="secondTitleJob"><?= $job['position'] ?></p>
                </div>
                <div class="jobDescription">
                    <div class="jobTask">
                        <p class="secondTitleJob">Your Task :</p>
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
                    <div class="jobStrenghts">
                        <p class="secondTitleJob">Your Strength :</p>
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
            </div>
            <div class="bottomJob">
                <a class="yellowButtonJobs" href="index.php?action=admin&page=job&id=1">Modify</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>