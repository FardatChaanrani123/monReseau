<?php
@session_start();
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site | Reseau</title>
    <meta name="description" content="Une petite description de la page">
    <meta name="keywords" content="quelques ,mots, cles ,separes par une virgule">
    <meta name="author" content="Auteur de la page">
    <link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="include/bootstrap/js/bootstrap.bundle.js" defer></script>
    <script src="script.js" async></script>
</head>

<body>
    <header class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand" title="Afficher la page d'acceuil">Mon Reseau</a>
            <button type="button" title="Afficher le menu" class="navbar-toggler" data-bs-toggle="offcanvas"
                aria-controls="offcanvasNavbar" data-bs-target="#offcanvasNavbar">
                <i class="navbar-toggler-icon"></i>
            </button>
            <nav class="nav offcanvas offcanvas-end" aria-labelledby="offcanvasNavbarLabel" id="offcanvasNavbar"
                tabindex="-1">
                <div class="offcanvas-header bg-light">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <a href="#" title="Afficher la page d'accueil" class="navbar-brand text-dark">
                            Mon Reseau
                        </a>
                    </h5>
                    <button class="btn-close" aria-label="Fermer" title="Fermer" data-bs-dismiss="offcanvas">
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a title="Afficher la page d'accueil" href="index.php" id="nav-home-tab"
                                aria-controls="nav-home" class="nav-link active mx-4" role="tab">
                                <i class="fa fa-home"></i>
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                                <a title="Afficher la page mon compte" href="moncompte.php" id="nav-home-tab"
                                    aria-controls="nav-home" class="nav-link active mx-4" role="tab">
                                    <i class="fa fa-user"></i>
                                    Mon Compte
                                </a>
                            </li>
                        <form class="d-flex" style="padding-top:10px; margin-left: 50px;">
                            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Cliquer</button>
                        </form>
                        <div class="dropdown pt-1">
                            <a href="#" class="text-decoration-none link-light dropdown-toggle mx-5"
                                title="Cliquer pour plus d'options" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./include/image/rose.jpg" alt="rose"
                                    title="fardat" width="32" height="32" class="rounded-circle">
                                Parametres
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="inscription.php" class="dropdown-item" title="Afficher mon profil">
                                        <i class="bi-person-workspace"></i>
                                        S'inscrire
                                    </a>
                                </li>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    ?>
                                    <li class="visually-hidden">
                                        <a href="connexion.php" class="dropdown-item" title="Mes paramètres de sécurité">
                                            <i class="bi-lock"></i>
                                            Se connecter
                                        </a>
                                        <?php
                                } else {
                                    ?>
                                    <li>
                                        <a href="connexion.php" class="dropdown-item" title="Mes paramètres de sécurité">
                                            <i class="bi-lock"></i>
                                            Se connecter
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="deconnexion.php" class="dropdown-item">Se deconnecter</a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>

</html>