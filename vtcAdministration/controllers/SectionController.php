<?php
session_start();
require_once('../models/NewsModel.php');
require_once('../views/ComposantNews.php');
$News= new NewsModel();
$Views = new ComposantNews();

if(isset($_REQUEST['sendS'])){

    if(!empty($_REQUEST['titre']) AND !empty($_REQUEST['des']) AND !empty($_REQUEST['titremedia'])AND !empty($_REQUEST['idNews'])){
        $titre =$_REQUEST['titre'];
        $des= $_REQUEST['des'];
        $ima =$_REQUEST['titremedia'];
        $idNews=$_REQUEST['idNews'];
        if(!empty($_FILES) && isset($_FILES['image'] ["tmp_name"])){
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_size = $_FILES["image"]["size"];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
           $News->ajouterSection($titre,$des,$image,$ima,$idNews);
        
        $rows=$News->getSectionsNews($idNews);
        $Views->afficherSection($rows);
        
       
        }
        else{
         
        echo"no image";
           
        }
    
      
       
    
    }else{}
   
    }
    elseif(isset($_GET['idNews'])){
        if(isset($_GET['ajout'])){
            $Views->ajoutSections($_GET['idNews']);
        }else{
            $rows=$News->getSectionsNews($_GET['idNews']);
            $Views->afficherSection($rows);
         
        }
       

    }elseif(isset($_GET['id'])){
        $id = $_GET['id'];
        $idNews= $News->deleteSection($id);
         $idNews=$idNews['idNews'];
         $rows=$News->getSectionsNews($idNews);
          $Views->afficherSection($rows);
    }
  
?>