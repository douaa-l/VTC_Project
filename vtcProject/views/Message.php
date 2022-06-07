<?php
session_start();
require_once('PageAccueil.php');
require_once('../controllers/ContactController.php');
$v= new PageAccueil();
$controller= new ContactController();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"  style="width:90%;"-->
    <?php
    if(isset($_SESSION['matricule'])){
        $email= $_SESSION['mail'];
        $idUser=$_SESSION['matricule'];
        $login=true;
     //   $v->headerPageConnexion();
        $v->menuConnexion();
    }
    else {
        $login=false;
     //   $v->headerPage();
        $v->menu();
    }
    ?>
    <div class="marg">
    <div id="existepas">Message envoyer!</div>
    <?php
    if(isset($_POST['Contact'])){
    if($login == false){
        if(isset($_POST['email']) AND  isset($_POST['comment']) ){
            $email=$_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $controller->setMessages($_POST['email'],$_POST['comment']);
                 }else{
                     ?>
                    <div id="existepas">Véréfier le format de votre adresse mail!</div>
                    <?php
                 }
        }
        else{
            ?>
            <div id="existepas">Faut remplir les deux champs!</div>
            <?php
        }
    }
    else{
        if(isset($_POST['comment'])){
            $controller->setMessages($email,$_POST['comment']);
        }
        else{
            ?>
            <div id="existepas">Faut remplir le champs commentaire!</div>
            <?php
        }
    }
    }
    ?>
        <div>
    <?php
   
        $v->btnCommentCaMarche();
   

   ?>
    
   
    </div>
   

</body>
</html>



