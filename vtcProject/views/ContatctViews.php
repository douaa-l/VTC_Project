<?php 
session_start();
require_once('../controllers/ContactController.php');
require_once('PageAccueil.php');
class ContactViews{
    public function AfficherContactPage(){
$v= new PageAccueil();
$ContactController= new ContactController();

?>
<!doctype html>
<html lang="fr">

<head>
<link href="Public/Style.css" rel="stylesheet" type="text/css"/>
    <link href="Public/StyleSuit.css" rel="stylesheet" type="text/css"/>
    <link href="Public/StyleSuite2.css" rel="stylesheet" type="text/css"/>
    <link href="Public/Suite3.css" rel="stylesheet" type="text/css"/>
    <link href="Public/StyleSuite4.css" rel="stylesheet" type="text/css"/>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</head>


<body>
    <div > <!--id="GlobalContainer"  style="width: 90%;"-->
     
         <?php
             if(isset($_SESSION['matricule'])){
              $idUser=$_SESSION['matricule'];
              $login=true;
            //  $v->headerPageConnexion();
              $v->menuConnexion();
          
          }
          else {
              $login=false;
            //  $v->headerPage();
              $v->menu();
          }
          $Tel=$ContactController->getContact('Tel');
          $Email=$ContactController->getContact('Email');
          $Adresse=$ContactController->getContact('Adresse');
          ?>
         

          <div class="container-fluid">
          <h1 class="text-center">Contact Address</h1>
          <hr>
           <div class="row">
            <iframe src="https://www.google.com/maps/embed/v1/place?q=oued+samar+Alger&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
              <div class="row text-center">
                <div class="col-4 box1 pt-4">
                  <a href="tel:+123456789"><i class="fas fa-phone fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">Téléphone</h3>
                  <p class="d-none d-lg-block d-xl-block"><?=$Tel['contact'] ?></p></a>
                </div>
                <div class="col-4 box2 pt-4">
                  <a href=""><i class="fas fa-home fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">Adresse</h3>
                  <p class="d-none d-lg-block d-xl-block"><?=$Adresse['contact'] ?></p></a>
                </div>
                <div class="col-4 box3 pt-4">
                  <a href="mailto:test@test.com"><i class="fas fa-envelope fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">E-mail</h3>
                  <p class="d-none d-lg-block d-xl-block"><?=$Email['contact'] ?></p></a>
                </div>
              </div>
          </div>
          
          <form class="form" ACTION="Message.php" METHOD="POST" style="margin-top: 5%;">
      <div class="pageTitle title">Nous Contacter </div>
      <div class="secondaryTitle title">Nous somme toujours à votre écoute.</div>
      <?php
        if($login == false){
          ?>
          <input type="text" class="email formEntry" placeholder="Email" name="email"/>
          <?php
        }
      ?>
      
      <textarea class="message formEntry" placeholder="Message" name="comment"></textarea>
      <?php
        if($login == false){
          ?>
              <input type="checkbox" class="termsConditions" value="Term">
      <label style="color: grey" for="terms">  <span style="color: #0e3721">Première fois sur le site</span> </label><br>
          <?php
        }
      ?>
      
      <button class="submit formEntry" name="Contact">Envoyer</button>
    </form>
       


<?php

}
}
?>