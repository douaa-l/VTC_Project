<?php
session_start();
require_once ('../models/UserModel.php');
require_once ('../models/TrajetModel.php');
require_once('Profil.php');
require_once('../controllers/AnnonceController.php');
if(isset($_SESSION['matricule']))
{
    $trajet=[];
    $id= $_SESSION['matricule'];
    $profil= new Profil($id);
    $UserModel= new UserModel();
    $control= new AnnonceController();
    $rows=$UserModel->getUser($id);
    if($rows['typeUtilisateur']=='Transporteur'){
      
        $TrajetModel=new TrajetModel();
        $matricule=$rows['matricule'];
        $trajet=$TrajetModel->getWilayaUser($matricule);
        $transaction=$control->getTransactiontransport($id);
        $profil->AfficherProfile ($rows,$trajet,$transaction);
       
          

       
    }
   else{
    $transaction=$control->getTransactionClient($id);
    $profil->AfficherProfile ($rows,$trajet,$transaction);
   }
    
}
else
{
echo "session not set de Profil";
}
?>