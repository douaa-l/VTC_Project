<?php
session_start();
require_once('../models/ConnexionModel.php');

$model = new ConnexionModel();


if(isset($_POST['Connexion'])){
    if(isset($_POST['email'])  AND  isset($_POST['password'])  ){
        echo $_POST['email'];
        echo $_POST['password'];
       $reponse= $model->verefieUser($_POST['email'],$_POST['password']);
       echo $reponse;
       if ($reponse != "Utilisateur ou mot de passe inccorecte" AND $reponse != "Utilisateur banni par l'administrateur" ){
        $_SESSION['matricule']=$reponse['matricule'];
        $_SESSION['mail']=$reponse['email'];
        $_SESSION['typeUser']=$reponse['typeUtilisateur'];
       $_SESSION['date']=$reponse['dateNaissance'];
       $_SESSION['wilaya']=$reponse['wilaya'];
       
        echo $_SESSION['email'];
        header('Location: ../views/Accueil.php');
       }
       else{
        $msg =$reponse;
        header("Location: ../views/Connexion.php?message=$msg");
       }
    }
    else{
       
        if(empty($_POST['email'])){
            echo "email no set";
        }
        if(empty($_POST['password'])){
            echo "password no set";
        }

    }
     
}
else{
    echo 'notSet Connexion';
}

?>