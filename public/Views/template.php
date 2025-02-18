<?php
// On definie une constante pour le chemin vers les assets
define('ASSETS_PATH', 'http://localhost/mediabat_2/public/assets/');
define('VIEWS_PATH', 'http://localhost/mediabat_2/');

var_dump($_SESSION); // celle ci ne fonctionne pas me ressort un tableau vide
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="shortcut icon" href="<?= ASSETS_PATH ?>img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>fonts/fonts.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>css/template.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH . 'css/' . $css ?>">
    <title><?= $title ?></title>
</head>

<body>
    <div id="page">
        <!--NAVIGATION BAR-->
        <header class="d-flex flex-col">
            <nav class="d-flex justify-content-between align-items-center">
                <a href="accueil" class="logo">
                    <img class="svg" src="<?= ASSETS_PATH ?>icons/svg/mediabat.svg" alt="logo de l'entreprise MEDIABAT">
                </a>

                <div class="d-flex justify-content-around align-items-center link-container">

                    <a href="<?= VIEWS_PATH ?>home" class="nav-links">
                        <p>ACCUEIL</p>
                    </a>

                    <?php if (!isset($_SESSION["user"])) : ?>
                        <a href="<?= VIEWS_PATH ?>signup" class="nav-links">
                            <p>INSCRIPTION</p>
                        </a>
                        <a href="<?= VIEWS_PATH ?>signin" class="nav-links">
                            <p>CONNEXION</p>
                        </a>
                    <?php else : ?>
                        <a href="<?= VIEWS_PATH ?>profile" class="nav-links">
                            <p>PROFIL</p>
                        </a>
                        <a href="signout" class="nav-links">
                            <p>DECONNEXION</p>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
        </header>


 
        <?= $content ?>
        
        <?php if (!empty($_SESSION['alert'])) : ?>
            <div class="container mt-3">
                <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-center alert-dismissible fade show" role="alert">
                    <?= $_SESSION['alert']['msg'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>
        <!-- PAGE FOOTER-->
        <footer class="d-flex align-items-center justify-content-between">
            <div class="socials">
                <h3>RETROUVEZ-NOUS<br>SUR LES RESEAUX</h3>
                <div>
                    <a href="#">
                        <img class="svg social" src="<?= ASSETS_PATH ?>icons/svg/social/twitter.svg" alt="logo twitter">
                    </a>
                    <a href="#">
                        <img class="svg social" src="<?= ASSETS_PATH ?>icons/svg/social/facebook.svg" alt="logo facebook">
                    </a>
                    <a href="#">
                        <img class="svg social" src="<?= ASSETS_PATH ?>icons/svg/social/instagram.svg" alt="logo instagram">
                    </a>
                </div>

            </div>

            <div class="footer-logo-container">
                <img class="svg footer-icon" src="<?= ASSETS_PATH ?>icons/svg/mediabat.svg" alt="logo de l'entreprise MEDIABAT">
            </div>

            <div class="footer-nav">
                <a href="<?= VIEWS_PATH ?>accueil" class="footer-links">
                    <p>Accueil</p>
                </a>
                <a href="<?= VIEWS_PATH ?>contact" class="footer-links">
                    <p>Nous contacter</p>
                </a>
                <a href="#" class="footer-links">
                    <p>Mentions Légales</p>
                </a>
                <a href="#" class="footer-links">
                    <p>RGPD</p>
                </a>
            </div>
        </footer>

        <a href="#" class="top-btn">
            <img class="top-img" src="<?= ASSETS_PATH ?>icons/svg/top-arrow.svg" alt="">
        </a>
    </div>

    <section class="loader-wrapper d-flex justify-content-center css-selector">
        <section class="d-flex justify-content-center align-items-center flex-column">
            <img src="<?= ASSETS_PATH ?>icons/svg/mediabat.svg" alt="MEDIABAT LOGO" class="m-3 loader-logo">
            <div class="spinner-border text-light" role="status" class="m-3">
            </div>
        </section>
    </section>



    </div>
    <script src="<?= ASSETS_PATH ?>bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= ASSETS_PATH ?>js/template.js"></script>
    <?php if (isset($script)) { ?>
        <script src="<?= ASSETS_PATH ?>js/<?= $script ?>"></script>
    <?php } ?>
</body>

</html>