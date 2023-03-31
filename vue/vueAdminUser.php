<?php //var_dump($users); ?>
<h2 class="titleUnderline"><?= ADMIN_USER_TITLE ?></h2>
<form class="contactForm contactJobs" style="margin-bottom: 12px" action="#"
      method="post">
    <div class="formGroup">
        <label>
        <p class="titleAdminQAndA"> <?= ADMIN_USER_SEARCH ?> </p>
            <input class="searchUser" type="search" name="search" id="search">
        </label>
    </div>
</form>
<div class="marge">
    <div class="tableContactForm">
        </tr>
        <div class="tg-wrap">
            <table class="tg">
                <thead>
                <tr>
                    <th class="tg-a43n"><?= ADMIN_USER_EMAIL ?></th>
                    <th class="tg-a43n"><?= ADMIN_USER_FIRST_NAME ?></th>
                    <th class="tg-a43n"><?= ADMIN_USER_LAST_NAME ?></th>
                    <th class="tg-a43n"><?= ADMIN_USER_RIGHTS ?></th>
                    <div>

                    </div>

                </tr>

                <div></div>
                </thead>
                <tbody>
                <?php
                foreach ($users as $user) {
                    ?>
                    <tr class="searchContent">
                        <td class="tg-m5d1 pad"><?= $user['email'] ?></td>
                        <td class="tg-m5d1 pad"><?= $user['firstName'] ?></td>
                        <td class="tg-m5d1 pad"><?= $user['lastName'] ?></td>
                        <td class="tg-m5d1 pad">
                            <form action="index.php?action=admin&page=changeUsersRights&id=<?= $user["id_user"] ?>"
                                  method="post">
                                <div class="eachCheckboxUser">
                                    <label for="superadmin"><?= ADMIN_USER_RIGHTS_SUPERADMIN ?></label>
                                    <input type="checkbox" name="superadmin" id="superadmin" <?php
                                    //if a string contain superadmin, it will be checked
                                    if (strpos($user['rights'], 'superadmin') !== false) {
                                        echo "checked";
                                    }
                                    ?>
                                    >
                                </div>
                                <div class="eachCheckboxUser">
                                    <label for="editor"><?= ADMIN_USER_RIGHTS_EDITOR ?></label>
                                    <input type="checkbox" name="editor" id="editor"
                                        <?php
                                        //if a string contain editor, it will be checked
                                        if (strpos($user['rights'], 'editor') !== false) {
                                            echo "checked";
                                        }
                                        ?>
                                    >
                                </div>
                                <div class="eachCheckboxUser">
                                    <label for="management"><?= ADMIN_USER_RIGHTS_MANAGEMENT ?></label>
                                    <input type="checkbox" name="management" id="management"
                                        <?php
                                        //if a string contain management, it will be checked
                                        if (strpos($user['rights'], 'management') !== false) {
                                            echo "checked";
                                        }
                                        ?>
                                    >
                                </div>
                                <div class="eachCheckboxUser">
                                    <label for="jobs"><?= ADMIN_USER_RIGHTS_JOBS ?></label>
                                    <input type="checkbox" name="jobs" id="jobs"
                                        <?php
                                        //if a string contain jobs, it will be checked
                                        if (strpos($user['rights'], 'jobs') !== false) {
                                            echo "checked";
                                        }
                                        ?>
                                    >
                                </div>
                                <div class="center">
                                    <input class="Save" type="submit" value="<?= ADMIN_USER_RIGHTS_SAVE ?>">
                                </div>
                            </form>
                        </td>
                        <td class="Nofond">
                            <div class="deleteUser"><?= ADMIN_CONTACT_FORM_DELETE ?></div>
                            <div class="validationDeleteUser">
                                <h3><?= ADMIN_USER_RIGHTS_DELETE_WARNING ?></h3>
                                <div class="delUserDivButton">
                                    <a href="index.php?action=admin&page=delUser&id=<?= $user["id_user"] ?>"><?= ADMIN_CONTACT_FORM_DELETE_YES ?></a>
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


</div>
<script src="js/adminUser.js"></script>