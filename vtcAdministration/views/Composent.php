<?php


class Composent{

    public function GestionGlobal(){
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
        <h1 style="display:felx;height:10px;">Gestion de site</h1>
        <div class='divGestion' style="margin-left:-5%;">
                    <a class="imgBlock" href="../controllers/index.php?p=1" ><img src="../Public/gestion-de-projet.png" width=200 height=200 /></a>
                    <p >Gestion de Contenu</p>
                    </div>
                    <div class='divGestion'>
                    <a class="imgBlock" href="../controllers/UserController.php"><img src="../Public/la-gestion.png" width=200 height=200 /></a>
                    <p >Gestion des Utilisateurs</p>
                    </div>
                    <div class='divGestion'>
                    <a class="imgBlock" href="../controllers/GestionAnnonceController.php"><img src="../Public/gestion-des-dossiers.png" width=200 height=200 /></a>
                    <p >Gestion des Annonces</p>
                    </div>
                    <div class='divGestion'>
                    <a class="imgBlock" href="../controllers/GestionSignaleController.php"><img src="../Public/network (1).png" width=200 height=200 /></a>
                    <p >Gestion des signals</p>
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
   
    public function GestionContenu(){
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
        <h1 style="display:felx;height:10px;">Gestion de Contenu</h1>
       <div class='divGestion' style="margin-left:-2%;">
       <a class="imgBlock" href="../views/PagePr??sentation.php"><img src="../Public/gestion-de-projet.png" width=200 height=200 /></a>
       <p >Gestion de la page Pr??sentation</p>
       </div>
       <div class='divGestion'>
       <a class="imgBlock" href="../controllers/ContactController.php"><img src="../Public/communicate.png" width=200 height=200 /></a>
       <p >Gestion de page Contact</p>
       </div>
      
       <div class='divGestion'>
       <a class="imgBlock" href="../controllers/NewsController.php"><img src="../Public/gestion-des-dossiers.png" width=200 height=200 /></a>
       <p >Gestion des News</p>
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
 
    public function  GestionUsers(){
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
        <h1 style="display:felx;height:10px;">Gestion des Users</h1>
        <div class='divGestion' style="margin-left:-6%;">
       <a class="imgBlock" href="../controllers/ClientController.php"><img src="../Public/client.png" width=200 height=200 /></a>
       <p >Gestion des Clients</p>
       </div>
       <div class='divGestion'>
       <a class="imgBlock" href="../controllers/TransporteurController.php"><img src="../Public/stick-man.png" width=200 height=200 /></a>
       <p >Gestion des Transporteurs</p>
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
}

?>