<?php
require_once('BddModel.php');

class ObjetModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getAllObjet (){
      
         $requete = $this->conn->query("SELECT * FROM  objet");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }
        }
    public function getObjet($id){
        $requete = $this->conn->query("SELECT * FROM  objet WHERE idObjet= '$id'");
        $row = $requete->fetch();
        if($row!= false){
            return $row;
        }
     


    }
    public function inserteObjet($nomObj,$typeObj,$poid,$volume,$moyenTransport,$image)
    {
       $requete = $this->conn->query("INSERT INTO objet(nomObjet,typeObjet,poid,volume,moyenTransport,image) VALUES 
       ('$nomObj','$typeObj','$poid','$volume','$moyenTransport','$image')");
       $requete = $this->conn->query("SELECT idObjet FROM  objet WHERE nomObjet= '$nomObj' AND typeObjet='$typeObj' AND 
       poid='$poid' AND volume='$volume' AND moyenTransport='$moyenTransport'");
       $row = $requete->fetch();
       return $row;
    }
       
   
}

?>