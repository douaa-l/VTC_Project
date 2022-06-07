<?php
require_once('BddModel.php');

class AnnoncesModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }
  public function getTransactionTransport($matricule){
    $requete = $this->conn->query("SELECT * FROM  transaction WHERE matriculeTransport= '$matricule'");
    $this->rows = $requete->fetchAll();
    
    if($this->rows != false ){
        return $this->rows;
        }else{
            return 'vide';
        }
  }
  public function setAvaluation ($note,$signalement,$idAnnonce,$typeUser){
    if($typeUser=="Transporteur"){
        $requete = $this->conn->query("UPDATE transaction SET clientSignal='1', signalementClient='$signalement',
        notClient='$note' WHERE idAnnoce='$idAnnonce'");
    }
    else{
        $requete = $this->conn->query("UPDATE transaction SET transporteurSignal='1', signalementTrans='$signalement',
        noteTrans='$note' WHERE idAnnoce='$idAnnonce'");
    }

  }
  public function getTransactionClient($matricule){
    $requete = $this->conn->query("SELECT * FROM  transaction,annonce WHERE annonce.idAnnonce=transaction.idAnnoce AND matricule='$matricule'");
    $this->rows = $requete->fetchAll();
    
    if($this->rows != false ){
        return $this->rows;
        }else{
            return 'vide';
        }
  }
    public function   setEtatDemande($idAnnonce,$etat){
       
        $requete = $this->conn->query("UPDATE annonce SET etatAnnonce= '$etat' WHERE idAnnonce='$idAnnonce'");
   }
   public function setTransaction ($idAnnonce,$idTransporteur){
    $requete = $this->conn->query("INSERT INTO transaction (transporteurSignal,clientSignal,matriculeTransport,idAnnoce) 
    VALUES ('0','0','$idTransporteur','$idAnnonce')");
   }
    public function getAllAnnonce (){
       
         $requete = $this->conn->query("SELECT * FROM  annonce WHERE etatAnnonce!= 'Non validée par admin'");
        $this->rows = $requete->fetchAll();
     
            if($this->rows != false ){
            return $this->rows;
            }
    }
    

        public function getAnnonce($id){
        $requete = $this->conn->query("SELECT * FROM  annonce WHERE idAnnonce= '$id'");
        $row = $requete->fetch();
            if($row!= false){
            return $row;
            }

        }
    public function rechercherAnnonce($depart,$arriver){
       
        $requete = $this->conn->query("SELECT * FROM  annonce WHERE adresseDepart='$depart'  AND adresseArriver='$arriver'");
        $row = $requete->fetchAll();
            if($row!= false){
            return $row;
            }
            else{return "N 'existe pas";}
    }    
    public function getAnnoncesUser($idUser){
        $requete = $this->conn->query("SELECT * FROM  annonce WHERE matricule='$idUser'  AND archiver!='1'");
        $row = $requete->fetchAll();
            if($row!= false){
            return $row;
            }
            else{return "Vous avez aucune annonce pour l'instant";}

    }
    public function rechercherAnnonceUser($idUSer,$depart,$arriver){
       
        $requete = $this->conn->query("SELECT * FROM  annonce WHERE matricule='$idUser' AND adresseDepart='$depart'  AND adresseArriver='$arriver'");
        $row = $requete->fetchAll();
            if($row!= false){
            return $row;
            }
            else{return "N 'existe pas";}
    }    
       
   public function supprimerAnnonce($idAnnonce){
    $requete = $this->conn->query("DELETE FROM  annonce WHERE idAnnonce='$idAnnonce' ");

   }
   public function archiverAnnonce($idAnnonce){
    $requete = $this->conn->query("UPDATE annonce SET archiver='1' WHERE idAnnonce='$idAnnonce' ");

   }
   public function countAnnonces (){
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce ");
    $count = $requete->fetchColumn();
    $result['totale']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce WHERE YEAR(dateCreation) = '2021'");
    $count = $requete->fetchColumn();
    $result['2021']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce WHERE YEAR(dateCreation) = '2020'");
    $count = $requete->fetchColumn();
    $result['2020']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce WHERE YEAR(dateCreation) = '2019'");
    $count = $requete->fetchColumn();
    $result['2019']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce WHERE YEAR(dateCreation) = '2018'");
    $count = $requete->fetchColumn();
    $result['2018']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM annonce WHERE YEAR(dateCreation) = '2017'");
    $count = $requete->fetchColumn();
    $result['2017']=$count;
    return $result;
   }
   public function insertAnnonce($titre,$adrDepart,$adrArriver,$garantir,$matricule,$idObj){
    $requete = $this->conn->query("INSERT INTO annonce(titreAnnonce,adresseDepart,adresseArriver,etatAnnonce,dateCreation,archiver,
    garantir,matricule,idObjet) VALUES 
    ('$titre','$adrDepart','$adrArriver','Non validée par admin',CURRENT_DATE,'0','$garantir','$matricule','$idObj')");
   }
}

?>