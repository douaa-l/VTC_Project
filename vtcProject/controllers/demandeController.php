<?php
session_start();
require_once('../models/UserModel.php');
$matricule = $_SESSION['matricule'];
$userModel= new UserModel();
$statut='non certifier';
$etat='en cours de traitement';
$date=date('Y-m-d h:i:s', time());
$userModel->setDemande($statut,$etat,$date,$matricule);
header("Location: ../views/Accueil.php");
?>