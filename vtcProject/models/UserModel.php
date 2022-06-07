<?php
require_once('BddModel.php');

class UserModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getAllUsers (){
      
         $requete = $this->conn->query("SELECT * FROM  utilisateur");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;
        }
        }
    public function getUser($mat){
        $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE matricule= '$mat'");
        $row = $requete->fetch();
        if($row!= false){
            return $row;
        }
        else{
            return("user n'existe pas ");
        }

    }
    public function getUserByINFO($nom,$prenom,$password){
        $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE nom= '$nom' AND prenom='$prenom' AND motDePasse='$password'");
        $row = $requete->fetchAll();
        if($row!= false){
            return $row;
        }
        else{
            return("user n'existe pas ");
        }

    }
    public function getUserByAdrArriv($adrArriver){
        $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE wilaya= '$adrArriver' ");
        $row = $requete->fetchAll();
        if($row!= false){
            return $row;
        }
        else{
            return("user n'existe pas ");
        }

    }
    public function updateInfoUser($nom,$prenom,$datenaissance,$sexe,$adresse,$wilaya,$tel,$mail,$password,$type,$image,$id){
        $requete = $this->conn->query("UPDATE utilisateur SET nom='$nom',   prenom='$prenom',dateNaissance='$datenaissance', 
      sexe='$sexe',adresse='$adresse',wilaya='$wilaya',email='$mail',tel='$tel',motDePasse='$password',
      typeUtilisateur='$type',photos='$image',idAdminVtc='1' WHERE matricule='$id'");
    }
     public function inserteUser($nom,$prenom,$datenaissance,$sexe,$adresse,$wilaya,$tel,$mail,$password,$type,$image)
     {
        $requete = $this->conn->query("INSERT INTO utilisateur(nom,prenom,dateNaissance,sexe,adresse,wilaya,email,tel,motDePasse,typeUtilisateur,photos,idAdminVtc) VALUES 
        ('$nom','$prenom','$datenaissance','$sexe','$adresse','$wilaya','$mail','$tel','$password','$type','$image','1')");
        $requete = $this->conn->query("SELECT * FROM  utilisateur WHERE nom= '$nom' AND prenom='$prenom' AND motDePasse='$password'");
        $row = $requete->fetch();
        return $row;
     }
   public function setDemande($statut,$etat,$date,$matricule){
    $requete = $this->conn->query("UPDATE utilisateur SET statutTransporteur='$statut',etatDemande='$etat',dateDemande='$date' WHERE 
    matricule= '$matricule'");

   }
   public function countUser(){
    

    $requete = $this->conn->query("SELECT COUNT(*)  FROM utilisateur");
    $count = $requete->fetchColumn();
    $result['totale']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client'");
    $count = $requete->fetchColumn();
    $result['client']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND sexe='femme'");
    $count = $requete->fetchColumn();
    $result['clientfemme']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND sexe='homme'");
    $count = $requete->fetchColumn();
    $result['clienthomme']=$count;
   
    $requete = $this->conn->query("SELECT COUNT(*)  FROM utilisateur WHERE  typeUtilisateur='Client' AND DATEDIFF(CURRENT_DATE,dateNaissance )<='30' AND DATEDIFF(CURRENT_DATE,dateNaissance )>'18'");
    $count = $requete->fetchColumn();
    $result['client30']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND DATEDIFF(CURRENT_DATE,dateNaissance )<'50' AND DATEDIFF(CURRENT_DATE,dateNaissance )>'30'");
    $count = $requete->fetchColumn();
    $result['client50']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client'  AND DATEDIFF(CURRENT_DATE,dateNaissance )>='50'");
    $count = $requete->fetchColumn();
    $result['client60']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM utilisateur WHERE  typeUtilisateur='Transporteur'");
    $count = $requete->fetchColumn();
    $result['transporteur']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM utilisateur WHERE  typeUtilisateur='Transporteur' AND sexe='femme'");
    $count = $requete->fetchColumn();
    $result['transporteurfemme']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM utilisateur WHERE  typeUtilisateur='Transporteur' AND sexe='homme'");
    $count = $requete->fetchColumn();
    $result['transporteurhomme']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND DATEDIFF(CURRENT_DATE,dateNaissance )<='30' AND DATEDIFF(CURRENT_DATE,dateNaissance )>'18'");
    $count = $requete->fetchColumn();
    $result['transporteur30']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND DATEDIFF(CURRENT_DATE,dateNaissance )<'50' AND DATEDIFF(CURRENT_DATE,dateNaissance )>'30'");
    $count = $requete->fetchColumn();
    $result['transporteur50']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur'  AND DATEDIFF(CURRENT_DATE,dateNaissance )>='50'");
    $count = $requete->fetchColumn();
    $result['transporteur60']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND  ( wilaya ='Alger' OR  wilaya ='Tipaza' Or wilaya ='Annaba')");
    $count = $requete->fetchColumn();
    $result['nordT']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND ( wilaya ='Adrar' || wilaya ='Ilizi' || wilaya ='Bechar') ");
    $count = $requete->fetchColumn();
    $result['sudT']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND ( wilaya ='Batna' || wilaya ='Constantine' || wilaya ='Galma') ");
    $count = $requete->fetchColumn();
    $result['eastT']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Transporteur' AND ( wilaya ='Oran' || wilaya ='Tilemcen' || wilaya ='Mostaghanem') ");
    $count = $requete->fetchColumn();
    $result['ouestT']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client'AND  ( wilaya ='Alger' || wilaya ='Tipaza' || wilaya ='Annaba') ");
    $count = $requete->fetchColumn();
    $result['nord']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND ( wilaya ='Adrar' || wilaya ='Ilizi' || wilaya ='Bechar')  ");
    $count = $requete->fetchColumn();
    $result['sud']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND ( wilaya ='Batna' || wilaya ='Constantine' || wilaya ='Galma') ");
    $count = $requete->fetchColumn();
    $result['east']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM  utilisateur WHERE  typeUtilisateur='Client' AND ( wilaya ='Oran' || wilaya ='Tilemcen' || wilaya ='Mostaghanem') ");
    $count = $requete->fetchColumn();
    $result['ouest']=$count;
    return $result;
    


   }
}

?>