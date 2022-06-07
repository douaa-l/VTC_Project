<?php
require_once ('../models/UserModel.php');
require_once ('../models/AnnoncesModel.php');
require_once ('../models/NewsModel.php');
require_once('Statistique.php');
$view = new Statistique();
$modelUser= new UserModel();
$nbUsers=$modelUser->countUser();
$modelNews= new NewsModel();
$nbNews=$modelNews->countNews();
$modelAnnonces= new AnnoncesModel();
$nbAnnonces=$modelAnnonces->countAnnonces();
$view->AfficherStatistique($nbUsers,$nbNews,$nbAnnonces);
?>