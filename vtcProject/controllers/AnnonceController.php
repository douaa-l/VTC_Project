<?php
require_once('../models/AnnoncesModel.php');
require_once('../models/NotificationsModel.php');

class AnnonceController{
    private  $AnnoncesModel;
    private $Annonces;
    private $notif;
    public function __construct(){
        $this->AnnonceModel = new AnnoncesModel ();
        $this->notif= new NotificationsModel ();

    }
     
public function getAnnonces (){

    
    $this->Annonces =$this->AnnonceModel->getAllAnnonce();
   return $this->Annonces;      
}
public function getAnnonce($id){
    $Annonce=$this->AnnonceModel->getAnnonce($id);
    return $Annonce;

}
public function rechercherAnnonce($depart,$arriver){
    $Annonce=$this->AnnonceModel->rechercherAnnonce($depart,$arriver);
    return $Annonce;
}
public function getAnnoncesUser($idUser){
    $Annonce=$this->AnnonceModel->getAnnoncesUser($idUser);
    return $Annonce;
}
public function verifiyPostuleAnnonce ($idAnnonce,$matricule){
    $reslt= $this->notif->getnotif($idAnnonce,$matricule);
    return $reslt;
}
public function getTransactiontransport ($matricule){
    $transaction =  $this->AnnonceModel->getTransactionTransport($matricule);
    return $transaction;
}
public function getTransactionClient($idUser){
    $transaction =  $this->AnnonceModel->getTransactionClient($idUser);
    return $transaction;
}

}
?>