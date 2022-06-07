<?php
require_once('BddModel.php');

class NewsModel{
    private $bdd;
    private $conn;
    private $rows;

    public function __construct(){
        $this->bdd = new BddModel();
        $this->conn=$this->bdd->connexion();
    }

    public function getAllNews()
{
    $requete = $this->conn->query("SELECT * FROM  news ");
    $this->rows = $requete->fetchAll();
    if($this->rows != false ){
        return $this->rows;
    }
}
public function getSectionsNews($idNews)
{
    $requete = $this->conn->query("SELECT * FROM  sections WHERE idNews='$idNews' ");
    $this->rows = $requete->fetchAll();
    if($this->rows != false ){
        return $this->rows;
    }
}
public function supprimer($id)
{
    $requete = $this->conn->query("DELETE FROM  sections WHERE idNews='$id'");
    $requete = $this->conn->query("DELETE FROM  news WHERE idNews='$id' ");
   
}
public function deleteSection($id){
    $requete = $this->conn->query("SELECT idNews FROM  sections WHERE idSection='$id'");
    $row1 = $requete->fetch();
    $requete = $this->conn->query("DELETE FROM  sections WHERE idSection= '$id'");
    return $row1;

}
public function ajouter($titre,$auteur,$image)
{
    $requete = $this->conn->query("SELECT idNews FROM  news WHERE titreNews= '$titre' AND auteur='$auteur' ");
    $row1 = $requete->fetch();
		if($row1 != false){
            echo "<p> Cet news existe déja! </p>";
		}
		else{
			$requete = $this->conn->query("INSERT INTO news(titreNews,auteur,dateCreation,image,idAdminVtc) VALUES ('$titre','$auteur',
            CURRENT_DATE,'$image','1')");
            $requete = $this->conn->query("SELECT idNews FROM  news WHERE titreNews= '$titre' AND auteur='$auteur' ");
            $row1 = $requete->fetch();
            return $row1['idNews'];
		}
   
}

public function ajouterSection($titre,$des,$image,$ima,$idNews){
    $requete = $this->conn->query("SELECT idSection FROM  sections WHERE titreSection= '$titre' AND descriptionSection='$des' AND  titreMedia='$ima' AND idNEws='$idNews' ");
    $row1 = $requete->fetch();
		if($row1 != false){
            echo "<p> Cet sections existe déja! </p>";
		}
		else{
			$requete = $this->conn->query("INSERT INTO sections (titreSection,descriptionSection,titreMedia,idNews) VALUES ('$titre','$des','$ima','$idNews')");
			
		}

}
}
?>