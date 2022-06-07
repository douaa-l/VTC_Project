<?php
require_once('BddModel.php');

class AdminModel{

    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }
    public function veréfierAdmin($pseudo, $password){
        $requete = $this->conn->query("SELECT * FROM  vtc WHERE pseudoAdmin='$pseudo' AND motDePasseAdmin='$password'");
        $this->rows = $requete->fetch();
        if($this->rows != false ){
            return $this->rows;
        }
        else{
            return "Utilisateur ou mot de passe inccorecte";
        }
        }


    }



?>