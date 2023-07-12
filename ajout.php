<?php
session_start();
require_once "header.php";
if (isset($_POST['envoyer'])) {
	var_dump($_POST);
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
    $naissance=$_POST['naissance'];
	$email=$_POST['adresse'];
	$image=$_FILES['montage']['name'];
	$dest= "./include/image/".$image;
	move_uploaded_file($_FILES['montage']['tmp_name'],$dest);
	$motdepasse=$_POST['motdepasse'];
	$motdepassedeconfirmation=$_POST['mot'];
	if ($motdepasse==$motdepassedeconfirmation) {
		$securite=hash_hmac("sha256", $motdepasse, "cle");
		$motdepasse_secure=password_hash($securite, PASSWORD_DEFAULT);
		$sql="INSERT INTO utilisateurs (nom,prenom,naissance,mail,motdepasse,image) VALUES('$nom','$prenom','$naissance','$email','$motdepasse_secure','$image')";
		$result=mysqli_query($connect,$sql);
		if($result){
			// header("location:index.php");
			echo "Enregistrement reussi";
	}else{
        echo "erreur";
    }	
}
}
if (isset($_POST['send'])) {
	$userid=$_SESSION['id'];
    $auteur=$_POST['auteur'];
    $img=$_FILES['photo']['name'];
	$dest="./include/image/".$img; 
	move_uploaded_file($_FILES['photo']['tmp_name'],$dest);
	$description=$_POST['description'];
    $req="INSERT INTO poste(auteur,images,description,idu) VALUES('$auteur','$img','$description','$userid')";
    $result=mysqli_query($connect,$req);
    if($result){
        require_once "index.php";
    }
}
if (isset($_GET['id']) && isset($_POST['ok'])) {
    $des=$_POST['description'];
    $userid=$_SESSION['id'];
    $id=$_GET['id'];
    $req="INSERT INTO commentaire(description,idu,idp) VALUES ('$des','$userid','$id')";
    $result=mysqli_query($connect,$req);
    if ($result) {
        echo "ok";
    }else{
        echo "erreur";
    }
}
if (isset($_POST['envoyer'])) {
	$erreur=0;
	if($erreur==0){
		$svg=$nom.";".$prenom.";".$naissance.";".$email.";".$motdepasse.";".$image."\n";
		if (file_exists("utilisateur.txt") && is_file("utilisateur.txt")) {
			if(($file=fopen("utilisateur.txt","a"))!==FALSE){
				fwrite($file,$svg);
				fclose($file);
				require_once "ajout.php";
			}else{
				$erreur="erreur d'enregistrement";
				$erreur++;
			}
		}else{
			$file=fopen("utilisateur.txt","w");
		}
	}
	}
?>

