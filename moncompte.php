<?php
@session_start();
require_once "header.php";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $req = "SELECT *FROM utilisateurs WHERE idu='$id'";
    $result = mysqli_query($connect, $req);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row container p-3 mx-5 mt-3 alert alert-light shadow">
                <div class="col-md-4">
                    <span class="fs-1 p-2 text-center">Mon profil</span>
                    <div class="card px-0 mx-0 m-3" style="width:100%;">
                        <div class="rounded-top">
                            <div class="card-heading">
                                <img src="<?php echo "./include/image/" . $row['image']; ?>" width="100%" height="100%"
                                    class="rounded-circle my-4">
                                <a href="edit.php?id=<?= $row['idu'] ?>" class="">
                                    <i class="fa fa-pencil fs-3 text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="card-title mt-5">
                    <div class="fs-4">
                        <?php echo " Nom : " . $row['nom']; ?>
                    </div>
                    <div class="fs-4">
                        <?php echo " Preom : " . $row['prenom']; ?>
                    </div>
                    <div class="fs-4">
                        <?php echo " Naissance : " . $row['naissance']; ?>
                    </div>
                    <div class="fs-4">
                        <?php echo " Email : " . $row['mail']; ?>
                    </div>
                    </p>
                </div>
                <div class="col-md-4 alert alert-light shadow">
                    <h2 class="bg-info">Mes Commentaires</h2>
                    <?php
                    $req = "SELECT description FROM commentaire WHERE idu='$id'";
                    $result = mysqli_query($connect, $req);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['description'] . "<br/>";
                        }
                    }
                    ?>
                    <!-- <div class="row">
                        <h3 class="bg-success text-light mt-4">Le Nombre de like</h3>
                        <div class="mt-3">
                            <?php
                            // $sql = "SELECT COUNT(*) AS nbjaime *FROM liker WHERE idu='$id'";
                            // $result = mysqli_query($connect, $req);
                            // if ($result) {
                            //     if ($row = mysqli_fetch_column($result)) {
                            //         echo $row['nbjaime'] . "<br/>";
                            //     }
                            // }
                            // ?>
                        </div>
                    </div> -->
                    <div class="mt-3">
                    </div>
                </div>
                <div class="row col-md-6 m-auto">
                    <span class="fs-1 bg-info rounded text-center text-capitalize  fw-bold">Mes publications</span>
                    <?php
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $sql = "SELECT *FROM poste WHERE idu ='$id'";
                        $result = mysqli_query($connect, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="card px-0 mx-4 my-4" style="width:50rem;">
                                    <div class="img-rounded">
                                        <div class="card-heading px-4">
                                            <img src="<?php echo "./include/image/" . $row['images']; ?>" class="card-img-top" alt=""
                                                width="100%" height="100%">
                                        </div>
                                        <div class="card-body p-0">
                                            <h5 class="card-title text-capitalize px-4">
                                                <?php echo $row['auteur']; ?>
                                            </h5>
                                            <p class="card-title px-4">
                                                <?php echo $row['description']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
        }
    }
}
?>
        <div class="row">
            <span class="fs-1 p-2 text-center">Les autres utilisateurs</span>
            <?php
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $req = "SELECT *FROM utilisateurs WHERE not idu= '$id'";
                $result = mysqli_query($connect, $req);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="row container p-3 mx-5 mt-3 alert alert-light shadow">
                            <div class="col-md-4">
                                <!-- <span class="fs-1 p-2 text-center">Mon profil</span> -->
                                <div class="card px-0 m-3" style="width:100%;">
                                    <div class="rounded-top">
                                        <div class="card-heading">
                                            <a href="">
                                                <img src="<?php echo "./include/image/" . $row['image']; ?>" width="100%"
                                                    height="100%" class="rounded-circle my-4">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="card-title mt-5">
                                <div class="fs-3">
                                    <?php echo " Nom : " . $row['nom']; ?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Preom : " . $row['prenom']; ?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Naissance : " . $row['naissance']; ?>
                                </div>
                                <div class="fs-4">
                                    <?php echo " Email : " . $row['mail']; ?>
                                </div>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>