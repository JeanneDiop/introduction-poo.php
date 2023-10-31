<?php
session_start();
require_once('inscription.php');
if(isset($_POST["S_inscrire"])){
    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $telephone=$_POST['telephone'];
    $Email=$_POST["email"];
    // var_dump($Email);
    // die();
    $Mot_de_passe=$_POST['mot_de_passe'];
    $Dateinsc=date("Y-m-d");
    if(empty($Nom)|| empty($Prenom)||empty($telephone)||empty($Email)||empty($Mot_de_passe)||empty($date)){
      echo"remplissez tous les champs";
   }
 if(strlen($Mot_de_passe)<=8){
     echo"mot de passe incorrect ne doit pas depasser 8 caracteres";
   } 
   // ca permet de filtrer une chaine de caractere
    if (!FILTER_VAR($Email,FILTER_VALIDATE_EMAIL)) {
       echo "Votre email doit repondre au covention email"."<br>";
    }
    $regex='/^(77|76|78|75|70)+[0-9]/';
    if(!(preg_match($regex,$telephone))){
       echo"numero correct";
    }
  //inserer les données recues
  if(Clients::Se_Connecter($Email, $Mot_de_passe)){
    $_SESSION['error_inscription']="email ou mot de passe existe déjà";
    header("location: index.php");

}else{
  if(Clients::S_inscrire($Nom, $Prenom,$telephone, $Email, $Mot_de_passe,$Dateinsc)){
    $_SESSION['inscription']="vous vous etes inscrits avec succè";
    header('location: index.php');
  }else{
    $_SESSION['error_inscription']="vous vous n'etes pas inscrit";
    header('location: index.php');
  }
   
}
// si il n'existe pas on l'inscrit
 
//   $sql="INSERT INTO clients(Nom, Prenom, telephone, Email, Mot_de_passe, Dateinsc)
//   VALUES(:Nom, :Prenom, :telephone, :Email, :Mot_de_passe, :dateinsc)";
//  $insert= $mysqlConnection->prepare($sql);
//   // ca permet de lier les marqueurs qu'on avait fait dans la requete preparer avec les variables reels
//   // ca permet aussi de faire la verification avec le type des variables 
//   $insert->bindParam(':Nom',$Nom, PDO::PARAM_STR);
//   $insert->bindParam(':Prenom',$Prenom, PDO::PARAM_STR);
//   $insert->bindParam(':telephone',$telephone, PDO::PARAM_STR);
//   $insert->bindParam(':Email',$Email,PDO::PARAM_STR);
//   $insert->bindParam(':Mot_de_passe',$Mot_de_passe,PDO::PARAM_STR);
//   $insert->bindParam(':dateinsc',$Dateinsc, PDO::PARAM_STR);
//   // $insert->execute();
// if ( $insert->execute()) {
// echo " un nouveau insertion a été ajouté dans la table";
// }else{
//   echo "les données n'ont pas été envoyées";
// }      
}     
?>