<?php 
require_once('AfficherNews.php');
require_once('PageAccueil.php');
$v= new PageAccueil();

?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div  ><!--id="GlobalContainer" style="width:90%; height: 80rem;"-->
    <?php
  //  $v->headerPage();
    $v->menu();
?>


<div class="marg" style=" height: 35rem;">

            <!-- zone de connexion -->
           
            
            <form  class= "form" action="VerificationConnexion.php" method="POST" style=" margin-top: 5%;">
            <?php
                if(isset($_GET['message'])){
                    ?>
                    <p style=" color: crimson; margin-left:19%;"> <?=$_GET['message']?>!</p>
                    <?php
                }
            ?>

            <div class="pageTitle title">Bienvenue!</div>
    
              <input type="text" class="email formEntry" placeholder="Adresse mail" name="email"/>
              <input type="password" class="email formEntry" placeholder="Mot de passe" name="password"/>
           
              <button class="submit formEntry" name="Connexion">Connexion</button>
              <a href="#" class="secondaryTitle title" >Mot de passe oublier!</a>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                        
                }
                ?>
            </form>

    
</div>
    <?php
   
        $v->btnCommentCaMarche();    
        $v->footerPage();
   ?>
    
   
    </div>
   

</body>
</html>