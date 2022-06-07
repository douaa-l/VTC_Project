<?php
require_once('BddModel.php');

class TrajetModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function setWilaya ($wilaya,$tarif,$matricule){
           
         $requete = $this->conn->query("INSERT INTO arriver (wilaya,tarifTrans,matricule) VALUES ('$wilaya','$tarif','$matricule')");

        }
    public function deleteWilayaUser ($id){
        $requete = $this->conn->query("DELETE from arriver WHERE matricule='$id' ");   
    }
    public function getWilayaUser($matricule){
        $requete = $this->conn->query("SELECT * FROM  arriver WHERE matricule='$matricule'");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }else{ return 'vide';}
    }
    public function supprimerWilayaUser($wilaya,$matricule){
        $requete = $this->conn->query("DELETE  FROM  arriver WHERE matricule= '$matricule' AND wilaya='$wilaya'");
    }

    public function ajouterWilayaUser($wilaya,$tarif,$matricule){
        $requete = $this->conn->query("SELECT * FROM  arriver WHERE matricule='$matricule' AND wilaya='$wilaya'");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return 'Existe déja cette wilaya dans la liste';
        }else{
        $requete = $this->conn->query("INSERT INTO arriver(wilaya,tarifTrans,matricule) VALUES ('$wilaya','$tarif','$matricule')");
            return 'Ajouter';}
       
    }
    public function getMatriculeSelonTrajet($adrDepart,$adrArriver){
        $requete = $this->conn->query("SELECT * FROM  arriver, utilisateur WHERE  utilisateur.wilaya='$adrDepart' AND arriver.wilaya='$adrArriver'
        AND utilisateur.matricule= arriver.matricule");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }
        else{
            return'no transport';
        }

    }
}

?>