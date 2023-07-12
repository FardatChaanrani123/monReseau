<?php
$host="localhost";
$user="root";
$password="";
$dbname="reseau";
$connect=mysqli_connect($host,$user,$password,$dbname);
if($connect){
    // echo "connexion etablie";
}else{
    die("connexion echec".mysqli_connect_error());
}
?>