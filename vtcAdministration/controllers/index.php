<?php
require_once('LoginController.php');
require_once('DeconnexionController.php');
require_once('../views/Login.php');
require_once ('../views/PageAdmin.php');
$viewAdmin= new PageAdmin();

if(isset($_REQUEST['sendIT'])){

    if(isset($_REQUEST['username']) AND isset($_REQUEST['password'])){
        $user =$_REQUEST['username'];
        $pass= $_REQUEST['password'];
   

        $LoginController = new LoginController();
        $LoginController->getLoginPage($user,$pass);
       
    
    }
    else{
        header("Location: ../views/Login.php?message=Faut remplir les deux champ");
    }
}
if(isset($_GET['page'])=='deconnexion'){
    $DeconnexionController= new DeconnexionController();
    $DeconnexionController->deconnexion();

}
if(isset($_GET['p']) =='1'){
    $viewAdmin->afficherPageAdmin("GestionContenu");
 
    
}

else{
    if(isset($_GET['message'])!= ''){
        $message='Pseudo ou mot de passe inccorecte';
    }
    else{
        $message='';
    }
    $view= new Login ();
    $view->afficherPageLogin($message);
}




?>