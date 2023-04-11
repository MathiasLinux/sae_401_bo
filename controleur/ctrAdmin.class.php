<?php

require_once "modele/jobs.class.php";
require_once "modele/qAndA.class.php";
require_once "modele/user.class.php";
require_once "modele/giftCards.class.php";
require_once "modele/escapeGame.class.php";
require_once "modele/contact.class.php";
require_once "modele/reviews.class.php";
require_once "vue/vue.class.php";

class ctrAdmin
{
    public $jobs;
    public $qAndAs;
    public $user;
    public $giftCards;
    public $EG;
    public $contact;
    public $reviews;

    public function __construct()
    {
        $this->jobs = new jobs();
        $this->qAndAs = new qAndA();
        $this->user = new user();
        $this->giftCards = new giftCards();
        $this->EG = new escapeGame();
        $this->contact = new contact();
        $this->reviews = new review();
    }

    public function admin()
    {
        $title = "Administration - Kaiserstuhl escape";
        $objVue = new vue("Admin");
        $objVue->afficher(array(), $title);
    }

    public function escapeGames()
    {
        $EGs = $this->EG->getNameEscapeGames();
        $title = "Administration Escape Games - Kaiserstuhl escape";
        $objVue = new vue("AdminEscapeGames");
        $objVue->afficher(array("EGs" => $EGs), $title);
    }

    public function escapeGame($idEG = "")
    {
        if (!empty($idEG)) {
            if ($this->EG->getEscapeGame($idEG)) {
                $EG = $this->EG->getEscapeGame($idEG);
                $difficultiesEN = $this->EG->getDifficulty("en");
                $difficultiesFR = $this->EG->getDifficulty("fr");
                $title = "Administration Escape Game - Kaiserstuhl escape";
                $objVue = new vue("AdminEscapeGame");
                $objVue->afficher(array("EG" => $EG, "difficultiesEN" => $difficultiesEN, "difficultiesFR" => $difficultiesFR), $title);
            } else {
                header("Location: index.php?action=admin&page=escapeGames");
            }
        } else {
            $difficultiesEN = $this->EG->getDifficulty("en");
            $difficultiesFR = $this->EG->getDifficulty("fr");
            $title = "Administration Escape Game - Kaiserstuhl escape";
            $objVue = new vue("AdminEscapeGame");
            $objVue->afficher(array("difficultiesEN" => $difficultiesEN, "difficultiesFR" => $difficultiesFR), $title);
        }
    }

