<?php

class Login {
public function afficherPageLogin($message){
?>

<!doctype html>
<html lang="fr">

     <head>

        <meta charset="utf-8">
        <title>Page Login </title>
        <link href="../Public/Login.css" rel="stylesheet" type="text/css"/>
        
     </head>

     

     <body>
     <div id="divLogo">
<img src="../Public/Logo1.jpg" id="Logo" alt="Logo Icon" />
</div>
<div class="wrapper fadeInDown">
 
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeInfirst">
      <img src="../Public/management.png" id="iconUser" alt="User Icon" />
    </div>

    <!-- Login Form -->
      <form action="../controllers/index.php?choix=1" methode="POST">
      <?php
                if($message !=''){
                    ?>
                    <p style=" color: crimson; margin-left:auto;margin-right:auto;"> <?=$message?>!</p>
                    <?php
                }
            ?>
      <input type="text" id="use" class="fadeIn second" name="username" placeholder="Pseudo">
      <input type="password" id="pass" class="fadeIn third" name="password" placeholder="Mot de passe">
      <input type="submit" name="sendIT" value="Connexion"  class="fadeIn fourth">
     
  
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Mot de passe oublié?</a>
    </div>

  </div>
</div>

     </body>
</html>










<?php  
} 
}


?>