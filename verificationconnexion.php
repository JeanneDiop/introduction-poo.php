<?php
session_start();
require_once("inscription.php");
if(isset($_POST["Se_Connecter"]) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
    $Email=$_POST['email'];
    $Mot_de_passe=$_POST['mot_de_passe'];
if(Clients::Se_Connecter($Email, $Mot_de_passe)){
    header("location: page_acceuille.php");

}else{
    $_SESSION['error_connexion']="email ou mot de passe incorrect";
    header("location: index.php");
}


//     if(include_once("connexionbase.php")){
//         try{
//             $connexion=$mysqlConnection->prepare('SELECT Email,Mot_de_passe FROM clients WHERE Email= :Email AND Mot_de_passe= :Mot_de_passe');
//             $connexion->bindParam(':Email', $Email, PDO::PARAM_STR);
//             $connexion->bindParam(':Mot_de_passe',$Mot_de_passe,PDO::PARAM_STR);
//             $connexion->execute();
//             //creer un tableau associatif qui permet de stocker les valeurs dans $connexion
//             //fetch il doit prendre la premiere valeur rencontrée du mail(meme s'ils sont identiques)
//             $tableauconnexion=$connexion->fetch();
//             // var_dump($tableauconnexion);
//             // echo $tableauconnexion["Email"];
           
//            if($tableauconnexion){

//            //header ca nous permet de se rediriger à une autre page
//             header('location:pageaccueil.php');
//             exit;
//             // echo"la connexion a été bien etablie";
//            }
//            else{
//             echo 'error connect';
//             header('location:atelier13.php');
//            }
//         }catch(PDOException $e){
//             echo"Erreur: connexion echouée" .$e->getMessage();
//         }
// }

}

?>