<?php
/*var_dump($qAndACat);
echo "<br>";
echo "<br>";
var_dump($allQAndAQuestions);*/
foreach ($qAndACat

as $item) {
echo "<h2 class='titleUnderline'>{$item['title']}</h2>";
?>
<div class="questions">
    <?php
    foreach ($allQAndAQuestions as $question) {
        if ($question['id_qAndACat'] == $item['id']) {
            ?>
            <div class="aQuestion">
                <div class="titleQuestion">
                    <p><?= $question['title'] ?></p>
                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414"
                         viewBox="0 0 14.828 8.414">
                        <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)"
                              fill="none"
                              stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="descQuestion">
                    <p><?= $question['answer'] ?></p>
                </div>
            </div>
            <?php
        }
    }
    }
    ?>
</div>
<p class="bigTextBold">You have not find the answer to you question ? </p>
<p class="bigText">You can contact us through the contact page :</p>
<a class="greenButton" href="index.php?action=contact">Contact us</a>
<script src="js/qAndA.js"></script>