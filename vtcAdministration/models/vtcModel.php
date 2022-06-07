<?php
require_once('BddModel.php');

class vtcModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getAllContact()
    {
        $requete = $this->conn->query("SELECT * FROM  contact");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }
    }
    public function supprimer($id){
        $requete = $this->conn->query("DELETE from contact WHERE idContact='$id'");
    }

    public function updateContact($typeContact, $contact)
{
   
        $requete = $this->conn->query("UPDATE contact SET contact='$contact' WHERE  typeContact= '$typeContact'"); 
  

}
public function ajouterContact($type,$input)
{
   
    $requete = $this->conn->query("INSERT INTO contact (typeContact,contact,idAdminVtc) VALUES ('$type','$input','1')"); 


}
public function updatePresentation($titre,$des,$image,$video){
   
    $requete = $this->conn->query("UPDATE vtc SET titrePresentation = '$titre', discriptionPresentation = '$des' WHERE idAdminVtc = '1'");
    $requete = $this->conn->query("UPDATE media SET typeMedia = '0', media = '$image' WHERE idAdminVtc = '1'");
    $requete = $this->conn->query("UPDATE media SET  typeMedia = '1', media = '$videp' WHERE idAdminVtc = '1'AND typeMedia='$video'");
    
}
}