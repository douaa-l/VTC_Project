<?php
require_once ('../views/PageAdmin.php');
require_once ('../models/UserModel.php');
require_once ('../views/GestionTransporteur.php');

if(isset($_GET['id'])){
    $userModel= new UserModel();
    $id= $_GET['id'];
    $t= $_GET['t'];
    if($t=='client'){
       
         $userModel->EtatCompte($id);
        header('Location:ClientController.php');
    }elseif($t=='trans'){
     
        $userModel->EtatCompte($id);
        header('Location:TransporteurController.php');  
    }elseif($t == 'repo'){
        $GT = new GestionTransporteur();
        $GT->repondreDemande($id);

    }
  

}else{
    $viewAdmin= new PageAdmin();
    $viewAdmin->afficherPageAdmin("GestionUsers");
}

?>