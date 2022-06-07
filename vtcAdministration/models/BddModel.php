<?php 
class BddModel{

    public function connexion (){

        
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=TDW;charset=utf8', 'root', '');
        
        }
        catch(Exception $e)
        {
            die ('ereeur '.$e->getMessage());
        }
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $bdd;
    }

    public function deconnexion ($bdd){

        $bdd=null;
    }

}




?>