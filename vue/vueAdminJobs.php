<h2 class="titleUnderline"> <?= ADMIN_JOBS_TITLE ?> </h2>
<div class="adminJobs">
    <div class="topAdminJob">
        <a class="yellowButtonAddAdmin" href="index.php?action=admin&page=job"><?= ADMIN_JOBS_ADD_JOB ?></a>
    </div>
    <?php
    foreach ($jobs as $job) {
        ?>
        <div class="aJob">
            <div class="topJob">
                <div class="titleJob">
                    <p class="firstTitleJob">
                        <?php 
                            if($_SESSION['lang']=='fr')
                                echo $job['titleFR'] ;
                            else
                                echo $job['title'] ;
                        ?>
                    </p>
                    <p class="secondTitleJob">
                        <?php 
                            if($_SESSION['lang']=='fr')
                                echo $job['positionFR'] ;
                            else
                                echo $job['position'] ;
                        ?>
                    </p>
                </div>
                <div class="jobDescription">
                    <div>
                        <p class="secondTitleJob"><?= ADMIN_JOBS_TASKS?>:</p>
                        <ul>
                            <?php
                            //Detection the \r et on le remplace par un <li>
                            $jobTask = str_replace("\r", "<li>", ($_SESSION['lang']=='fr' ? $job['taskFR'] : $job['task'] ));
                            //On ajoute le <li> au début de la chaine
                            $jobTask = "<li>" . $jobTask;
                            echo $jobTask . "</li>";
                            ?>
                        </ul>
                    </div>
                    <div >
                        <p class="secondTitleJob"><?= ADMIN_JOBS_STRENGTHS?>:</p>
                        <ul>
                            <?php
                            //Detection the \r et on le remplace par un <li>
                            $jobStrength = str_replace("\r", "<li>", ($_SESSION['lang']=='fr' ? $job['strengthFR'] : $job['strength'] ));
                            //On ajoute le <li> au début de la chaine
                            $jobStrength = "<li>" . $jobStrength;
                            echo $jobStrength . "</li>";
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottomJob">
                <a class="yellowButtonJobs" href="index.php?action=admin&page=job&id=<?= $job['id_jobs'] ?>"><?= ADMIN_JOBS_MOD_JOB ?></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>