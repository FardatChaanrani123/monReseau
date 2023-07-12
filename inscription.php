<?php
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="home-main">
        <div class="container m-5">
            <form action="ajout.php" class="form alert alert-light col-md-6 m-auto shadow-lg" enctype="multipart/form-data" method="POST">
                <h2 class="text-center text-uppercase">Inscription</h2>
                <?php if (isset($erreur)) { ?>
                    <p class="alert alert-danger fw-bold">
                        <i class="fa fa-warning fs-3"></i>
                        <?php echo $erreur; ?>
                    </p>
                    <?php
                }
                ?>
                <div class="mb-3">
                    <label for="nom" class="control-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
                <div class="mb-3">
                    <label for="pr" class="control-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="pr">
                </div>
                <div class="mb-3">
                    <label for="naissance" class="control-label">Naissance</label>
                    <input type="date" name="naissance" class="form-control" id="naissance">
                </div>
                <div class="mb-3">
                    <label for="email" class="control-label">Adresse mail</label>
                    <input type="text" name="adresse" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="mot" class="control-label">Mot de passe</label>
                    <input type="password" name="motdepasse" class="form-control" id="mot">
                </div>
                <div class="mb-3">
                    <label for="mote" class="control-label">Mot de passe de confirmation</label>
                    <input type="password" name="mot" class="form-control" id="mote">
                </div>
                <div class="mb-3">
                    <label class="control-label">Image</label>
                    <input type="file" name="montage" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" name="envoyer" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
