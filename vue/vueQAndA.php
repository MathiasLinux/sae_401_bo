<?php
/*var_dump($qAndACat);
echo "<br>";
echo "<br>";
var_dump($allQAndAQuestions);*/
foreach ($qAndACat

as $item) {
if ($_SESSION['lang'] == "fr") {
    $title = $item['titleFR'];
} elseif ($_SESSION['lang'] == "en") {
    $title = $item['title'];
} else {
    $title = $item['title'];
}
echo "<h2 class='titleUnderline'>$title</h2>";
?>
<div class="questions">
    <?php
    foreach ($allQAndAQuestions as $question) {
        if ($question['id_qAndACat'] == $item['id_qAndACat']) {
            ?>
            <div class="aQuestion">
                <div class="titleQuestion">
                    <?php
                    if ($_SESSION['lang'] == "fr") {
                        $questionTitle = $question['titleFR'];
                    } elseif ($_SESSION['lang'] == "en") {
                        $questionTitle = $question['title'];
                    } else {
                        $questionTitle = $question['title'];
                    }
                    ?>
                    <p><?= $questionTitle ?></p>
                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414"
                         viewBox="0 0 14.828 8.414">
                        <path id="Tracé_3" data-name="Tracé 3" d="M6,9l6,6,6-6" transform="translate(-4.586 -7.586)"
                              fill="none"
                              stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="descQuestion">
                    <?php
                    if ($_SESSION['lang'] == "fr") {
                        $questionAnswer = $question['answerFR'];
                    } elseif ($_SESSION['lang'] == "en") {
                        $questionAnswer = $question['answer'];
                    } else {
                        $questionAnswer = $question['answer'];
                    }
                    ?>
                    <p><?= $questionAnswer ?></p>
                </div>
            </div>
            <?php
        }
    }
    }
    ?>
</div>
<p class="bigTextBold"><?= QANDA_LINE_1 ?></p>
<p class="bigText"><?= QANDA_LINE_2 ?></p>
<a class="greenButton" href="index.php?action=contact"><?= QANDA_BUTTON ?></a>
<script src="js/qAndA.js"></script>