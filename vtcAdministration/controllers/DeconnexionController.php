<?php

class DeconnexionController{

    public function deconnexion(){
        echo "Logout Successfully ";
        session_destroy();   // function that Destroys Session 
        header("Location: index.php");

    }
}
 
?>