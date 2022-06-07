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

    public function getNews (){
      
         $requete = $this->conn->query("SELECT * FROM  news WHERE idAdminVtc= '1'");
        $this->rows = $requete->fetchAll();
        if($this->rows != false ){
            return $this->rows;

        }
        }
        public function getNew ($id){
      
            $requete = $this->conn->query("SELECT * FROM  news WHERE idAdminVtc= '1' AND idNews='$id'");
           $this->rows = $requete->fetch();
           if($this->rows != false ){
               return $this->rows;
   
           }
           }
    public function getSections($id)
    {
        $requete = $this->conn->query("SELECT * FROM  sections WHERE idNews= '$id'");
        $rowsm = $requete->fetchAll();
        if($rowsm != false ){
            return $rowsm;
        }

    }
       
  public function countNews(){
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news");
    $count = $requete->fetchColumn();
    $result['totale']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news WHERE YEAR(dateCreation) = '2021'");
    $count = $requete->fetchColumn();
    $result['2021']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news WHERE YEAR(dateCreation) = '2020'");
    $count = $requete->fetchColumn();
    $result['2020']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news WHERE YEAR(dateCreation) = '2019'");
    $count = $requete->fetchColumn();
    $result['2019']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news WHERE YEAR(dateCreation) = '2018'");
    $count = $requete->fetchColumn();
    $result['2018']=$count;
    $requete = $this->conn->query("SELECT COUNT(*)  FROM news WHERE YEAR(dateCreation) = '2017'");
    $count = $requete->fetchColumn();
    $result['2017']=$count;
    return $result;
  } 
}

?>