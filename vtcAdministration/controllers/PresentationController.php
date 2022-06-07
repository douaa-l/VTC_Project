<?php
session_start();
require_once('../models/vtcModel.php');

$vtc= new vtcModel();


if(isset($_REQUEST['sendP'])){

    if(!empty($_REQUEST['titre']) AND !empty($_REQUEST['des'])){
        $titre =$_REQUEST['titre'];
        $des= $_REQUEST['des'];
        
        if(is_uploaded_file($_FILES["image"]["tmp_name"])){
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_size = $_FILES["image"]["size"];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            
            if(is_uploaded_file($_FILES["video"]["tmp_name"])){
                $video = addslashes(file_get_contents($_FILES['video']['tmp_name']));
            
                $vtc->updatePresentation($titre,$des,$image,$video);
                
                header('Location:homeController.php');
                
            }
            
           
        }
    
   
    }
}
?>