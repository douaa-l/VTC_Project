<?php
session_start();
require_once('PageAccueil.php');
require_once('../models/CertificatModel.php');
$v= new PageAccueil();
$cert= new CertificatModel();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();


?>
<body>
    <div> <!--id="GlobalContainer"  style="width:90%;"-->
    <?php
    if(isset($_SESSION['matricule'])){
        $row['nom']=$_SESSION['nom'];
        $row['prenom']=$_SESSION['prenom'];
        $row['adresse']=$_SESSION['adresse'];
        $row['wilaya']=$_SESSION['wilaya'];
        $login=true;
       // $v->headerPageConnexion();
        $v->menuConnexion();
    }
    else {
        $login=false;
       // $v->headerPage();
        $v->menu();
    }
    ?>
    <div class="marg" style="width:100%;height:30rem;">
        <div class="news"  >
            <h2 style=" margin-right:auto;margin-left:auto;width:30%;">Demande de certificat VTC</h2>
            
                <?php
                $row=$cert->getCertificat('1'); ?>
                <div  style="width:80%; margin-top:5%;margin-left:10%;"><?=$row['discriptionCertificat'];?></div>
               
               
                <div class="divbtn1">   
                <a href="../controllers/demandeController.php" class="btn">Envoyer demande</a>
                <a href="../views/Accueil.php" class="btn">Ne pas ce certifier</a>
                  </div>
      
        </div><!--certificat-->
    </div><!--marg-->
    <?php
   
   $v->btnCommentCaMarche();


?>


</div>


</body>
</html>
