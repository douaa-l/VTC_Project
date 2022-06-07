<?php 


require_once('../views/GestionNews.php');
require_once('../models/NewsModel.php');
$model= new NewsModel ();
$rows= $model->getAllNews ();
$Gestion = new GestionNews ();
$Gestion-> GestionAllNews( $rows );

?>
