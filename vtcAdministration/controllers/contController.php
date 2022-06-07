<?php
session_start();
require_once('../models/vtcModel.php');
require_once('../views/GestionContact.php');

$vtc= new vtcModel();
$Views = new GestionContact();





        $Views->ajoutContact();
    
?>