    public function contactForm()
    {
        $contactInfos = $this->contact->getContactInfos();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Formulaire de contact - Kaiserstuhl escape";
        } else {
            $title = "Administration Contact Form - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminContactForm");
        $objVue->afficher(array("contacts" => $contactInfos), $title);
    }

    public function delContactForm($id)
    {
        $this->contact->delContactInfos($id);
        header("Location: index.php?action=admin&page=contactForm");
    }

    public function reservations()
    {
        $reservations = $this->EG->getAllReservations();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Réservations - Kaiserstuhl escape";
        } else {
            $title = "Administration Reservation - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminReservations");
        $objVue->afficher(array("reservations" => $reservations), $title);
    }

    public function delReservation($id)
    {
        $this->EG->delReservation($id);
        header("Location: index.php?action=admin&page=reservations");
    }

    public function delGiftCard()
    {
        $this->giftCards->delGiftCardAmount($_GET["id"]);
        header("Location: index.php?action=admin&page=giftCards");
    }

    public function addGiftCardsAmount()
    {
        //var_dump($_POST);
        extract($_POST);
        if (!empty($amount)) {
            //check if the amount is already in the database
            $giftCardAmount = $this->giftCards->getAllGiftCardsAmount();
            $alreadyIn = false;
            $giftCardAmountID = 0;
            foreach ($giftCardAmount as $value) {
                if ($value["price"] == $amount) {
                    $alreadyIn = true;
                    $giftCardAmountID = $value["id_giftCardAmount"];
                    break;
                }
            }
            if ($alreadyIn) {
                $this->giftCards->reAddGiftCardAmount($giftCardAmountID);
                header("Location: index.php?action=admin&page=giftCards");
            } else {
                if ($this->giftCards->addGiftCardAmount($amount))
                    header("Location: index.php?action=admin&page=giftCards");
                else
                    throw new Exception("An error occured during the adding process");
            }
        } else
            $this->giftCards();
    }

    public function giftCards()
    {
        $giftCardAmount = $this->giftCards->getGiftCardAmount();
        $moneyCards = $this->giftCards->getMoneyCards();
        $escapeCards = $this->giftCards->getEscapeCards();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Cartes cadeaux - Kaiserstuhl escape";
        } else {
            $title = "Administration Gift Cards - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminGiftCards");
        $objVue->afficher(array("giftCardAmount" => $giftCardAmount, "moneyCards" => $moneyCards, "escapeCards" => $escapeCards), $title);
    }

    public function qAndANewCat_S()
    {
        extract($_POST);
        if (!empty($newCat) && !empty($newCatFR)) {
            if ($this->qAndAs->addQandACat($newCat, $newCatFR))
                $this->qAndA();
            else
                throw new Exception("An error occured during the adding process");
        } else
            $this->qAndA();
    }

    public function qAndA()
    {
        $qAndAs = $this->qAndAs->getQandACat();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndA");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndAQuestionsAdd_S($idCat)
    {
        extract($_POST);
        if (!empty($question) && !empty($answer) && !empty($questionFR) && !empty($answerFR)) {
            if ($this->qAndAs->addQandAQuestion($question, $answer, $questionFR, $answerFR, $idCat))
                $this->qAndAQuestions($idCat);
            else
                throw new Exception("An error occured during the adding process");
        } else
            $this->qAndAQuestions($idCat);
    }

    public function qAndAQuestions($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        $qAndAQs = $this->qAndAs->getQandAQuestions($idCat);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Questions - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Questions - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndAQuestions");
        $objVue->afficher(array("qAndAQs" => $qAndAQs, "qAndAs" => $qAndAs), $title);
    }

    public function qAndAQuestionsDelete($idQ)
    {
        $qAndAQs = $this->qAndAs->getOneQandAQuestion($idQ);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Supprimer une question - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Delete a Q&A - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndAQuestionsDelete");
        $objVue->afficher(array("qAndAQs" => $qAndAQs), $title);
    }

    public function qAndAQuestionsDelete_S($idCat, $idQ)
    {
        if ($this->qAndAs->deleteQandAQuestion($idQ))
            $this->qAndAQuestions($idCat);
        else
            throw new Exception("An error occured during the delete process");
    }

    public function qAndAQuestionsModify($idQ)
    {
        $qAndAQs = $this->qAndAs->getOneQandAQuestion($idQ);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Modifier une question - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Modify a Q&A - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndAQuestionsModify");
        $objVue->afficher(array("qAndAQs" => $qAndAQs), $title);
    }

    public function qAndAQuestionsModify_S($idCat, $idQ)
    {
        extract($_POST);
        if (!empty($question) && !empty($answer) && !empty($questionFR) && !empty($answerFR)) {
            if ($this->qAndAs->updateQandAQuestion($question, $answer, $questionFR, $answerFR, $idQ))
                $this->qAndAQuestions($idCat);
            else
                throw new Exception("An error occured during the modify process");
        } else
            $this->qAndAQuestions($idCat);
    }

    public function qAndAModifyCat_S($idCat)
    {
        extract($_POST);
        if (!empty($nameCat)) {
            if ($this->qAndAs->updateQandACat($nameCat, $idCat))
                $this->qAndA();
            else
                throw new Exception("An error occured during the update process");
        } else
            $this->qAndAModifyCat($idCat);
    }

    public function qAndAModifyCat($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Modifier une catégorie - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Modify a category - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndAModifyCat");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndAModifyEG($idCat)
    {
        $EGs = $this->EG->getEscapeGames();
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Modifier l'association d'un escape game - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Modify association of escape game - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndAModifyEG");
        $objVue->afficher(array("qAndAs" => $qAndAs, "EGs" => $EGs), $title);
    }

    public function qAndAModifyEG_S($idCat)
    {
        if (!empty($_POST)) {
            $idEG = (int)array_values($_POST)[0];
            if ($this->qAndAs->updateQAndAEG($idEG, $idCat))
                $this->qAndA();
            else
                throw new Exception("An error occured during the update process");
        } else
            $this->qAndA();
    }

    public function qAndADeleteCat($idCat)
    {
        $qAndAs = $this->qAndAs->getOneQandACat($idCat);
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration FAQ - Supprimer une catégorie - Kaiserstuhl escape";
        } else {
            $title = "Administration Q&A - Delete category - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminQAndADeleteCat");
        $objVue->afficher(array("qAndAs" => $qAndAs), $title);
    }

    public function qAndADeleteCat_S($idCat)
    {
        if ($this->qAndAs->deleteQandACat($idCat))
            $this->qAndA();
        else
            throw new Exception("An error occured during the delete process");
    }

    public function job()
    {
        if (isset($_GET["id"])) {
            $job = $this->jobs->getJobsById($_GET["id"]);
        } else {
            $job = "";
        }
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Emplois - Kaiserstuhl escape";
        } else {
            $title = "Administration Jobs - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminJob");
        $objVue->afficher(array("job" => $job), $title);
    }

    public function addJob()
    {
        //var_dump($_POST);
        $title = $_POST["title"] ?? "";
        $titleFR = $_POST["titleFR"] ?? "";
        $position = $_POST["position"] ?? "";
        $positionFR = $_POST["positionFR"] ?? "";
        $task = $_POST["task"] ?? "";
        $taskFR = $_POST["taskFR"] ?? "";
        $strength = $_POST["strength"] ?? "";
        $strengthFR = $_POST["strengthFR"] ?? "";

        if (isset($_POST["visible"])) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        $this->jobs->addJobs($title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible);
        header("Location: index.php?action=admin&page=jobs");

    }

    public function updateJob()
    {
        $id = $_POST["id"] ?? "";
        $title = $_POST["title"] ?? "";
        $titleFR = $_POST["titleFR"] ?? "";
        $position = $_POST["position"] ?? "";
        $positionFR = $_POST["positionFR"] ?? "";
        $task = $_POST["task"] ?? "";
        $taskFR = $_POST["taskFR"] ?? "";
        $strength = $_POST["strength"] ?? "";
        $strengthFR = $_POST["strengthFR"] ?? "";

        if (isset($_POST["visible"])) {
            $visible = 1;
        } else {
            $visible = 0;
        }
        $this->jobs->updateJobs($id, $title, $titleFR, $position, $positionFR, $task, $taskFR, $strength, $strengthFR, $visible);
        header("Location: index.php?action=admin&page=jobs");
    }

    public function delJob($id)
    {
        $this->jobs->delJobs($id);
        header("Location: index.php?action=admin&page=jobs");
    }

    public function jobs()
    {
        $jobs = $this->jobs->getJobs();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Emplois - Kaiserstuhl escape";
        } else {
            $title = "Administration Jobs - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminJobs");
        $objVue->afficher(array("jobs" => $jobs), $title);
    }

    public function delUser($id)
    {
        $this->user->delUser($id);
        header("Location: index.php?action=admin&page=users");
    }

    public function user()
    {
        $users = $this->user->getUsers();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Utilisateurs - Kaiserstuhl escape";
        } else {
            $title = "Administration Users - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminUser");
        $objVue->afficher(array("users" => $users), $title);
    }

    public function changeUsersRights($id)
    {
        $rights = "";
        if (isset($_POST["superadmin"])) {
            $rights .= "superadmin,";
        }
        if (isset($_POST["editor"])) {
            $rights .= "editor,";
        }
        if (isset($_POST["management"])) {
            $rights .= "management,";
        }
        if (isset($_POST["jobs"])) {
            $rights .= "jobs,";
        }
        //delete last comma
        $rights = substr($rights, 0, -1);
        $this->user->updateRightsUser($id, $rights);
        header("Location: index.php?action=admin&page=users");
    }

    public function modifyEscapeGame($id)
    {
//        var_dump($_POST);
//        var_dump($_FILES);
//        var_dump($id);
        if (isset($_FILES["imgEscapeUpload"]) and !empty($_FILES["imgEscapeUpload"])) {
            $this->EG->addFiles("imgEscapeUpload", "escapeGame/" . $id);
        }
        if (isset($_FILES["imgEscapeUploadCover"]) and !empty($_FILES["imgEscapeUploadCover"])) {
            //verify that the repertoire exist
            if (!file_exists("img/escapeGame/" . $id)) {
                mkdir("img/escapeGame/" . $id);
            }
            $this->EG->addFileCover("imgEscapeUploadCover", "escapeGames/", $id);
        }
        if (isset($_POST["name"]) and !empty($_POST["name"])) {
            $this->EG->updateName($id, $_POST["name"], "en");
        }
        if (isset($_POST["nameFR"]) and !empty($_POST["nameFR"])) {
            $this->EG->updateName($id, $_POST["nameFR"], "fr");
        }
        if (isset($_POST["visible"])) {
            $this->EG->updateVisibility($id, $_POST["visible"]);
        }
        if (isset($_POST["onFront"])) {
            $this->EG->updateOnFront($id, $_POST["onFront"]);
        }
        if (isset($_POST["difficulty"]) and !empty($_POST["difficulty"])) {
            $this->EG->updateDifficulty($id, $_POST["difficulty"], "en");
        }
        if (isset($_POST["difficultyFR"]) and !empty($_POST["difficultyFR"])) {
            $this->EG->updateDifficulty($id, $_POST["difficultyFR"], "fr");
        }
        if (isset($_POST["duration"]) and !empty($_POST["duration"])) {
            $this->EG->updateDuration($id, $_POST["duration"]);
        }
        if (isset($_POST["address"]) and !empty($_POST["address"])) {
            $this->EG->updateAddress($id, $_POST["address"]);
        }
        if (isset($_POST["description"]) and !empty($_POST["description"])) {
            $this->EG->updateDescription($id, $_POST["description"], "en");
        }
        if (isset($_POST["descriptionFR"]) and !empty($_POST["descriptionFR"])) {
            $this->EG->updateDescription($id, $_POST["descriptionFR"], "fr");
        }
        if (isset($_POST["address"]) and !empty($_POST["address"])) {
            $this->EG->updateAddress($id, $_POST["address"]);
        }
        if (isset($_POST["price2_3Persons"]) and !empty($_POST["price2_3Persons"])) {
            $this->EG->updatePrice($id, "price2_3Persons", $_POST["price2_3Persons"]);
        }
        if (isset($_POST["price4Persons"]) and !empty($_POST["price4Persons"])) {
            $this->EG->updatePrice($id, "price4Persons", $_POST["price4Persons"]);
        }
        if (isset($_POST["price5Persons"]) and !empty($_POST["price5Persons"])) {
            $this->EG->updatePrice($id, "price5Persons", $_POST["price5Persons"]);
        }
        if (isset($_POST["price6Persons"]) and !empty($_POST["price6Persons"])) {
            $this->EG->updatePrice($id, "price6Persons", $_POST["price6Persons"]);
        }
        if (isset($_POST["price7Persons"]) and !empty($_POST["price7Persons"])) {
            $this->EG->updatePrice($id, "price7Persons", $_POST["price7Persons"]);
        }
        if (isset($_POST["price8Persons"]) and !empty($_POST["price8Persons"])) {
            $this->EG->updatePrice($id, "price8Persons", $_POST["price8Persons"]);
        }
        if (isset($_POST["price9Persons"]) and !empty($_POST["price9Persons"])) {
            $this->EG->updatePrice($id, "price9Persons", $_POST["price9Persons"]);
        }
        if (isset($_POST["price10Persons"]) and !empty($_POST["price10Persons"])) {
            $this->EG->updatePrice($id, "price10Persons", $_POST["price10Persons"]);
        }
        if (isset($_POST["price11Persons"]) and !empty($_POST["price11Persons"])) {
            $this->EG->updatePrice($id, "price11Persons", $_POST["price11Persons"]);
        }
        if (isset($_POST["price12Persons"]) and !empty($_POST["price12Persons"])) {
            $this->EG->updatePrice($id, "price12Persons", $_POST["price12Persons"]);
        }
        if (isset($_POST["price12PlusPersons"]) and !empty($_POST["price12PlusPersons"])) {
            $this->EG->updatePrice($id, "price12PlusPersons", $_POST["price12PlusPersons"]);
        }
        header("Location: index.php?action=admin&page=escapeGames");
    }

    public function addEscapeGame()
    {
        //var_dump($_POST);
        //var_dump($_FILES);
        if (isset($_POST["name"]) and isset($_POST["nameFR"]) and isset($_POST["visible"]) and isset($_POST["difficultyEN"]) and isset($_POST["difficultyFR"]) and isset($_POST["duration"]) and isset($_POST["description"]) and isset($_POST["descriptionFR"]) and isset($_POST["address"]) and isset($_POST["price2_3Persons"]) and isset($_POST["price4Persons"]) and isset($_POST["price5Persons"]) and isset($_POST["price6Persons"]) and isset($_POST["price7Persons"]) and isset($_POST["price8Persons"]) and isset($_POST["price9Persons"]) and isset($_POST["price10Persons"]) and isset($_POST["price11Persons"]) and isset($_POST["price12Persons"]) and isset($_POST["price12PlusPersons"]) and isset($_POST["onFront"])) {
            //echo "ok post";
            $this->EG->addEscapeGame($_POST["name"], $_POST["nameFR"], $_POST["visible"], $_POST["difficultyEN"], $_POST["difficultyFR"], $_POST["description"], $_POST["descriptionFR"], $_POST["duration"], $_POST["address"], $_POST["price2_3Persons"], $_POST["price4Persons"], $_POST["price5Persons"], $_POST["price6Persons"], $_POST["price7Persons"], $_POST["price8Persons"], $_POST["price9Persons"], $_POST["price10Persons"], $_POST["price11Persons"], $_POST["price12Persons"], $_POST["price12PlusPersons"], $_POST["onFront"]);
            if (isset($_FILES["imgEscapeUpload"]) and !empty($_FILES["imgEscapeUpload"]["name"][0])) {
                //create folder
                $id = $this->EG->getEscapeGameIdByName($_POST["name"]);
                mkdir("img/escapeGame/" . $id);
                //add files
                $this->EG->addFiles("imgEscapeUpload", "escapeGame/" . $id);
                //echo "ok files";
            }
            if (isset($_FILES["imgEscapeUploadCover"]) and !empty($_FILES["imgEscapeUploadCover"]["name"][0])) {
                $id = $this->EG->getEscapeGameIdByName($_POST["name"]);
                //add files
                $this->EG->addFileCover("imgEscapeUploadCover", "escapeGames/", $id);
                //echo "ok files";
            }
        }
        header("Location: index.php?action=admin&page=escapeGames");
    }

    public function delEscapeGame($id)
    {
        $this->EG->delEscapeGame($id);
        header("Location: index.php?action=admin&page=escapeGames");
    }

    public function reviews()
    {
        $reviews = $this->reviews->getReviews();
        if ($_SESSION["lang"] == "fr") {
            $title = "Administration Avis - Kaiserstuhl escape";
        } else {
            $title = "Administration Reviews - Kaiserstuhl escape";
        }
        $objVue = new vue("AdminReviews");
        $objVue->afficher(array("reviews" => $reviews), $title);
    }

    public function delReviews($id)
    {
        $this->reviews->delReviews($id);
        header("Location: index.php?action=admin&page=reviews");
    }

}