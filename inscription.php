<?php
require_once 'base.php';
    class Clients {
        // private $Nom;
        // private $Prenom;
        // private $telephone;
        // private $Email;
        // private $Mot_de_Passe;
        // private $Dateinsc;
        public $db;
        public $base;
    public function __construct(){
        // $this->setNom($Nom);
        // $this->setPrenom($Prenom);
        // $this->setTelephone($telephone);
        // $this->setEmail($Email);
        // $this->setMot_de_passe($Mot_de_passe);
        // $this->Dateinsc=$Dateinsc;
        //pour avoir accés à la fonction connecterbase on a créer un objet base
    $this->base=new baseconnexion();
       
    }
        // public function getNom(){
        //     return $this->nom;
        // }
        // public function setNom($Nom){
        //     $regexName='/^[A-Z]{1,2}+[a-z]{2,9}$/';
        //     if(preg_match($regexName,$Nom)){
        //         $this->nom=$Nom;
        //     }else{
        //         throw new Exception("Entrer un nom valide");
        //     }
        // }
        // public function getPrenom(){
        //     return $this->prenom;
        // }
        // public function setPrenom($Prenom){
        //     $regexName='/^[A-Z]{1,2}+[a-z]{2,9}$/';
        //     if(preg_match($regexName,$Prenom)){
        //         $this->prenom=$Prenom;
        //     }else{
        //         throw new Exception("Entrer un prenom valide");
        //     }
        // }
        // public function getTelephone(){
        //     return $this->telephone;
        // }
        // public function setTelephone($telephone){
        //     $regex='/^(77|76|75|78)+[0-9]/';
        //     if(preg_match($regex,$telephone)){
        //         $this->telephone=$telephone;
        //     }else{
        //         throw new Exception("Entrer un numéro de telephone valide");
        //     }
        // }
        // public function getEmail(){
        //     return $this->email;
        // }
        // public function setEmail($Email){
        //     $regexEmail="/^[a-zA-Z-]+@[a-zA-Z-]+\.[a-zA-Z]{2,6}$/";
        //     if(preg_match($regexEmail,$Email)){
        //         $this->email=$Email;
        //     }else{
        //         throw new Exception("Entrer un addresse mail valide");
        //     }
        // }
        // public function getMot_de_Passe(){
        //     return $this->Mot_de_passe;
        // }
        
        //  public function setMot_de_Passe($Mot_de_passe){
        //     if(strlen($Mot_de_passe)>=8){
        //         $this->Mot_de_passe=$Mot_de_passe;
        //     }else{
        //         throw new Exception("Entrer un mot de passe de 8 caracteres au moins");
        //     }
        // }
        public static function S_inscrire($Nom, $Prenom, $telephone, $Email, $Mot_de_passe, $Dateinsc) { 
            $base = new baseconnexion();
        $db=$base->connecterbase();
            $sql = "INSERT INTO clients (Nom, Prenom, telephone, Email, Mot_de_passe, Dateinsc)
                    VALUES (:Nom, :Prenom, :telephone, :Email, :Mot_de_passe, :Dateinsc)";
            $mysqlConnection = $db->prepare($sql);
            $mysqlConnection->bindParam(':Nom', $Nom);
            $mysqlConnection->bindParam(':Prenom', $Prenom);
            $mysqlConnection->bindParam(':telephone',$telephone);
            $mysqlConnection->bindParam(':Email',$Email);
            $mysqlConnection->bindParam(':Mot_de_passe', $Mot_de_passe);
            $mysqlConnection->bindParam(':Dateinsc',$Dateinsc);
           return $mysqlConnection->execute();
        }
    public static function Se_Connecter($Email,$Mot_de_passe){
        if(empty($Email)|| empty($Mot_de_passe)){
            throw new Exception("tous les champs doivent etre remplis");
        }else{
            if(preg_match("/^[a-zA-Z-]+@[a-zA-Z-]+\.[a-zA-Z]{2,6}$/",$Email)){
        }
        //ça nous permet de se connecter à la base
        //on appelle la fonction connecterbase
        $base = new baseconnexion();
        $db=$base->connecterbase();
        $connex=('SELECT Email,Mot_de_passe FROM clients WHERE Email= :Email AND Mot_de_passe= :Mot_de_passe');
        $connexion=$db->prepare($connex);
       
        $connexion->bindParam(':Email', $Email);
        $connexion->bindParam(':Mot_de_passe',$Mot_de_passe);
        $connexion->execute();
        $result=$connexion->fetch(PDO::FETCH_ASSOC);
        //  var_dump($result);
        // die();
        if($result && $result["Mot_de_passe"]===$Mot_de_passe){  
        return true;
        }else{
            return false;
        }
    }
    }
    //query ça permet de recuperer et d'executer en meme temp<  s
    public static function listeclients(){
    $base = new baseconnexion();
    $db=$base->connecterbase();
        $mysqlConnection= "SELECT * FROM clients";
        $clients=$db->query($mysqlConnection);
        if ($clients){
            $re=$clients->fetchALL(PDO::FETCH_ASSOC);
            return $re;
        }else{
            return $re=[];
        }
    }
    }
    // $client= new Clients();
    //$client->S_inscrire("Ntandou","Sacre","776568375","sacre@gmail.com","sacre345","1999-06-08");
    // $connex=$client->Se_Connecter("sacre@gmail.com","sacre345");
    // echo "<pre>";
    //  var_dump(Clients::Se_Connecter("sacre@gmail.com","sacre345"));
    // echo "</pre>";
?>