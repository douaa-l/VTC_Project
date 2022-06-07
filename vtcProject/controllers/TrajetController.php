<?php
session_start();
require_once ('../models/TrajetModel.php');
$trajetModel= new TrajetModel();
function tarifTransport($wilayaArrriver)
{
	if($wilayaArrriver == 'Alger'|| $wilayaArrriver=='Oran'||$wilayaArrriver=='Annaba'){
        $tarif=0.5;
    }elseif($wilayaArrriver == 'Batna'|| $wilayaArrriver=='Constantine'||$wilayaArrriver=='Skikda'){
        $tarif=0.4;
    }
    else {
     $tarif=0.3;
    }
    return $tarif;
}

if(isset($_GET['supp'])){
  
$matricule=$_SESSION['matricule'];
$wilaya=$_GET['supp'];
$trajetModel->supprimerWilayaUser($wilaya,$matricule);
header('Location: ../views/ProfileController.php');


}

if(isset($_REQUEST['submitAjout']) ){
    if(isset($_REQUEST['wilaya']) ) {
        $wilaya=$_REQUEST['wilaya'];
        $tarif=tarifTransport($_POST['wilaya']);
        $matricule=$_SESSION['matricule'];
       $etat= $trajetModel->ajouterWilayaUser($wilaya,$tarif,$matricule);
       echo $etat;
    
        header('Location: ../views/ProfileController.php');
          
      

    }

}

?>