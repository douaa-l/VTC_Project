<?php
require_once('BddModel.php');

class UserModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getAllClient (){
      
         $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE 	typeUtilisateur='Client'");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }
        }
        public function   getAllTransporteur(){
      
            $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE 	typeUtilisateur='Transporteur'");
           $this->rows = $requete->fetchAll();
           if($this->rows != false ){
               return $this->rows;
           }
           }
    
        public function getUser($mat){
            $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE matricule= '$mat'");
            $row = $requete->fetch();
            if($row!= false){
                return $row;
            }
            else{
                return("user n'existe pas ");
            }
    
        } 
        public function RponseDemande($id,$type,$piece){
            $requete = $this->conn->query("UPDATE utilisateur SET typeReponse='$type',pieceJointe='$piece',etatDemande='$type'
            WHERE matricule= '$id'");
        }
        public function EtatCompte($id) {
            $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE matricule= '$id'");
            $row = $requete->fetch();
            if($row['bannier']=='0'){
                $requete = $this->conn->query("UPDATE utilisateur SET bannier='1' WHERE matricule= '$id'");
            }
            else{
                $requete = $this->conn->query("UPDATE utilisateur SET bannier='0' WHERE matricule= '$id'");
            }
    
        }  
 
}

?>