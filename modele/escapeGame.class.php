<?php

require_once "modele/bdd.class.php";
require_once "vue/vue.class.php";

class escapeGame extends bdd
{
    public function getEscapeGames()
    {
        $req = "SELECT * FROM escapeGame";
        return $this->execReq($req);
    }

    public function getEscapeGamesVisible()
    {
        $req = "SELECT * FROM escapeGame WHERE visible = 1";
        return $this->execReq($req);
    }

    public function verifyIfEscapeGameVisible($idEscapeGame)
    {
        $req = "SELECT visible FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($idEscapeGame));
        if ($escapeGame[0]['visible'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getNameEscapeGames()
    {
        $req = "SELECT id_escapeGame, name, nameFR FROM escapeGame";
        return $this->execReq($req);
    }

    /*******
     * Verify if the escape game exist in the database
     * @return boolean
     */
    public function verifyEG($idEscapeGame)
    {
        $escapeGame = $this->getEscapeGame($idEscapeGame);
        if (empty($escapeGame)) {
            return false;
        } else {
            return true;
        }
    }

    public function getEscapeGame($idEG)
    {
        $req = "SELECT * FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($idEG));
        if (empty($escapeGame)) {
            return false;
        } else {
            return $escapeGame[0];
        }
    }

    public function getEscapeGameIdByName($name)
    {
        $req = "SELECT id_escapeGame FROM escapeGame WHERE name = ?";
        $escapeGame = $this->execReqPrep($req, array($name));
        if (empty($escapeGame)) {
            return false;
        } else {
            return $escapeGame[0]['id_escapeGame'];
        }
    }

    public function getPriceEscapeGame($id, $nbPersons)
    {
        $ligne = "";
        if ($nbPersons <= 3) {
            $ligne = "price2_3Persons";
        } elseif ($nbPersons == 4) {
            $ligne = "price4Persons";
        } elseif ($nbPersons == 5) {
            $ligne = "price5Persons";
        } elseif ($nbPersons == 6) {
            $ligne = "price6Persons";
        } elseif ($nbPersons == 7) {
            $ligne = "price7Persons";
        } elseif ($nbPersons == 8) {
            $ligne = "price8Persons";
        } elseif ($nbPersons == 9) {
            $ligne = "price9Persons";
        } elseif ($nbPersons == 10) {
            $ligne = "price10Persons";
        } elseif ($nbPersons == 11) {
            $ligne = "price11Persons";
        } elseif ($nbPersons == 12) {
            $ligne = "price12Persons";
        } elseif ($nbPersons > 12) {
            $ligne = "price12PlusPersons";
        }

        $req = "SELECT $ligne FROM escapeGame WHERE id_escapeGame = ?";
        $escapeGame = $this->execReqPrep($req, array($id));
        return $escapeGame[0][$ligne];
    }

    public function getFrontEscapeGames()
    {
        $req = "SELECT * FROM escapeGame WHERE onFront = 1";
        $escapeGames = $this->execReq($req);
        if (empty($escapeGames)) {
            return false;
        } else {
            return $escapeGames[0];
        }
    }

    public function getEscapeGamesWithoutFront()
    {
        $req = "SELECT * FROM escapeGame WHERE onFront = 0 AND visible = 1";
        $escapeGames = $this->execReq($req);
        return $escapeGames;
    }

    public function getAllReservations()
    {
        $req = "SELECT DATE_FORMAT(gameDate, '%d/%m/%Y') AS gameDateDisplay, hours, eG.name, eG.nameFR, nbPlayers, buyersFirstName, buyersLastName, id_buying from buying INNER JOIN escapeGame eG on buying.id_escapeGame = eG.id_escapeGame;";
        return $this->execReq($req);
    }

    public function delReservation($id)
    {
        $req = "DELETE FROM buying WHERE id_buying = ?";
        $this->execReqPrep($req, array($id));
    }

    public function addXY($latitudeX, $longitudeY, $idEG)
    {
        $req = "UPDATE escapeGame SET x = ?, y = ? WHERE escapeGame.id_escapeGame = ?";
        $data = array($latitudeX, $longitudeY, $idEG);
        $coordonnees = $this->execReqPrep($req, $data);

        if ($coordonnees == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getReviewEG($id)
    {
        $req = "SELECT * FROM reviews WHERE id_escapeGame = ?";
        $data = array($id);
        $reviewsEG = $this->execReqPrep($req, $data);
        return $reviewsEG;
    }

    public function getQandAEG($id)
    {
        $req = "SELECT * FROM qAndAQuestion WHERE id_qAndACat = ?";
        $data = array($id + 1);
        $qAndAEG = $this->execReqPrep($req, $data);
        return $qAndAEG;
    }

    public function getDifficulty($lang)
    {
        if ($lang == "fr") {
            $req = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_NAME='escapeGame' AND COLUMN_NAME='difficultyFR';";
        } elseif ($lang == "en") {
            $req = "SELECT SUBSTRING(COLUMN_TYPE,5) FROM information_schema.COLUMNS WHERE TABLE_NAME='escapeGame' AND COLUMN_NAME='difficulty';";
        }
        $difficulty = $this->execReq($req);
        return $difficulty[0]["SUBSTRING(COLUMN_TYPE,5)"];
    }

    public function addFiles($name, $path)
    {
        if (isset($path)) {
            $path = $path . "/";
            //echo "test isset path";
            //echo "<br>";
            //echo $path;
            //echo "<br>";
            $total = count($_FILES[$name]['name']);
            for ($j = 0; $j < $total; $j++) {
                //var_dump($_FILES[$name]['name'][$j]);
                if (isset($_FILES[$name]['name'][$j])) {
                    //echo "test name";
                    // Test s'il n'y a pas d'erreur
                    if ($_FILES[$name]['error'][$j] == 0) {
                        //echo "test error";
                        // Test si la taille du fichier uploadé est conforme
                        if ($_FILES[$name]['size'][$j] <= 20000000) {
                            //echo "test size";
                            // Test si l'extension du fichier uploadé est autorisée
                            $infosfichier = new SplFileInfo($_FILES[$name]['name'][$j]);
                            $extension_upload = $infosfichier->getExtension();
                            $extensions_autorisees = array('jpg', 'jpeg', 'png');
                            if (in_array($extension_upload, $extensions_autorisees)) {
                                //echo "test extension";
                                //echo "<br>";
                                //echo "img/" . $path;
                                if (is_dir("img/" . $path)) {
                                    //echo "test is_dir";
                                    // Stockage définitif du fichier photo dans le dossier uploads
                                    //move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $_FILES[$name]['name'][$j]);
                                    //+++++++++++++++++++++++++++++++++++++++++++
                                    //775
                                    //echo $_FILES[$name]['tmp_name'][$j] . "<br>" . "<br>";
                                    //echo "img/" . $path . $_FILES[$name]['name'][$j] . "<br>" . "<br>";
                                    //var_dump($_FILES[$name]['name']);
                                    //see content of a folder
                                    //$dirun = "img/" . $path;
                                    //$filesun = scandir($dirun);
                                    //var_dump($filesun);
                                    //++++++++++++++
                                    //echo "Transfert du fichier " . $_FILES[$name]['name'][$j] . " effectué !";
                                    if (((file_exists("img/" . $path . "1.jpg")) || (file_exists("img/" . $path . "1.jpeg")) || (file_exists("img/" . $path . "1.png")))) {
                                        //echo "files non = -1";
                                        //var_dump($_FILES[$name]['name'][$j]);
                                        $i = 1;
                                        while (file_exists("img/" . $path . $i . ".jpg") || file_exists("img/" . $path . $i . ".jpeg") || file_exists("img/" . $path . $i . ".png")) {
                                            $i++;

                                            //rename("img/" . $path . $_FILES[$name]['name'][$j], "img/" . $path . $id . "-" . $i . "." . $extension_upload);
                                        }
                                        move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $i . '.' . $extension_upload);
                                        //echo "Transfert du fichier " . $_FILES[$name]['name'][$j] . " effectué !";
                                        //rename('img/' . $path . $_FILES[$name]['name'][$j], 'img/' . $path . $id . '-1.' . $extension_upload);
                                    } else {
                                        //echo "files = 1";
                                        //var_dump($_FILES[$name]['name'][$j]);
                                        move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . "1" . '.' . $extension_upload);
                                    }
                                    /*if (!file_exists("img/" . $path . $id . "-1.jpg") or !file_exists("img/" . $path . $id . "-1.jpeg") or !file_exists("img/" . $path . $id . "-1.png")) {
                                        move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $id . '-1.' . $extension_upload);
                                        //rename('img/' . $path . $_FILES[$name]['name'][$j], 'img/' . $path . $id . '-1.' . $extension_upload);
                                    }
                                    if (file_exists("img/" . $path . $id . "-1.jpg") or file_exists("img/" . $path . $id . "-1.jpeg") or file_exists("img/" . $path . $id . "-1.png")) {
                                        $i = 1;
                                        while (file_exists("img/" . $path . $id . "-" . $i . "." . $extension_upload)) {
                                            $i++;
                                            move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $id . '-' . $i . '.' . $extension_upload);
                                            //rename("img/" . $path . $_FILES[$name]['name'][$j], "img/" . $path . $id . "-" . $i . "." . $extension_upload);
                                        }
                                    }*/

                                    /*if (file_exists("img/" . $path . $id . "-1.jpg") or file_exists("img/" . $path . $id . "-1.jpeg") or file_exists("img/" . $path . $id . "-1.png")) {
                                        //Incrementation si le fichier existe déjà
                                        $i = 1;
                                        while (file_exists("img/" . $path . $id . "-" . $i . "." . $extension_upload)) {
                                            $i++;
                                            rename("img/" . $path . $_FILES[$name]['name'][$j], "img/" . $path . $id . "-" . $i . "." . $extension_upload);
                                        }
                                    } else {
                                        rename('img/' . $path . $_FILES[$name]['name'][$j], 'img/' . $path . $id . '-1.' . $extension_upload);
                                    }*/
                                }
                            } else
                                //echo "Echec du transfert : Type de fichier non autorisé.";
                                header('Location: index.php?action=admin&page=escapeGames');
                        } else
                            //echo "Echec du transfert : Fichier trop volumineux.";
                            header('Location: index.php?action=admin&page=escapeGames');
                    } else
                        //echo "Echec du transfert avec le code d'erreur : " . $_FILES[$name]['error'];
                        header('Location: index.php?action=admin&page=escapeGames');
                }
            }
        }
    }

    public function addFileCover($name, $path, $id)
    {
        if (isset($path)) {
            $path = $path . "/";
            //echo "test isset path";
            //echo "<br>";
            //echo $path;
            //echo "<br>";
            //var_dump($_FILES[$name]['name'][$j]);
            if (isset($_FILES[$name]['name'])) {
                //echo "test name";
                // Test s'il n'y a pas d'erreur
                if ($_FILES[$name]['error'] == 0) {
                    //echo "test error";
                    // Test si la taille du fichier uploadé est conforme
                    if ($_FILES[$name]['size'] <= 20000000) {
                        //echo "test size";
                        // Test si l'extension du fichier uploadé est autorisée
                        $infosfichier = new SplFileInfo($_FILES[$name]['name']);
                        $extension_upload = $infosfichier->getExtension();
                        $extensions_autorisees = array('jpg', 'jpeg', 'png');
                        if (in_array($extension_upload, $extensions_autorisees)) {
                            //echo "test extension";
                            //echo "<br>";
                            //echo "img/" . $path;
                            if (is_dir("img/" . $path)) {
                                //echo "test is_dir";
                                // Stockage définitif du fichier photo dans le dossier uploads
                                //move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $_FILES[$name]['name'][$j]);
                                //+++++++++++++++++++++++++++++++++++++++++++
                                //775
                                //echo $_FILES[$name]['tmp_name'][$j] . "<br>" . "<br>";
                                //echo "img/" . $path . $_FILES[$name]['name'][$j] . "<br>" . "<br>";
                                //var_dump($_FILES[$name]['name']);
                                //see content of a folder
                                //$dirun = "img/" . $path;
                                //$filesun = scandir($dirun);
                                //var_dump($filesun);
                                //++++++++++++++
                                //echo "Transfert du fichier " . $_FILES[$name]['name'][$j] . " effectué !";
                                if (((file_exists("img/" . $path . $id . "-home.jpg")) || (file_exists("img/" . $path . $id . "-home.jpeg")) || (file_exists("img/" . $path . $id . "-home.png")))) {
                                    //delete the old file
                                    if (file_exists("img/" . $path . $id . "-home.jpg")) {
                                        unlink("img/" . $path . $id . "-home.jpg");
                                    } elseif (file_exists("img/" . $path . $id . "-home.jpeg")) {
                                        unlink("img/" . $path . $id . "-home.jpeg");
                                    } elseif (file_exists("img/" . $path . $id . "-home.png")) {
                                        unlink("img/" . $path . $id . "-home.png");
                                    }
                                    move_uploaded_file($_FILES[$name]['tmp_name'], "img/" . $path . $id . '-home.' . $extension_upload);
                                } else {
                                    //echo "files = 1";
                                    //var_dump($_FILES[$name]['name'][$j]);
                                    move_uploaded_file($_FILES[$name]['tmp_name'], "img/" . $path . $id . '-home.' . $extension_upload);
                                }
                                /*if (!file_exists("img/" . $path . $id . "-1.jpg") or !file_exists("img/" . $path . $id . "-1.jpeg") or !file_exists("img/" . $path . $id . "-1.png")) {
                                    move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $id . '-1.' . $extension_upload);
                                    //rename('img/' . $path . $_FILES[$name]['name'][$j], 'img/' . $path . $id . '-1.' . $extension_upload);
                                }
                                if (file_exists("img/" . $path . $id . "-1.jpg") or file_exists("img/" . $path . $id . "-1.jpeg") or file_exists("img/" . $path . $id . "-1.png")) {
                                    $i = 1;
                                    while (file_exists("img/" . $path . $id . "-" . $i . "." . $extension_upload)) {
                                        $i++;
                                        move_uploaded_file($_FILES[$name]['tmp_name'][$j], "img/" . $path . $id . '-' . $i . '.' . $extension_upload);
                                        //rename("img/" . $path . $_FILES[$name]['name'][$j], "img/" . $path . $id . "-" . $i . "." . $extension_upload);
                                    }
                                }*/

                                /*if (file_exists("img/" . $path . $id . "-1.jpg") or file_exists("img/" . $path . $id . "-1.jpeg") or file_exists("img/" . $path . $id . "-1.png")) {
                                    //Incrementation si le fichier existe déjà
                                    $i = 1;
                                    while (file_exists("img/" . $path . $id . "-" . $i . "." . $extension_upload)) {
                                        $i++;
                                        rename("img/" . $path . $_FILES[$name]['name'][$j], "img/" . $path . $id . "-" . $i . "." . $extension_upload);
                                    }
                                } else {
                                    rename('img/' . $path . $_FILES[$name]['name'][$j], 'img/' . $path . $id . '-1.' . $extension_upload);
                                }*/
                            }
                        } else
                            //echo "Echec du transfert : Type de fichier non autorisé.";
                            header('Location: index.php?action=admin&page=escapeGames');
                    } else
                        //echo "Echec du transfert : Fichier trop volumineux.";
                        header('Location: index.php?action=admin&page=escapeGames');
                } else
                    //echo "Echec du transfert avec le code d'erreur : " . $_FILES[$name]['error'];
                    header('Location: index.php?action=admin&page=escapeGames');
            }
        }
    }

    /********
     * @param $id int the id of the escape game
     * @param $name string the name of the escape game
     * @param $lang string the language of the name of the escape game (en or fr)
     * @return void
     */
    public function updateName($id, $name, $lang)
    {
        if ($lang == "en") {
            //before update verify if the value is not already in the database
            $req = "SELECT name FROM escapeGame WHERE name = ?";
            $actualName = $this->execReqPrep($req, array($name));
            if (empty($actualName)) {
                $req = "UPDATE escapeGame SET name = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($name, $id));
            }
        }
        if ($lang == "fr") {
            //before update verify if the value is not already in the database
            $req = "SELECT nameFR FROM escapeGame WHERE nameFR = ?";
            $actualName = $this->execReqPrep($req, array($name));
            if (empty($actualName)) {
                $req = "UPDATE escapeGame SET nameFR = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($name, $id));
            }
        }
    }

    /******************
     * @param $id int the id of the escape game
     * @param $visibility int the visibility of the escape game (0 or 1)
     * @return void
     */

    public function updateVisibility($id, $visibility)
    {
        //before update verify if the value is not already in the database
        $req = "SELECT visible FROM escapeGame WHERE visible = ? AND id_escapeGame = ?";
        $actualVisibility = $this->execReqPrep($req, array($visibility, $id));
        if (empty($actualVisibility)) {
            $req = "UPDATE escapeGame SET visible = ? WHERE id_escapeGame = ?";
            $this->execReqPrep($req, array($visibility, $id));
        }
    }

    /******************
     * @param $id int the id of the escape game
     * @param $difficulty int the difficulty of the escape game ('Beginner','Easy','Medium','Hard','Extreme' or 'Débutant','Facile','Moyen','Difficile','Extrême' in french)
     * @param $lang string the language of the difficulty of the escape game (en or fr)
     * @return void
     */

    public function updateDifficulty($id, $difficulty, $lang)
    {
        if ($lang == "en") {
            //before update verify if the value is not already in the database
            $req = "SELECT difficulty FROM escapeGame WHERE difficulty = ? AND id_escapeGame = ?";
            $actualDifficulty = $this->execReqPrep($req, array($difficulty, $id));
            if (empty($actualDifficulty)) {
                $req = "UPDATE escapeGame SET difficulty = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($difficulty, $id));
            }
        }
        if ($lang == "fr") {
            //before update verify if the value is not already in the database
            $req = "SELECT difficultyFR FROM escapeGame WHERE difficultyFR = ? AND id_escapeGame = ?";
            $actualDifficulty = $this->execReqPrep($req, array($difficulty, $id));
            if (empty($actualDifficulty)) {
                $req = "UPDATE escapeGame SET difficultyFR = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($difficulty, $id));
            }
        }
    }

    /***********
     * @param $id int the id of the escape game
     * @param $duration int the duration of the escape game
     * @return void
     */

    public function updateDuration($id, $duration)
    {
        //before update verify if the value is not already in the database
        $req = "SELECT duration FROM escapeGame WHERE duration = ? AND id_escapeGame = ?";
        $actualDuration = $this->execReqPrep($req, array($duration, $id));
        var_dump($actualDuration);
        var_dump($duration);
        if (empty($actualDuration)) {
            $req = "UPDATE escapeGame SET duration = ? WHERE id_escapeGame = ?";
            $this->execReqPrep($req, array($duration, $id));
        }
    }

    /**********
     * @param $id int the id of the escape game
     * @param $description string the description of the escape game
     * @param $lang string the language of the description of the escape game (en or fr)
     * @return void
     */

    public function updateDescription($id, $description, $lang)
    {
        if ($lang == "en") {
            //before update verify if the value is not already in the database
            $req = "SELECT description FROM escapeGame WHERE description = ?";
            $actualDescription = $this->execReqPrep($req, array($description));
            if (empty($actualDescription)) {
                $req = "UPDATE escapeGame SET description = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($description, $id));
            }
        }
        if ($lang == "fr") {
            //before update verify if the value is not already in the database
            $req = "SELECT descriptionFR FROM escapeGame WHERE descriptionFR = ?";
            $actualDescription = $this->execReqPrep($req, array($description));
            if (empty($actualDescription)) {
                $req = "UPDATE escapeGame SET descriptionFR = ? WHERE id_escapeGame = ?";
                $this->execReqPrep($req, array($description, $id));
            }
        }
    }

    /*********
     * @param $id int the id of the escape game
     * @param $address string the address of the escape game
     * @return void
     */

    public function updateAddress($id, $address)
    {
        //before update verify if the value is not already in the database
        $req = "SELECT address FROM escapeGame WHERE address = ?";
        $actualAddress = $this->execReqPrep($req, array($address));
        if (empty($actualAddress)) {
            $req = "UPDATE escapeGame SET address = ? WHERE id_escapeGame = ?";
            $this->execReqPrep($req, array($address, $id));
            //reset the x and y coordinates
            $req = "UPDATE escapeGame SET x = NULL, y = NULL WHERE id_escapeGame = ?";
            $this->execReqPrep($req, array($id));
        }
    }

    /*********
     * @param $id int the id of the escape game
     * @param $priceName string the name of the price of the escape game (price2_3Persons, price4Persons, price5Persons, price6Persons, price7Persons, price8Persons, price9Persons, price10Persons, price11Persons, price12Persons, price12PlusPersons)
     * @param $price float the price of the escape game
     * @return void
     */

    public function updatePrice($id, $priceName, $price)
    {
        //before update verify if the value is not already in the database
        $req = "SELECT " . $priceName . " FROM escapeGame WHERE " . $priceName . " = ?";
        $actualPrice = $this->execReqPrep($req, array($price));
        if (empty($actualPrice)) {
            $req = "UPDATE escapeGame SET " . $priceName . " = ? WHERE id_escapeGame = ?";
            echo $req;
            $this->execReqPrep($req, array($price, $id));
        }
    }

    public function updateOnFront($id, $onFrontPage)
    {
        var_dump($onFrontPage);
        echo "onFrontPage top";
        if ($onFrontPage == "1" or $onFrontPage == "0") {
            $req = "UPDATE escapeGame SET onFront = ? WHERE id_escapeGame = ?";
            $this->execReqPrep($req, array($onFrontPage, $id));
        } else {
            return false;
        }
    }

    /*********
     * @param $id_user int the id of the user
     * @param $id_escapeGame int the id of the escape game
     * @param $buyingDate string the date of the buying of the escape game (format : YYYY-MM-DD)
     * @param $gameDate string the date of the game of the escape game (format : YYYY-MM-DD)
     * @param $hours string the hours of the game of the escape game (format : HH)
     * @param $nbPlayers int the number of players of the escape game
     * @param $buyersFirstName string the first name of the buyers of the escape game
     * @param $buyersLastName string the last name of the buyers of the escape game
     * @return void
     */
    public function buyEscapeGame($id_user, $id_escapeGame, $buyingDate, $gameDate, $hours, $nbPlayers, $buyersFirstName, $buyersLastName)
    {
        $req = "INSERT INTO buying (id_user, id_escapeGame, buyingDate, gameDate, hours, nbPlayers, buyersFirstName, buyersLastName) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array($id_user, $id_escapeGame, $buyingDate, $gameDate, $hours, $nbPlayers, $buyersFirstName, $buyersLastName));
    }

    public function addEscapeGame($name, $nameFR, $visible, $difficulty, $difficultyFR, $description, $descriptionFR, $duration, $address, $price2_3Persons, $price4Persons, $price5Persons, $price6Persons, $price7Persons, $price8Persons, $price9Persons, $price10Persons, $price11Persons, $price12Persons, $price12PlusPersons, $onFront)
    {
        $req = "INSERT INTO escapeGame (name, nameFR, visible, difficulty, difficultyFR, description, descriptionFR, duration, address, price2_3Persons, price4Persons, price5Persons, price6Persons, price7Persons, price8Persons, price9Persons, price10Persons, price11Persons, price12Persons, price12PlusPersons, onFront) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array($name, $nameFR, $visible, $difficulty, $difficultyFR, $description, $descriptionFR, $duration, $address, $price2_3Persons, $price4Persons, $price5Persons, $price6Persons, $price7Persons, $price8Persons, $price9Persons, $price10Persons, $price11Persons, $price12Persons, $price12PlusPersons, $onFront));
    }

    public function delEscapeGame($id_escapeGame)
    {
        $req = "DELETE FROM escapeGame WHERE id_escapeGame = ?";
        $this->execReqPrep($req, array($id_escapeGame));
    }

    public function verifyIfUserHasAlreadyReviewedTheEscapeGame($id_user, $id_escapeGame)
    {
        $req = "SELECT id_user FROM reviews WHERE id_user = ? AND id_escapeGame = ?";
        $result = $this->execReqPrep($req, array($id_user, $id_escapeGame));
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public function verifyReviewName($name)
    {
        if (strlen($name) > 0 and strlen($name) < 50 and preg_match("#^[a-zA-ZÀ-ÿ -]+$#", $name)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyReview($review)
    {
        if (strlen($review) > 0 and strlen($review) < 500) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyReviewRating($rating)
    {
        if ($rating >= 0 and $rating <= 5) {
            return true;
        } else {
            return false;
        }
    }

    public function addReviewInSys($id_user, $id_escapeGame, $firstName, $lastName, $description, $descriptionFR, $rating)
    {
        $req = "INSERT INTO reviews (id_user, id_escapeGame, firstName, lastName, description, descriptionFR, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->execReqPrep($req, array($id_user, $id_escapeGame, $firstName, $lastName, $description, $descriptionFR, $rating));
    }

    public function getReservationsForDate($id, $date)
    {
        $req = "SELECT * FROM buying WHERE id_escapeGame = ? AND gameDate = ?";
        return $this->execReqPrep($req, array($id, $date));
    }

    public function verifyIfHourIsAvailable($id, $date, $hour)
    {
        $req = "SELECT * FROM buying WHERE id_escapeGame = ? AND gameDate = ? AND hours = ?";
        $result = $this->execReqPrep($req, array($id, $date, $hour));
        if (empty($result)) {
            return true;
        } else {
            return false;
        }
    }
}