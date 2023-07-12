<?php
session_start();
require_once "db.php";
// require_once "likeverif.php";
if (isset($_POST['aimer']) && isset($_SESSION['id'])) {
    $nbjaime = 0;
    $id = $_SESSION['id'];
    $idp = $_GET['id'];
    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            if ($row['nbjaime'] == 0) {
                $nbjaime++;
                $req = "UPDATE liker SET nbjaime='$nbjaime' WHERE idu= '$id'";
                $result = mysqli_query($connect, $req);
                if ($result) {
                    require_once "index.php";
                    echo "ok";
                }
            } else {
                $nbjaime=0;
                $sql = "UPDATE liker SET nbjaime='$nbjaime' WHERE idu= '$id'";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    require_once "index.php";
                }
            }
        }
    } else {
        // Insérer une nouvelle réaction
        $nbjaime++;
        $sql = "INSERT INTO liker (idu, nbjaime, idp) VALUES ('$id', '$nbjaime', '$idp')";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("location.index.php");
        }
    }
}
?>