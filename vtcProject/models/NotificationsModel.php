<?php
require_once('BddModel.php');

class NotificationsModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function setNotification($typeSender,$matricule,$idAnnonce){
      
         $requete = $this->conn->query("INSERT INTO notifications(SenderDemande,dateEnvoi,matriculeSender,idAnnonce) VALUES ('$typeSender',CURRENT_DATE,'$matricule','$idAnnonce')");
 
        
        }

  public function getNotif($idAnnonce,$matricule){
    $requete = $this->conn->query("SELECT * FROM  notifications WHERE idAnnonce= '$idAnnonce' AND matriculeSender='$matricule' ");
    $row = $requete->fetch();
    if($row!= false){
        return $row;
    }else{
        return 'vide';
    }
  }
  public function setReponse($Reponse,$idNotif){
    $requete = $this->conn->query("UPDATE   notifications SET reponse='$Reponse' WHERE idNotif='$idNotif'");
   
  }
       
  public function getAllNotifUser($typeUser, $matricule){
      if($typeUser == 'Transporteur'){
        $requete = $this->conn->query("SELECT * FROM  notifications WHERE  notifications.matriculeSender='$matricule' AND SenderDemande='Client'  ");
        $row = $requete->fetchAll();
      }
      else{
        $requete = $this->conn->query("SELECT idNotif,reponse,annonce.idAnnonce ,statutTransporteur,titreAnnonce,dateEnvoi,nom,prenom,tel,email,adresse,wilaya,matriculeSender FROM  notifications,annonce,utilisateur WHERE notifications.idAnnonce= annonce.idAnnonce AND 
        annonce.matricule= '$matricule' AND notifications.SenderDemande='Transporteur' AND utilisateur.matricule=notifications.matriculeSender");
        $row = $requete->fetchAll();
      }
   
    if($row!= false){
        if($typeUser == 'Transporteur'){
            if (is_array($row) || is_object($row)){

            foreach ($row as $line):
                $idAnnonce= $line['idAnnonce'];
                $requete = $this->conn->query("SELECT idAnnonce ,statutTransporteur,titreAnnonce, nom,prenom,tel,email,adresse,wilaya FROM  annonce,utilisateur WHERE  annonce.idAnnonce='$idAnnonce' AND utilisateur.matricule=annonce.matricule  ");
                $row = $requete->fetchAll();
            endforeach;
             }
        }

        return $row;
    }else{
        return 'vide';
    }
  }
}

?>