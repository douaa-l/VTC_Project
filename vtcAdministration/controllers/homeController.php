
<?php
session_start();

require_once ('../views/PageAdmin.php');
$viewAdmin= new PageAdmin();
 $viewAdmin->afficherPageAdmin("GestionGlobal");

 ?>