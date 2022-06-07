<?php
require_once('BddModel.php');

class ContactModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getContact ($type){
      
         $requete = $this->conn->query("SELECT * FROM  contact WHERE typeContact='$type'");
        $this->rows = $requete->fetch();
        if($this->rows != false ){
            return $this->rows;
        }
        }

   public function setMessage ($email,$comment){

    $requete = $this->conn->query("INSERT INTO messages (msg,emailSender, idAdminVtc) VALUES ('$comment','$email','1')");
   }
       
   
}

?>