<?php 


require_once('../views/GestionTransporteur.php');
require_once('../models/UserModel.php');
$model= new UserModel ();
$rows= $model->getAllTransporteur ();
$Gestion = new  GestionTransporteur();
$Gestion-> GestionTransporteurs ( $rows );

?>
