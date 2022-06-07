<?php
session_start();
require_once ('../models/NotificationsModel.php');
require_once ('../models/AnnoncesModel.php');
$notif= new NotificationsModel();
$anoonce= new AnnoncesModel();
if(isset($_GET['r'])){
    if($_GET['r']==1){
        $response = 'Accepter';
        $idAnnonce= $_GET['idAnnonce'];
        $anoonce->setEtatDemande($idAnnonce,"en route");
        $anoonce->setTransaction($idAnnonce,$_GET['trans']);
    }elseif($_GET['r']==2){
        $response = 'Refuser';
    }
    $idNotif=$_GET['id'];
}
$notif-> setReponse($response,$idNotif);
header('Location: ../views/Notification.php');




?>