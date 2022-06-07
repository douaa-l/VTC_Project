<?php
require_once('../models/PresentationModel.php');

class PresentationController{
    private  $PresentationModel;
    private $Presentation;

    public function __construct(){
        $this->PresentationModel = new PresentationModel ();
    }
     
public function getPresentation (){

    
    $this->Presentation =$this->PresentationModel->getPresentation();
   return $this->Presentation;      
}
public function  getMedia($type){
    $Media=$this->PresentationModel-> getMedia($type);
    return $Media;

}



}
?>