<?php
session_start();
require_once('../models/AnnoncesModel.php');
if(isset($_POST['Transaction'])){
    if(empty($_POST['note']) || empty($_POST['signale']) ){
        //header("../views/EvaluationTransaction.php?id= $_POST['idAnnonce'];");
        echo 'test';
    }
    else {
        $note= $_POST['note'];
        $signale= $_POST['signale'];
        $idAnnonce = $_POST['idAnnonce'];
        $typeUser= $_SESSION['typeUser'];
        $model= new AnnoncesModel();
       $model->setAvaluation ($note,$signale,$idAnnonce,$typeUser);
     header("Location:../views/Accueil.php");
    }

}
?>