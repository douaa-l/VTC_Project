<?php
session_start();
require_once('../models/vtcModel.php');
require_once('../views/GestionContact.php');

$vtc= new vtcModel();
$Views = new GestionContact();

if (isset($_GET['sup'])){
$id= $_GET['sup'];
$vtc->supprimer($id);
header('Location:ContactController.php');
}elseif(isset($_GET['modif']) || isset($_GET['ajou']) == 1)
{
if(isset($_GET['modif'])){
    $Views->modifContact($_GET['type']);
}else{
    header('Location:ContController.php');
  
}
}elseif(isset($_REQUEST['modifDonne'])){
    if(!empty($_REQUEST['typeContact']) AND !empty($_REQUEST['input'])){
        $type =$_REQUEST['typeContact'];
        $input= $_REQUEST['input'];
    
       $vtc->updateContact($type,$input);
       header('Location:ContactController.php');
    
    }
    
}if(isset($_REQUEST['ajoutContact'])=='Ajouter'){
    if(!empty($_REQUEST['input']) || !empty($_REQUEST['contactSelect'])){
        $type =$_REQUEST['contactSelect'];
        $input= $_REQUEST['input']; 
        $vtc->ajouterContact($type,$input);
        header('Location:ContactController.php');
     
    }
}
else{

    $rows=$vtc->getAllContact();
    $Views->afficherContact($rows);
}
?>