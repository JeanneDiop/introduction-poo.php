<?php
class baseconnexion {
     public $host="localhost";
     public $dbname="taxiboko";
     public $user="root";
     public $password="";
     public function connecterbase(){
            try {
                //Cette ligne de code crée une nouvelle instance de la classe PDO, qui est utilisée pour interagir avec une base de données MySQL
                // PDO c'est un objet qui nous permet de se connecter à la base de donnée
                $db = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
              
                //  echo "connexion reussi";
                return $db;
            } catch (PDOException $e) { //Cela permet de gérer l'erreur
               echo "Erreur connexion: ".$e->getMessage();//afficher les messages d'erreur 
               
            }
        }
     
     }
?>

