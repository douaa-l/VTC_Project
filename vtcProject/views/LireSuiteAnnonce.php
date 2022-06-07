<?php
session_start();
require_once('PageAccueil.php');
require_once('DetailAnnonce.php');
$v1= new PageAccueil();
$v2= new DetailAnnonce();
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
        $login=true;
     //   $v1->headerPageConnexion();
        $v1->menuConnexion();
    }
    else {
        $login=false;
      //  $v1->headerPage();
        $v1->menu();
    }
   
  
    if(isset($_GET['id'])){
        ?>
        <div id="detail">
            <?php
            $v2->detail($_GET['id']);
             ?>
        </div>
        <?php
    }
    else{
        echo 'notSetId';
    }


    ?>
</div>
</body>
</html>


