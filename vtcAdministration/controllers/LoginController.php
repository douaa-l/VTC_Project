<?php
session_start();
require_once ('../models/BddModel.php');
require_once ('../models/AdminModel.php');
require_once ('../views/PageAdmin.php');

class LoginController{



    public function getLoginPage($user,$pass){

            $AdminModel = new AdminModel();
            $row=$AdminModel->veréfierAdmin($user, $pass);
            if($row=="Utilisateur ou mot de passe inccorecte"){
                header("Location:index.php?message=1");
            }
            else{
                $_SESSION['idAdmin']=$row['idAdminVtc'];
                $_SESSION['pseudoAdmin']=$row['pseudoAdmin'];
                $_SESSION['motDePasseAdmin']=$row['motDePasseAdmin'];
                header('Location:homeController.php');
    
            }

    }
}


?>