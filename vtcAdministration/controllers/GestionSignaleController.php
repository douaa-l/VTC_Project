<?php 


require_once('../views/GestionSignal.php');
require_once('../models/AnnoncesModel.php');
$model= new AnnoncesModel ();
$rows= $model->getAllSignal ();
$Gestion = new  GestionSignal ();
$Gestion-> GestionSignals( $rows );

?>
