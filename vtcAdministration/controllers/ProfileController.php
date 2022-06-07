<?php
session_start();
require_once ('../models/UserModel.php');
require_once ('../models/TrajetModel.php');
require_once('../views/Profil.php');
if(isset($_GET['id']))
{
    $trajet=[];
    $id= $_GET['id'];
    $profil= new Profil($id);
    $UserModel= new UserModel();
    $rows=$UserModel->getUser($id);
    if($rows['typeUtilisateur']=='Transporteur'){
      
        $TrajetModel=new TrajetModel();
        $matricule=$rows['matricule'];
        $trajet=$TrajetModel->getWilayaUser($matricule);
        $profil->AfficherProfile ($rows,$trajet,$id);
    }
   else{
    $profil->AfficherProfile ($rows,$trajet,$id);
   }
    
}
else
{
echo "session not set de Profil";
}
?>