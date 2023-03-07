<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title><?= $title ?></title>
</head>
<body>
<header>
    <a href="index.php">
        <img src="img/logo.png" alt="logo">
    </a>
    <div class="mobileMenuDiv">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </div>
    <div class="mobileMenu">
        <svg class="closeMenu" xmlns="http://www.w3.org/2000/svg" width="32.686" height="32.686"
             viewBox="0 0 32.686 32.686">
            <g id="Croix" transform="translate(16.343 -21.293) rotate(45)">
                <line id="Ligne_7" data-name="Ligne 7" y2="43.225" transform="translate(26.613 5)" fill="none"
                      stroke="#fff" stroke-linejoin="round" stroke-width="3"></line>
                <line id="Ligne_8" data-name="Ligne 8" x2="43.225" transform="translate(5 26.613)" fill="none"
                      stroke="#fff" stroke-linejoin="round" stroke-width="3"></line>
            </g>
        </svg>
        <div class="linksMenu">
            <a href="index.php?action=escapeGames">Escape Games</a>
            <a href="index.php?action=giftCards">Gift Cards</a>
            <a href="index.php?action=qAndA">Q&A</a>
            <a href="index.php?action=aboutUs">About Us</a>
        </div>
        <div class="lang">
            <a href="index.php?action=lang&lang=fr">
                <img src="img/fr.png" alt="fr">
                <p>FR</p>
            </a>
            <a href="index.php?action=lang&lang=en">
                <img src="img/en.png" alt="en">
                <p>EN</p>
            </a>
        </div>
    </div>
</header>
<main>
    <?= $contenu ?>
</main>
<footer>
    <img src="img/logo.png" alt="logo">
    <div class="sectionFooter">
        <p class="titleFooter">Company</p>
        <div class="ligneFooter">
            <a href="index.php?action=legal">Legal notice</a>
            <a href="index.php?action=tAndC">T&C</a>
        </div>
        <div class="ligneFooter">
            <a href="index.php?action=privacy">Privacy policy</a>
            <a href="index.php?action=partners">Our Partners</a>
        </div>
    </div>
    <div class="sectionFooter">
        <p class="titleFooter">Informations</p>
        <div class="ligneFooter">
            <a href="index.php?action=jobs">Jobs</a>
            <a href="index.php?action=qAndA">Q&A</a>
        </div>
        <div>
            <a href="index.php?action=contact">Contact US</a>
        </div>
    </div>
    <p>&copy Innovative Innovators 2023</p>
</footer>
<script src="js/menu.js"></script>
</body>
</html>
