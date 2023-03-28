<h2 class="titleUnderline"><?= ADMIN_CONTACT_FORM_TITLE ?></h2>
<div class="tableContactForm">
    </tr>
    <div class="tg-wrap">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_DATE ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_FIRST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_LAST_NAME ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_EMAIL ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_PHONE ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_MESSAGE ?></th>
                <th class="tg-a43n"><?= ADMIN_CONTACT_FORM_ACTION ?><br></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($contacts as $contact) {
                $name = "message" . $i;
                ?>
                <div id="<?= $name ?>" class="messageOpen">
                    <h3><?= ADMIN_CONTACT_FORM_MESSAGE_TITLE ?></h3>
                    <p><?= $contact["message"] ?></p>
                    <button class="yellowButtonAdminContact"><?= ADMIN_CONTACT_FORM_MESSAGE_CLOSE ?></button>
                </div>
                <tr>
                    <td class="tg-m5d1"><?= $contact["date"] ?></td>
                    <td class="tg-m5d1"><?= $contact["firstName"] ?></td>
                    <td class="tg-m5d1"><?= $contact["lastName"] ?></td>
                    <td class="tg-m5d1"><?= $contact["email"] ?></td>
                    <td class="tg-m5d1"><?= $contact["phone"] ?></td>
                    <td class="tg-wkfw messageOpenButton <?= $name ?>"><?= ADMIN_CONTACT_FORM_MESSAGE_BUTTON ?></td>
                    <td class="tg-wkfw tg-wkfw-delete">
                        <div class="warningDelForm"><?= ADMIN_CONTACT_FORM_DELETE ?></div>
                        <div class="validationDeleteUser">
                            <h3><?= ADMIN_CONTACT_FROM_DELETE_VERIF ?></h3>
                            <div class="delUserDivButton">
                                <a class="delContactForm"
                                   href="index.php?action=admin&page=delContactForm&id=<?= $contact["id_contactForm"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
                                <div class="noDeleteUser"><?= ADMIN_CONTACT_FROM_DELETE_NO ?></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/adminContactForm.js"></script>
