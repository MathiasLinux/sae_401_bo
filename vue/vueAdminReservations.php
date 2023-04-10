<h2 class="titleUnderline"><?= ADMIN_RESERVATION_TITLE ?></h2>
<div class="tableContactForm">
    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_DATE ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_HOURS ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_ESCAPE ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_NB_PERSONS ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_FIRST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_LAST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_RESERVATION_CANCEL ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reservations

            as $reservation){
            ?>
            <tr>
                <td class="tg-m5d1"><?php echo $reservation["gameDateDisplay"]; ?></td>
                <td class="tg-m5d1"><?php echo $reservation["hours"]; ?></td>
                <?php
                if ($_SESSION["lang"] == "fr") {
                    ?>
                    <td class="tg-m5d1"><?php echo $reservation["nameFR"]; ?></td>
                    <?php
                } elseif ($_SESSION["lang"] == "en") {
                    ?>
                    <td class="tg-m5d1"><?php echo $reservation["name"]; ?></td>
                    <?php
                } else {
                    ?>
                    <td class="tg-m5d1"><?php echo $reservation["name"]; ?></td>
                    <?php
                }
                ?>
                <td class="tg-m5d1"><?php echo $reservation["nbPlayers"]; ?></td>
                <td class="tg-m5d1"><?php echo $reservation["buyersFirstName"]; ?></td>
                <td class="tg-m5d1"><?php echo $reservation["buyersLastName"]; ?></td>
                <td class="tg-wkfw noBg">
                    <div class="deleteUser"><?= ADMIN_CONTACT_FORM_DELETE ?></div>
                    <div class="validationDeleteUser">
                        <h3><?= ADMIN_RESERVATION_DELETE_WARNING ?></h3>
                        <div class="delUserDivButton">
                            <a href="index.php?action=admin&page=delReservation&id=<?= $reservation["id_buying"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
                            <div class="noDeleteUser"><?= ADMIN_CONTACT_FROM_DELETE_NO ?></div>
                        </div>
                    </div>
                </td>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/adminReservation.js"></script>
