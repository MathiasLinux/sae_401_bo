<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/stylePC.css" media="screen and (min-width: 1024px)">
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
    <div class="linksPC">
        <div class="linksPCDiv">
            <a href="index.php?action=escapeGames">Escape Games</a>
            <a href="index.php?action=giftCards">Gift Cards</a>
            <a href="index.php?action=qAndA">Q&A</a>
            <a href="index.php?action=aboutUs">About Us</a>
        </div>
        <div class="endLinksPC">
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
            <div class="loginLinksPC">
                <a href="index.php?action=login">
                    <svg id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 470 470">
                        <g id="Calque_1-2" data-name="Calque 1">
                            <path d="M405.23,382.13c-41.25,47.69-102.21,77.87-170.23,77.87s-128.98-30.18-170.23-77.87c28.85-65.34,94.22-110.94,170.23-110.94s141.39,45.6,170.23,110.94Z"
                                  style="fill: #ffffff;"></path>
                            <circle cx="235" cy="178.1" r="93.5" style="fill: #ffffff;"></circle>
                            <path d="M460,235c0,56.25-20.64,107.68-54.77,147.13-41.25,47.69-102.21,77.87-170.23,77.87s-128.98-30.18-170.23-77.87C30.65,342.68,10,291.25,10,235,10,110.73,110.74,10,235,10s225,100.73,225,225Z"
                                  style="fill: none; stroke: #ffffff; stroke-miterlimit: 10; stroke-width: 20px;"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
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
            <a class="loginMobileLink" href="index.php?action=login">
                <svg id="Calque_2" data-name="Calque 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 470 470">
                    <g id="Calque_1-2" data-name="Calque 1">
                        <path d="M405.23,382.13c-41.25,47.69-102.21,77.87-170.23,77.87s-128.98-30.18-170.23-77.87c28.85-65.34,94.22-110.94,170.23-110.94s141.39,45.6,170.23,110.94Z"
                              style="fill: #ffffff;"></path>
                        <circle cx="235" cy="178.1" r="93.5" style="fill: #ffffff;"></circle>
                        <path d="M460,235c0,56.25-20.64,107.68-54.77,147.13-41.25,47.69-102.21,77.87-170.23,77.87s-128.98-30.18-170.23-77.87C30.65,342.68,10,291.25,10,235,10,110.73,110.74,10,235,10s225,100.73,225,225Z"
                              style="fill: none; stroke: #ffffff; stroke-miterlimit: 10; stroke-width: 20px;"></path>
                    </g>
                </svg>
                <div>Connexion</div>
            </a>
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
    <div class="mobileMenuAdmin">
        <svg class="closeMenuAdmin" xmlns="http://www.w3.org/2000/svg" width="32.686" height="32.686"
             viewBox="0 0 32.686 32.686">
            <g id="Croix" transform="translate(16.343 -21.293) rotate(45)">
                <line id="Ligne_7" data-name="Ligne 7" y2="43.225" transform="translate(26.613 5)" fill="none"
                      stroke="#fff" stroke-linejoin="round" stroke-width="3"></line>
                <line id="Ligne_8" data-name="Ligne 8" x2="43.225" transform="translate(5 26.613)" fill="none"
                      stroke="#fff" stroke-linejoin="round" stroke-width="3"></line>
            </g>
        </svg>
        <div class="linksMenuAdmin">
            <a href="index.php">
                <img src="img/svg/home.svg" alt="a house">
                <p>Home</p>
            </a>
            <div class="menuUnderline">Management</div>
            <a href="index.php?action=admin&page=escapeGames">
                <img src="img/svg/key.svg" alt="a key">
                <p>Escape Games</p>
            </a>
            <a href="index.php?action=admin&page=contactForm">
                <img src="img/svg/email.svg" alt="a letter">
                <p>Contact Form</p>
            </a>
            <a href="index.php?action=admin&page=reservations">
                <img src="img/svg/moneyHand.svg" alt="an hand with money">
                <p>Reservations</p>
            </a>
            <a href="index.php?action=admin&page=giftCards">
                <img src="img/svg/giftCard.svg" alt="a gift card">
                <p>Gift Cards</p>
            </a>
            <a href="index.php?action=admin&page=qAndA">
                <img src="img/svg/faq.svg" alt="an faq">
                <p>Q&A</p>
            </a>
            <a href="index.php?action=admin&page=jobs">
                <img src="img/svg/briefcase.svg" alt="a briefcase">
                <p>Jobs</p>
            </a>
            <a href="index.php?action=admin&page=users">
                <img src="img/svg/group.svg" alt="a group of user">
                <p>Users</p>
            </a>
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
