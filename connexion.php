
<?php
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <main class="home-main">
        <div class="container m-5">
            <form action="traitement.php" class="form alert alert-light shadow-lg col-md-4 m-auto" method="POST">
                <h2 class="text-center text-capitalize text-dark">Connexion</h2>
                <div class="mb-3">
                    <input type="text" name="mail" class="form-control" placeholder="Adresse mail">
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="mot de passe" name="motdepasse" class="form-control" id="mot">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary col-md-12" name="connecter">Se connecter</button>
                </div>
                <?php
                    if (isset($erreur)) {
                        echo "<div class=\"alert alert-danger text-center\">mot de passe incorrect</div>";
                    }
                ?>
            </form>
        </div>
    </main>
</body>
</html>
