<?php 


require_once('../views/GestionAnnonce.php');
require_once('../models/AnnoncesModel.php');
$model= new AnnoncesModel ();
$rows= $model->getAllAnnonce ();
$Gestion = new  GestionAnnonce ();
$Gestion-> GestionAnnonces( $rows );

?>
