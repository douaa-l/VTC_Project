<?php
require_once('Annonce.php');
require_once('PageAccueil.php');
$v= new PageAccueil();
$view=new Annonce();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"-->
    <?php
    $v->headerPage();
   
        
    $v->diaporama();
   
    if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        $login=true;
       // $v->headerPageConnexion();
        $v->menuConnexion();
    }
    else {
        $login=false;
       // $v->headerPage();
        $v->menu();
    }
    $v->recherche();
    ?>
    <div class="marg">
        
    <?php
    if(isset($_GET['nb'])){
        if(isset($_POST['depart']) AND  isset($_POST['arriver']) ){
            
            if($login == true){
                $var=4;}else{$var=2;}
             $nb=$view->AfficherAnnonce($var,$_POST['depart'],$_POST['arriver'],$_GET['nb']);
        }
       
        else{
            echo"ttttt";
        }
       
    }else{
        if(isset($_POST['Rechercher'])){
            if(isset($_POST['depart']) AND  isset($_POST['arriver']) ){

                if($login == true){
                    $var=4;}else{$var=2;}
                $nb=$view->AfficherAnnonce($var,$_POST['depart'],$_POST['arriver'],0);
            }
            else{
                echo"ttttt";
            }
        }
    }
    if($nb == -1){
        ?>
        <div style="margin-left:45%;">
        <a href="javascript:history.go(-1)" > <img src="Public/suivant.png" style="width:38px;height:38px;margin-top:-4px; transform: rotate(180deg);"/></a>
        </div>
        <?php
    }else{
    ?>

        <div style="margin-left:45%;">
       <a href="javascript:history.go(-1)" > <img src="Public/suivant.png" style="width:38px;height:38px;margin-top:-4px; transform: rotate(180deg);"/></a>
       <a href="Accueil.php?nb=<?php echo $nb; ?>&&depart=<?php echo $_POST['depart']; ?>&&arriver=<?php echo $_POST['arriver']; ?>" >    <img src="Public/suivant.png" style="width:37px;height:37px;margin-top:-4px;"/></a>
           
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



