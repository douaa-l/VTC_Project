<?php 
require_once('Datatables.php');
require_once('Composent.php');
class GestionTransporteur {

public function GestionTransporteurs (array $rows ){
$composant = new Composent ();
$dataTable = new DataTables ();

?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                    <a href="../controllers/homeController.php" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Gestion</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="../controllers/index.php?p=1" class="nav-link px-0"> <span class="d-none d-sm-inline">Contenu</span>  </a>
                            </li>
                            <li>
                                <a href="../controllers/UserController.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Utilisateurs</span>  </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../controllers/ClientController.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Clients</span></a>
                    </li>
                    <li>
                        <a href="../controllers/TransporteurController.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Transporteurs</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                         
                        </ul>
                    </li>
                    <li>
                        <a href="../controllers/GestionAnnonceController.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Annonces</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        
                        </ul>
                    </li>
                    <li>
                        <a href="../controllers/GestionSignaleController.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Signal</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        
                        </ul>
                    </li>
                 
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="../controllers/index.php?page=deconnexion" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Deconnexion</span>
                    </a>
                   
                </div>
            </div>
        </div>
        <h1 style="display:felx;height:10px;">Gestion des transporteurs</h1>
        <div style="margin-top:12%;margin-left:-23%;width:100%;">
        <?php
              $dataTable->afficherTransporteur($rows);
               ?>
               </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>
</html>







<?php


}

public function repondreDemande($id){


    $composant = new Composent ();
    
    ?>

    <!doctype html>
    <html lang="fr">
    
         <head>
    
            <meta charset="utf-8">
            <title>Gestion demande</title>
            <link href="../Public/News.css" rel="stylesheet" type="text/css"/>
            <link href="../Public/AdminPage.css" rel="stylesheet" type="text/css"/>
            <link href="../Public/contact.css" rel="stylesheet" type="text/css"/>
            
            
            
         </head>
    
         
    
         <body>
             <div class='ContenairePrincipale'>
                
               <?php  
              $composant->sideMenu();
              ?>
               <h1 style="display:felx;height:20px; width:16%">Gestion demande</h1>
               <form id="form" action="../controllers/DemandeController.php" methode="POST" >
                 
               <select name="ReponseSelect"  class="fadeIn second" id='ReponseSelect' onchange="changementType();">
                  <option value="Accepter">Accepter</option>
                  <option value="Refuser">Refuser</option>
                </select>
  
<div id="Reponse" style="display:block">


</div>


  

                    <input type="hidden" name="id" value="<?=$id?>" />
                  <input type="submit" name="valider" value="Répondre"  class="fadeIn fourth" style="margin-left:22%;"/>
                  </form>
             </div>
               
      
       
          <script type="text/javascript">
          function changementType() {
  var type = document.getElementById("ReponseSelect").value;
  var div= document.getElementById("Reponse");
div.removeChild(div.lastChild);
var input = document.createElement('div');

if (type == "Accepter") {
input.innerHTML="<label  >Liste de pièces à joindre:</label> "
input.innerHTML="<textarea id='pass' class='fadeIn third' name='Accepter' placeholder='Liste de pièces à joindre:'></textarea>"
} else if (type == "Refuser"){
  input.innerHTML="<label  >Motifs de refus:</label> ";
  input.innerHTML="<textarea id='pass' class='fadeIn third' name='input' placeholder='Motifs de refus:'></textarea>"
}
div.appendChild(input);
}

</script>
</body>
     </html>

     <?php 
}

}




?>