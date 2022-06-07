<?php
session_start();

require_once ('../models/NotificationsModel.php');
require_once('../views/Annonce.php');
require_once('../views/PageAccueil.php');


$notifModel= new NotificationsModel();
$annonceview = new Annonce ();

$matricule =$_SESSION['matricule'];
$typeUser=$_SESSION['typeUser'];

if($typeUser == 'Transporteur'){
    $notif= "Demandes des clients";
}
else{
    $notif= "Offres des transporteurs";
}
$row = $notifModel->getAllNotifUser($typeUser, $matricule);


$annonceview->AfficherNotifications( $notif,$row);



?>