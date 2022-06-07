<?php 
session_start();
require_once('AfficherNews.php');
require_once('PageAccueil.php');
$v= new PageAccueil();
$view=new AfficherNews();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"  -->
    <?php
     if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        $login=true;
     //   $v->headerPageConnexion();
        $v->menuConnexion();
    }
    else {
        $login=false;
       // $v->headerPage();
        $v->menu();
    }
 
?>


    <div class="marg" style="height:80%; margin-left:7%;">
        
    <?php
    $var =1;
    if(isset($_GET['nb'])){
        ?>
        <div style="height:150rem;">
            <?php
        $nb=$view->AfficherAllNews($var,"",$_GET['nb']);
        ?>
        </div>
        <?php
    }else{
        ?>
        <div style="height:150rem;">
            <?php  
    $nb=$view->AfficherAllNews($var,"",0);}
    ?>
        </div>
        <?php
    if($nb == -1){
      
    }else{
    ?>

  
        <div style="margin-left:45%;" >
       <a href="javascript:history.go(-1)" > <img src="Public/suivant.png" style="width:38px;height:38px;margin-top:-4px; transform: rotate(180deg);"/></a>
       <a href="News.php?nb=<?php echo $nb; ?>" >    <img src="Public/suivant.png" style="width:37px;height:37px;margin-top:-4px;"/></a>
           
        </div>
    </div>
    <?php
   }
        $v->btnCommentCaMarche();
   

   
   
   ?>
    </div>
    <div style="margin-top:7rem;">
   <?php
    
    if($login == true){
        $v->footerPageConnexion();   
       }
       else{
        $v->footerPage();
       }
   ?>
   <div>

</body>
</html>