<?php
session_start();

require_once ('../models/AnnoncesModel.php');
require_once ('../models/TrajetModel.php');
require_once('../views/Annonce.php');
require_once('../views/PageAccueil.php');


$Annonce= new AnnoncesModel();
$trajet= new TrajetModel();
$view = new Annonce();
if(isset($_GET['id'])){
   $row =$Annonce->getAnnonce($_GET['id']);
   $adrDepart = $row['adresseDepart'];
   $adrArriver = $row['adresseArriver'];

   
   $matriculeAdr= $trajet->getMatriculeSelonTrajet($adrDepart,$adrArriver);
   if($matriculeAdr == "no transport"){
      header('Location: ../views/Accueil.php?pro=1');
   }else{
   
       $view->ProposerTransporteurs($matriculeAdr,$_GET['id']);
   }



}







?>