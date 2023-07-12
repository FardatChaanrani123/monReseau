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
            <form method="POST" action="edit.php?id=<?php echo $row['idu'] ?>" class="alert alert-light col-md-4 m-auto shadow mt-4">
                <h2 class="bg-info">Modification de l'Utlisateur</h2>
                <div class="mb-3">
                    <input type="text" name="nom" class="form-control" value="<?= $row['nom']; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="prenom" class="form-control" value="<?= $row['prenom']; ?>">
                </div>
                <div class="mb-3">
                    <input type="date" name="naissance" class="form-control" value="<?= $row['naissance']; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="adresse" class="form-control" value="<?= $row['mail']; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="motdepasse" class="form-control visually-hidden" value="<?= $row['motdepasse']; ?>">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="montage">
                </div>
                <div class="mb-3">
                    <img src="<?php echo "./include/image/" . $row['image']; ?>" width="100%" height="100%"
                        class="rounded-circle my-4">
                </div>
                <div class="mb-3">
                    <button type="submit" name="valider" class="btn btn-info">Envoyer</button>
                </div>
            </form>
            <?php
        }
    }
}
if (isset($_POST['valider'])) {
    $id = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $naissance = $_POST['naissance'];
    $motdepasse = $_POST['motdepasse'];
    $email=$_POST['adresse'];
	$image=$_POST['montage'];
    $sql = "UPDATE utilisateurs SET nom='$nom',prenom='$prenom',naissance='$naissance',mail='$email',motdepasse='$motdepasse',image='$image' WHERE idu='$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        require_once "moncompte.php";
    } else {
        echo "erreur";
    }

}
?>