<?php
require_once('../models/AnnoncesModel.php');

$model = new AnnoncesModel();
if(isset($_GET['id'])){
    $model->archiverAnnonce($_GET['id']);
    header('Location: ../views/ProfileController.php');
     
}
else{
    echo 'notSet idAnnonce';
}
?>