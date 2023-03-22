<?php //var_dump($users); ?>
<h2>Right Managenement</h2>
<form class="contactForm contactJobs" style="margin-bottom: 12px" action="#"
      method="post">
    <div class="formGroup">
        <label for="">
            <input type="email" name="mail" id="mail">
        </label>
    </div>
    <div class="submitAdminJob">
        <input class="Search" type="submit" value="Search">
    </div>

</form>
<div class="marge">
    <div class="tableContactForm">
        </tr>
        <div class="tg-wrap">
            <table class="tg">
                <thead>
                <tr>
                    <th class="tg-a43n">E-mail</th>
                    <th class="tg-a43n">First Name</th>
                    <th class="tg-a43n">Last Name</th>
                    <th class="tg-a43n">Rights<br></th>
                    <div>

                    </div>

                </tr>

                <div></div>
                </thead>
                <tbody>
                <?php
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td class="tg-m5d1 pad"><?= $user['email'] ?></td>
                        <td class="tg-m5d1 pad"><?= $user['firstName'] ?></td>
                        <td class="tg-m5d1 pad"><?= $user['lastName'] ?></td>
                        <td class="tg-m5d1 pad">
                            <form action="index.php?action=admin&page=changeUsersRights&id=<?= $user["id_user"] ?>"
                                  method="post">
                                <div class="eachCheckboxUser">
                                    <label for="superadmin">Superadmin</label>
                                    <input type="checkbox" name="superadmin" id="superadmin" <?php
                                    //if a string contain superadmin, it will be checked
                                    if (strpos($user['rights'], 'superadmin') !== false) {
                                        echo "checked";
                                    }
                                    ?>
                                    >
                                </div>
                                <div class="eachCheckboxUser">
                                    <label for="editor">Editor</label>
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
                                    <label for="management">Management</label>
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
                                    <label for="jobs">Jobs</label>
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
                                    <input class="Save" type="submit" value="Save">
                                </div>
                            </form>
                        </td>
                        <td class="Nofond">
                            <div class="deleteUser">Delete</div>
                            <div class="validationDeleteUser">
                                <h3>Are you sure you want to delete this user ?</h3>
                                <div class="delUserDivButton">
                                    <a href="index.php?action=admin&page=delUser&id=<?= $user["id_user"] ?>">Yes</a>
                                    <div class="noDeleteUser">No</div>
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