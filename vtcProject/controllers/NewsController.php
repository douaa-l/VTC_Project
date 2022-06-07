<?php
require_once('../models/NewsModel.php');

class NewsController{
    private  $NewsModel;
    private $News;

    public function __construct(){
        $this->NewsModel = new NewsModel ();
    }
     
public function getNews (){

    
    $this->News =$this->NewsModel->getNews();
   return $this->News;      
}
public function getNew ($id){

    
    $new =$this->NewsModel->getNew($id);
   return $new;      
}
public function getSections ($id){

    
    $new =$this->NewsModel->getSections($id);
   return $new;      
}

function split_words($string){ 
    $retour = array(); 
     $delimiteurs = ' .!?, :;(){}[]%'; 
     $tok = strtok($string, " "); 
     while (strlen(join(" ", $retour)) != strlen($string)) { 
     array_push($retour, $tok); 
     $tok = strtok($delimiteurs); 
     } 
     return $retour; 
   }

}
?>