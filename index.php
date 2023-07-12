<?php
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            background-color: #dcdcdc;
        }
    </style>
</head>

<body>
    <main class="home-main">
        <div class="row container">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajout postes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="ajout.php" enctype="multipart/form-data" method="POST">
                                <div class="mb-3">
                                    <label class="control-label">
                                        Auteur
                                    </label>
                                    <input type="text" name="auteur" class="form-control input-lg">
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">
                                        Media
                                    </label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">
                                        Description
                                    </label>
                                    <textarea type="text" name="description" class="form-control input-lg"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="send" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row container">
                <div class="col-md-6 m-auto">
                    <div class="bg-light shadow-lg rounded-top border border-2 border-light my-4 p-3">
                        <div class="col-md-4">
                            <section class="col-md-6">
                                <div class="col-md-4 px-0">
                                    <div class="mt-3">
                                        <div class="card" style="width:16rem;">
                                            <div class="img-rounded">
                                                <div class="card-body">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="text-decoration-none">
                                                        <img src="./include/image/rose.jpg" alt="fb" width="30%"
                                                            height="30%" class="rounded-circle">
                                                        <input type="text" class="form-control"
                                                            placeholder="Ajouter un poste">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <section class="row">
                            <?php
                            $req = "SELECT  p.idp,p.auteur,p.images,p.description,u.nom,u.prenom,
                            u.image 
                            FROM poste p INNER JOIN utilisateurs u
                            ON  p.idu = u.idu ";
                            $result = mysqli_query($connect, $req);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if (stripos($row['images'], "mp4")) {
                                        ?>
                                        <div class="card px-0 mx-0 m-3" style="width:100%;">
                                            <div class="rounded-top">
                                                <div class="card-heading px-4">
                                                    <div class="" style="width: 10%">
                                                        <a href="moncompte.php">
                                                            <img src="<?php echo "./include/image/" . $row['image']; ?>" alt=""
                                                                width="100%" height="100%" class="rounded-circle">
                                                        </a>

                                                    </div>
                                                    <h5 class="card-title text-capitalize">
                                                        <?php echo $row['auteur']; ?>
                                                    </h5>
                                                    <p class="card-title">
                                                        <?php echo $row['description']; ?>
                                                    </p>
                                                </div>
                                                <div class="card-body p-0">
                                                    <iframe src="<?php echo "./include/image/" . $row['images']; ?>" frameborder="0"
                                                        width="508" height="300"></iframe>
                                                </div>
                                                <?php if (!isset($_SESSION['id'])) {
                                                        ?>
                                                <form action="commentaire.php?id=<?= $row['idp'] ?>" method="POST" class="visually-hidden">
                                                    
                                                    <button type="submit" class="btn btn-light" id="like" name="aimer">
                                                        <input type="text" name="nbjaime" class="">
                                                        <i class="fa fa-thumbs-up" id="icon"></i>
                                                        J'aime
                                                    </button>
                                                    <?php }else{
                                                        ?>
                                                        <button type="submit" class="btn btn-light" id="like" name="aimer">
                                                        <input type="text" name="nbjaime" class="visually-hidden">
                                                        <i class="fa fa-thumbs-up" id="icon"></i>
                                                        J'aime
                                                    </button>
                                                    
                                                </form>
                                                <?php }?>
                                                <div class="mb-3">
                                                    <?php if (!isset($_SESSION['id'])) {
                                                        ?>
                                                    <form class="d-flex visually-hidden" style="padding-top:10px; margin-left: 5px;" method="POST"
                                                        action="ajout.php?id=<?= $row['idp'] ?>">
                                                        <input class="form-control me-2" type="text"
                                                            placeholder="Votre commentaire ici" name="description">
                                                        <button class="btn btn-light" type="submit" name="ok">
                                                            <i class="fa fa-send"></i>
                                                        </button>
                                                    </form>
                                                    <?php }else{
                                                        ?>
                                                        <form class="d-flex" style="padding-top:10px; margin-left: 5px;" method="POST"
                                                        action="ajout.php?id=<?= $row['idp'] ?>">
                                                        <input class="form-control me-2" type="text"
                                                            placeholder="Votre commentaire ici" name="description">
                                                        <button class="btn btn-light" type="submit" name="ok">
                                                            <i class="fa fa-send"></i>
                                                        </button>
                                                    </form>
                                                    <?php }?>
                                                </div>
                                                <?php
                                                if (!isset($_SESSION['id'])) {
                                                   ?>
                                                <a href="fardat.php" type="button" class="btn btn-info p-2 m-2 visually-hidden">
                                                    <i class="fa fa-share"></i>
                                                    Partager
                                                </a>
                                                <?php }else{
                                                    ?>
                                                    <a href="fardat.php" type="button" class="btn btn-info p-2 m-2">
                                                    <i class="fa fa-share"></i>
                                                    Partager
                                                </a>
                                               <?php }?>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="card px-0 mx-0 m-3" style="width:100%;">
                                            <div class="img-rounded-top">
                                                <div class="card-heading px-4">
                                                    <div class="" style="width: 10%">
                                                        <a href="moncompte.php">
                                                            <img src="<?php echo "./include/image/" . $row['image']; ?>" alt=""
                                                                width="100%" height="100%" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <h5 class="card-title text-capitalize">
                                                        <?php echo $row['auteur']; ?>
                                                    </h5>
                                                    <p class="card-title">
                                                        <?php echo $row['description']; ?>
                                                    </p>
                                                </div>
                                                <div class="card-body p-0">
                                                    <img src="<?php echo "./include/image/" . $row['images']; ?>"
                                                        class="card-img-top" alt="" width="520" height="300">
                                                </div>
                                                <?php if (!isset($_SESSION['id'])) {
                                                        ?>
                                                <form action="commentaire.php?id=<?= $row['idp'] ?>" method="POST" class="visually-hidden">
                                                    
                                                    <button type="submit" class="btn btn-light" id="like" name="aimer">
                                                        <input type="text" name="nbjaime" class="">
                                                        <i class="fa fa-thumbs-up" id="icon"></i>
                                                        J'aime
                                                    </button>
                                                    <?php }else{
                                                        ?>
                                                        <button type="submit" class="btn btn-light" id="like" name="aimer">
                                                        <input type="text" name="nbjaime" class="visually-hidden">
                                                        <i class="fa fa-thumbs-up" id="icon"></i>
                                                        J'aime
                                                    </button>
                                                    
                                                </form>
                                                <?php }?>
                                                <div class="mb-3">
                                                    <?php if (!isset($_SESSION['id'])) {
                                                        ?>
                                                    <form class="d-flex visually-hidden" style="padding-top:10px; margin-left: 5px;" method="POST"
                                                        action="ajout.php?id=<?= $row['idp'] ?>">
                                                        <input class="form-control me-2" type="text"
                                                            placeholder="Votre commentaire ici" name="description">
                                                        <button class="btn btn-light" type="submit" name="ok">
                                                            <i class="fa fa-send"></i>
                                                        </button>
                                                    </form>
                                                    <?php }else{
                                                        ?>
                                                        <form class="d-flex" style="padding-top:10px; margin-left: 5px;" method="POST"
                                                        action="ajout.php?id=<?= $row['idp'] ?>">
                                                        <input class="form-control me-2" type="text"
                                                            placeholder="Votre commentaire ici" name="description">
                                                        <button class="btn btn-light" type="submit" name="ok">
                                                            <i class="fa fa-send"></i>
                                                        </button>
                                                    </form>
                                                    <?php }?>
                                                </div>
                                                <?php
                                                if (!isset($_SESSION['id'])) {
                                                   ?>
                                                <a href="fardat.php" type="button" class="btn btn-info p-2 m-2 visually-hidden">
                                                    <i class="fa fa-share"></i>
                                                    Partager
                                                </a>
                                                <?php }else{
                                                    ?>
                                                    <a href="fardat.php" type="button" class="btn btn-info p-2 m-2">
                                                    <i class="fa fa-share"></i>
                                                    Partager
                                                </a>
                                               <?php }?>
                                            </div>
                                        </div>
                                        <?php
                                        require_once "index.php";
                                    }
                                    ?>
                            <?php
                                }
                            }
                            ?>
                        </section>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-4">

                        <div class="row container p-3 mx-5 mt-3 alert alert-light shadow">
                            <div class="col-md-4">
                                <span class="fs-4 p-2 text-center">Mon profil</span>
                                <div class="card px-0 mx-0 m-3" style="width:100%;">
                                    <div class="rounded-top">
                                        <div class="card-heading">
                                            <img src="./include/image/rose.jpg" width="100%"
                                                height="100%" class="rounded-circle my-4">
                                            <a href="#" class="">
                                                <!-- <i class="fa fa-pencil fs-3 text-dark"></i> -->
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="card-title mt-5">
                                <div class="fs-4">
                                    <?php echo " Nom : Chaanrani"?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Preom : Fardat" ?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Naissance : 18-03-2003" ?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Email : Fardatchaanrani@gmail.com"?>
                                </div>
                                </p>
                            </div>
                            <div class="mb-3">
                                <input name="commenter" type="search" class="form-control"
                                    placeholder="A quoi pensez-vous?">
                            </div>
                            <div class="mb-3">
                                <a href="#" class="text-decoration-none text-dark fs-3">
                                    <i class="fa fa-video-camera p-2"></i>
                                    Vos video
                                </a>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="text-decoration-none text-dark fs-3">
                                    <i class="fa fa-camera p-2"></i>
                                    Vos photos
                                </a>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="text-decoration-none text-dark fs-3">
                                    <i class="fa fa-map p-2"></i>
                                    Ajouter un lien
                                </a>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn btn-secondary">
                                    publier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>