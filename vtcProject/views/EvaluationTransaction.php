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
    <div><!--id="GlobalContainer"  style="width: 90%;"-->
    <?php
     if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        if($_SESSION['typeUser']=='Transporteur'){
            $evalue="Comment vous trouvez le Client ?";
        }
        else{
            $evalue="Comment vous trouvez le transporteur ?";
        }
        $login=true;
     //   $v1->headerPageConnexion();
        $v1->menuConnexion();
        if(isset($_GET['id'])){
            $idAnnonce =$_GET['id'];
           
        }
    }
    else {
        $login=false;
      //  $v1->headerPage();
        $v1->menu();
       
    }
    ?>
        <form class="form" ACTION="../controllers/EvaluationController.php" METHOD="POST" style="margin-top: 5%;">
      <div class="pageTitle title">Evaluer la Transaction </div>
      <div class="secondaryTitle title"><?php echo $evalue?></div>
  
          <input type="text" class="email formEntry"  name="note" placeholder="Note sur 20" pattern="[1-2][0-9]" required/>
      <textarea class="message formEntry" name="signale" placeholder="Signalement/Avis"></textarea>
      <input  name="idAnnonce" type="hidden" value="<?php  echo $idAnnonce; ?>" />
      <button class="submit formEntry" name="Transaction">Envoyer</button>
    </form>
   
</div>
</body>
</html>


