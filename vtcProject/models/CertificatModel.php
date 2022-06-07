<?php
require_once('BddModel.php');

class CertificatModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getCertificat ($id){
      
         $requete = $this->conn->query("SELECT * FROM  certificat WHERE idCertificat='$id'");
        $this->rows = $requete->fetch();
        if($this->rows != false ){
            return $this->rows;
        }
        }

  
       
   
}

?>