<?php
session_start();
require_once "db.php";
require_once "moncompte.php";
// Récupérer les statistiques de likes et dislikes pour l'article spécifié
$id=$_SESSION['id'];
$idp=$_GET['id'];
$sql = "SELECT COUNT(*) AS nbjaime FROM liker WHERE idu='$id' AND idp='$idp'";
$result=mysqli_query($connect,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $nbjaime = $row['nbjaime'];
        echo $row['nbjaime'];
        header("location.index.php");
        }
    }
?>