<?php
require_once "db.php";
$id=$_SESSION['id'];
$idp=$_GET['id'];
$sql = "SELECT *FROM liker WHERE idu='$id' AND idp='$idp'";
$result = mysqli_query($connect, $sql);
?>