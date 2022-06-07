
<?php
require_once('../models/UserModel.php');


if (isset($_REQUEST['valider'])){
    if(!empty($_REQUEST['ReponseSelect']) ){
        echo'1';
        $type =$_REQUEST['ReponseSelect'];
        $id=$_REQUEST['id'];
        if( !empty($_REQUEST['Accepter']) || !empty($_REQUEST['Refuser'])){
            echo'2';
            $user=new UserModel();
           
            if($type =="Accepter"){
                $piece= $_REQUEST['Accepter'];
            }
            else{
                $piece= $_REQUEST['Refuser'];
            }
            echo'3';
            $user->RponseDemande($id,$type,$piece);
            header('Location:../controllers/TransporteurController.php');
        }
        
     
    }
}


?>