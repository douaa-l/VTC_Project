<?php
session_start();
require_once ('../models/NotificationsModel.php');

$typeUser= $_SESSION['typeUser'];
$idAnnoce = $_GET['id'];

if(isset($_GET['matr'])){
    $matriculeSender =$_GET['matr'];
    echo 'boucle 1';
   
}else{
   
    $matriculeSender = $_SESSION['matricule'];
  echo 'boucl2';

}

$notifModel = new NotificationsModel();
$notifModel->setNotification($typeUser,$matriculeSender,$idAnnoce);
header('Location: ../views/Accueil.php');




?>