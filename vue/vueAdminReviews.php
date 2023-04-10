<h2 class="titleUnderline"><?= ADMIN_REVIEWS_TITLE ?></h2>
<div class="tableContactForm">
    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_ESCAPEGAME_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_FIRST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_LAST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_DESCRIPTION ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_DESCRIPTION_FR ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_RATING ?></th>
                <th class="tg-a43n"><?= ADMIN_REVIEWS_DELETE ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            //var_dump($reviews);
            foreach ($reviews as $review) {
                ?>
                <tr>
                    <?php
                    if ($_SESSION["lang"] == "fr") {
                        ?>
                        <td class="tg-m5d1"><?= $review['nameFR'] ?></td>
                        <?php
                    } elseif ($_SESSION["lang"] == "en") {
                        ?>
                        <td class="tg-m5d1"><?= $review['name'] ?></td>
                        <?php
                    } else {
                        ?>
                        <td class="tg-m5d1"><?= $review['name'] ?></td>
                        <?php
                    }
                    ?>
                    <td class="tg-m5d1"><?= $review['firstName'] ?></td>
                    <td class="tg-m5d1"><?= $review['lastName'] ?></td>
                    <td class="tg-m5d1"><?= $review['description'] ?></td>
                    <td class="tg-m5d1"><?= $review['descriptionFR'] ?></td>
                    <td class="tg-m5d1"><?= $review['rating'] ?></td>
                    <td class="tg-wkfw noBg">
                        <div class="deleteUser"><?= ADMIN_CONTACT_FORM_DELETE ?></div>
                        <div class="validationDeleteUser">
                            <h3><?= ADMIN_REVIEWS_DELETE_WARNING ?></h3>
                            <div class="delUserDivButton">
                                <a href="index.php?action=admin&page=delReviews&id=<?= $review["id_reviews"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
                                <div class="noDeleteUser"><?= ADMIN_CONTACT_FROM_DELETE_NO ?></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/adminReservation.js"></script>
