<?php
@session_start();
require_once "header.php";
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    $req ="SELECT *FROM utilisateurs";
    $result = mysqli_query($connect, $req);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card px-0 mx-0 m-3" style="width:16rem;">
                <div class="rounded-top">
                    <div class="card-heading">
                        <img src="<?php echo "./include/image/" . $row['image']; ?>" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            <?php echo $row['nom']; ?>
                            <?php echo $row['prenom']; ?>
                            <?php echo $row['naissance']; ?>
                            <?php echo $row['mail']; ?>
                            <?php echo $row['motdepasse']; ?>
                        </p>
                    </div>
                </div>
            </div>
         <?php
         
        }
    }
}else{
    require_once "index.php";
}
?>