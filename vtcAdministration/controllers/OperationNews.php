<?php
session_start();
require_once('../models/NewsModel.php');
require_once('../views/ComposantNews.php');



$News= new NewsModel();
$Views = new ComposantNews();
$idNews=0;
if(isset($_GET['sup'])){
    $rows = $News->supprimer($_GET['sup']); 
    header("Location: NewsController.php");  

}

if(isset($_GET['ajou'])){ 
    $Views->ajouterNews('');
}

if(isset($_REQUEST['sendN'])){
    if(!empty($_REQUEST['titre']) AND !empty($_REQUEST['auteur'])){
        $titre =$_REQUEST['titre'];
        $auteur= $_REQUEST['auteur'];
        if(is_uploaded_file($_FILES["image"]["tmp_name"])){
            $image_tmp = $_FILES["image"]["tmp_name"];
            $image_size = $_FILES["image"]["size"];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $idNews=$News->ajouter($titre,$auteur,$image);

       $Views->ajoutSections($idNews);
        }else{
            echo 'no send photo';
        }
    } else{
       
        $Views->ajouterNews('Faut remplir tous les champ correctement !');
      }
}
else{
   // header("Location: ");
}
?>