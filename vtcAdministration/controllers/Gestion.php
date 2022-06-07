<?php 



require_once('../models/AnnoncesModel.php');
if(isset($_GET['id'])){
    $model= new AnnoncesModel ();
    $model->setEtatAnnonce ($_GET['id']);
    header('Location:GestionAnnonceController.php');
}



?>
