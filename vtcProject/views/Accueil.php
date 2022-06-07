<?php
session_start();
require_once('Annonce.php');
require_once('PageAccueil.php');
require_once('../controllers/AnnonceController.php');
$v= new PageAccueil();
$view=new Annonce();
$control= new AnnonceController();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"-->
     
    <?php
  
     if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        if($_SESSION['typeUser']== 'Transporteur'){
            $transaction=$control->getTransactiontransport($idUser);

        }else{
            $transaction=$control->getTransactionClient($idUser);
        }
       
        $login=true;
     //   $v->headerPageConnexion();
    }
    else {
        $login=false;
     //   $v->headerPage();
    }
  
   
        
    $v->diaporama();
   if($login == true){
    $v->menuConnexion();   
   }
   else{
    $v->menu();
   }
  
    $v->recherche();
   

    ?>
    <div class="marg">
        
    <?php
    if($login == true){
        ?>
         <label>
        <a href="AjouterObjet.php" > <img src="Public/ajouter.png" style="width:70px;height:70px;margin-top:-4px; "/></a>
      
        </label>
        <?php
    }
    if(isset($_GET['pro'])){
        if($_GET['pro']==1){
            $mes = "pas Transport";
        }
        else{
            $mes = "pas notif";
        }
        
    }
    else{
        $mes="";
    }
    $var =1;
    if(isset($_GET['nb'])){
        $nb=$view->AfficherAnnonce($var,$mes,"",$_GET['nb'],$transaction);
    }else{

    $nb=$view->AfficherAnnonce($var,$mes,"",0,'');}
    if($nb == -1){
     
    }else{
    ?>

  
        <div style="margin-left:45%;">
       <a href="javascript:history.go(-1)" > <img src="Public/suivant.png" style="width:38px;height:38px;margin-top:-4px; transform: rotate(180deg);"/></a>
       <a href="Accueil.php?nb=<?php echo $nb; ?>" >    <img src="Public/suivant.png" style="width:37px;height:37px;margin-top:-4px;"/></a>
           
        </div>
        <div>
    <?php
   }
        $v->btnCommentCaMarche();

        if($login == true){
            $v->footerPageConnexion();   
           }
           else{
            $v->footerPage();
           }
          
   

   ?>
    
   
    </div>
   

</body>
</html>



