<?php
require_once('BddModel.php');

class PresentationModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getPresentation (){
      
         $requete = $this->conn->query("SELECT * FROM  vtc WHERE idAdminVtc= '1'");
        $this->rows = $requete->fetch();
        if($this->rows != false ){
            return $this->rows;

        }
        }
    public function getMedia($type)
    {
        $requete = $this->conn->query("SELECT * FROM  media WHERE typeMedia= '$type'");
        $rowsm = $requete->fetchAll();
        if($rowsm != false ){
            return $rowsm;
        }

    }
       
   
}

?>