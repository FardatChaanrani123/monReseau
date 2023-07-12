<?php
session_start();
require_once "db.php";
if (isset($_POST['connecter'])) {
  $mail = $_POST['mail'];
  $motdepasse = $_POST['motdepasse'];
  $req = "SELECT *FROM utilisateurs WHERE mail='$mail'";
  $result = mysqli_query($connect, $req);
  if ($result) {
    if ($row = mysqli_fetch_assoc($result)) {
      $motdepasse_secure = hash_hmac("sha256", $motdepasse, "cle");
      $motdepasse_base = $row['motdepasse'];
      $userid = $row['idu'];
      if (password_verify($motdepasse_secure, $motdepasse_base)) {
        $_SESSION['id'] = $userid;
        $nom = $row['nom'];
        $dateConnexion = date('Y-m-d H:i:s');
        $donnees = $nom . ";" . $dateConnexion."\n";
        $fichier = fopen('connect.txt', 'a');
        if ($fichier) {
          fwrite($fichier, $donnees);
          fclose($fichier);
          header("location:index.php");
          echo "Les données ont été enregistrées avec succès.";
        } else {
           $fichier=fopen("connect.txt","w");
          echo "Erreur lors de l'ouverture du fichier.";
        }
        
      } else {
        $erreur = "Mot de passe oublie";
        require_once "connexion.php";
      }
    } else {
      $erreur = "Ooups!!<br/>Desole on a pu vous autentifie<br>Inscrivez-vous";
      require_once "inscription.php";
      // echo "adresse mail incorrect";
    }
  }
}
?>