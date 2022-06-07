<?php
require_once('../models/ContactModel.php');

class ContactController{
    private  $ContactModel;
    private $Contacts;

    public function __construct(){
        $this->ContactModel = new ContactModel ();
    }
     
public function getContact ($type){

    
    $this->Contacts =$this->ContactModel->getContact($type);
   return $this->Contacts;      
}
public function setMessages($email,$comment){
    $this->ContactModel->setMessage($email,$comment);

}
function check_email_address($email) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
}


}
?>