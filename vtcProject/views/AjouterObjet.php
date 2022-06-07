<?php
session_start();
require_once('PageAccueil.php');

$v1= new PageAccueil();
?>
<!doctype html>
<html lang="fr">

<?php

$v1-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"  style="width: 90%;"-->

    <?php
     if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        $login=true;
       // $v1->headerPageConnexion();
        $v1->menuConnexion();
    }
    else {
        $login=false;
       // $v1->headerPage();
        $v1->menu();
    }
 ?>
 <div class="marg" style=" height: 100rem;">
    <form  class= "form" action="../controllers/ObjetController.php?c=1" method="POST" style=" max-width:50%;margin-top: 5%;" enctype="multipart/form-data">
    
   
        <img src ="Public/Logo1.jpg" style="width:40%;height:40%; margin-left: 30%;">
        <hr style="border: 2px solid #335449; width:90%; margin-right:auto;margin-left:auto;"/>
        <?php
                if(isset($_GET['message'])){
                    if($_GET['message']== '1'){
                        echo "<p style='color:red; margin-left:35%;'>Faut remplir tous les champs!</p>";
                    }
                    else{
                      if($_GET['message']== '2'){
                        echo "<p style='color:red; margin-left:15%;'>L'objet ne peut pas etre transmi par le moyen de transport choisie (véréfie poids/volume)</p>";
                      }
                    
                     
                    }
                  
                       
                       
                }
                ?>
                <h2 style="margin-left:15%;">L'objet de l'annonce:</h2>
        <div class= "inputName">
        <label  >Nom Objet:</label>
        <input type="text" class="email formEntry" placeholder="Nom de l'objet" name="nomObj"/>
        <input type="text" class="email formEntry" placeholder="Type de l'objet" name="typeObj"/>
        </div>
        <div class= "inputName">
        <label  >Poids de l'objet:</label>
        <select name="poid2" style="width:15%;height: 35px;" >
                
                <option value="KG"> KG </option>
                <option value="G"> G</option>
            </select>
             <input type="number" class="email formEntry" placeholder="Poids" name="poid1"/>
          
           
        </div>
        <div class= "inputName">
        <label  >Volume de l'objet:</label>
        <select name="volm1" style="width:15%;height: 35px;" >
                
                <option value="M">M </option>
                <option value="CM"> CM</option>
            </select>
              <input type="number" class="email formEntry" placeholder="Largeur" name="larg"/>
                <input type="number" class="email formEntry" placeholder="Hauteur" name="haut"/>
           
        </div>
        <div class= "inputName">
        <label  >Moyen de transport:</label>
        <select name="moyenTransport" style="width:35%;height: 35px;" >
                
                <option value="Voiture"> Voiture </option>
                <option value="Camion"> Camion </option>
                <option value="Motos"> Motos </option>
            </select>
        </div>
        <div class= "inputName">
        <label for="avatar">Ajouter une image:</label>

        <input type="file" id="avatar" name="imageObj" accept="image/png, image/jpeg">
        </div>
        <button class="submit formEntry" name="AjoutObjet">Valider l'ajout</button>

</form>
       

              
 </div>
 <?php    
$v1->btnCommentCaMarche();

if($login == true){
    $v1->footerPageConnexion();   
   }
   else{
    $v1->footerPage();
   } 
   ?>
</body>
</html>