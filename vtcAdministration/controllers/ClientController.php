<?php 


require_once('../views/GestionClient.php');
require_once('../models/UserModel.php');
$model= new UserModel ();
$rows= $model->getAllClient ();
$Gestion = new  GestionClient ();
$Gestion-> GestionClients ( $rows );



?>
