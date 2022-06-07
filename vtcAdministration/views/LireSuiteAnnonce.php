<?php
session_start();
require_once('PageAccueil.php');
require_once('DetailAnnonce.php');
$v1= new PageAccueil();
$v2= new DetailAnnonce();
?>


<!doctype html>
<html lang="fr">

<head>  <link href="../controllers/Public/Style.css" rel="stylesheet" type="text/css"/>
    <link href="../controllers/Public/StyleSuit.css" rel="stylesheet" type="text/css"/>
    <link href="../controllers/Public/StyleSuite2.css" rel="stylesheet" type="text/css"/>
    <link href="../controllers/Public/Suite3.css" rel="stylesheet" type="text/css"/>
    <link href="../controllers/Public/StyleSuite4.css" rel="stylesheet" type="text/css"/></head>
<body>
    <div id="GlobalContainer"  style="width: 90%;">
    <?php
    
   
  
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
    
    }


    ?>
</div>
</body>
</html>


