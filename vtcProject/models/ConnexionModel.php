<?php
require_once('BddModel.php');

class ConnexionModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function verefieUser ($email,$password){
      
         $requete = $this->conn->query("SELECT * FROM utilisateur WHERE email='$email' AND motDePasse='$password'");
        $this->rows = $requete->fetch();
        if($this->rows != false ){
            if($this->rows['bannier']=='1'){
                return "Utilisateur banni par l'administrateur";
            }else{
                return $this->rows;
            }
            
        }
        else{
            return "Utilisateur ou mot de passe inccorecte";
        }
        }
 
   
}

?>