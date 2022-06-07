<?php

require_once('Composent.php');

class GestionContact{

public function afficherContact(array $rows){

    $composant = new Composent ();
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
  <link href="../Public/News.css" rel="stylesheet" type="text/css"/>
            <link href="../Public/AdminPage.css" rel="stylesheet" type="text/css"/>

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
        <h1 style="display:felx;height:20px; width:16%">Gestion contacts</h1>
        <div style="margin-top:12%;margin-left:5%;width:100%;">
       
              <table class="fl-table"  >
               <thead>
                    <tr id="PremiereLigne">
                        <th scope="col" > Type Contact</th>
                         <th scope="col" >Contact</th>
                         <th scope="col" >Supprimer</th>
                         <th scope="col" >Modifier</th>
                         
                        
                    </tr>
               </thead>
               <tbody>
               <?php foreach($rows as $line):?>
                   <tr >
                    <th><?=$line['typeContact'] ?></th>
                    <td ><?=$line['contact'] ?></td>
                    <td ><a href="../controllers/ContactController.php?sup=<?php echo $line['idContact']; ?>">Supprimer</td>
                    <td ><a href="../controllers/ContactController.php?modif=<?php echo $line['idContact']; ?>&&type=<?php echo $line['typeContact']; ?>">Modifier</td>
                   
                   
                   </tr>
                   <?php endforeach;?>
                
                  

               </tbody>
              

          </table>
          <a href="../controllers/ContactController.php?ajou=1" class="btn">Ajouter</a>

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

public function ajoutContact(){
    $composant = new Composent ();
    
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
  <link href="../Public/News.css" rel="stylesheet" type="text/css"/>
            <link href="../Public/AdminPage.css" rel="stylesheet" type="text/css"/>

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
               <h1 style="display:felx;height:20px; width:16%">Ajout Contact</h1>
               <form id="form" action="../controllers/ContactController.php" methode="POST" >
                 
               <select name="contactSelect"  class="fadeIn second" id='contactSelect' onchange="changementType();">
                  <option value="Tel">Tel</option>
                  <option value="Email">Email</option>
                  <option value="Adresse">Adresse</option>
                  <option value="Fax">Fax</option>
                </select>
  
  
                <div id="contact" style="display:block">
    
                </div>

            
               
                  <input type="submit" name="ajoutContact" value="Ajouter"  class="fadeIn fourth" style="margin-left:22%;"/>
                  </form>
             </div>
               
      
       
          <script type="text/javascript">
          function changementType() {
var type = document.getElementById("contactSelect").value;
var div= document.getElementById("contact");
div.removeChild(div.lastChild);
var input = document.createElement('div');
if (type == "Tel") {
 
   input.innerHTML="<label  >Numéro de téléphone:</label>";
  input.innerHTML=" <input type='tel'  class='fadeIn second' placeholder='0xxxxxxxxx'name='input'  pattern='0[5-7]{1}[0-9]{8}' required />";

}
else if(type == "Adresse") {
  
    input.innerHTML="<label  >Adresse:</label>";
    input.innerHTML=" <input type='text'  class='fadeIn second' name='input' placeholder='Adresse'/> ";

}
else if (type == "Email") {

    input.innerHTML="<label  >E-mail:</label>";
    input.innerHTML="<input type='email' class='fadeIn second' placeholder='format: xxx@xxx.xxx' name='input' pattern='[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*' required/>";

} 
else if (type == "Fax") {
 
    input.innerHTML="<label  >Fax:</label>";
    input.innerHTML="<input type='text'  class='fadeIn second' name='input' placeholder='Fax'/>";
 

} 
div.appendChild(input);

}

</script>
</body>
     </html>
     
     
     
     
     
     
     
     
     
     
     <?php 

}
public function modifContact($type){
    $composant = new Composent ();
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
  <link href="../Public/News.css" rel="stylesheet" type="text/css"/>
            <link href="../Public/AdminPage.css" rel="stylesheet" type="text/css"/>

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
               <h1 style="display:felx;height:20px; width:16%">Modifier Contact</h1>
            
           
               <form id="form" action="../controllers/ContactController.php" methode="POST" >
                 
                <?php
                    if($type == 'Tel' || $type == 'Fax'){
                        ?>
                <div class= "inputName">
                 <label  >Numéro de téléphone:</label>
                  <input type="tel"  class="fadeIn second" placeholder="0xxxxxxxxx" name="input"  pattern="0[5-7]{1}[0-9]{8}" required />
                 </div>
                        <?php
                    }elseif($type == 'Email'){
                        ?>
                        <div class= "inputName">
        <label  >E-mail:</label>
        <input type="email" class="fadeIn second" placeholder="format: xxx@xxx.xxx" name="input" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*" required/>
        </div>

                        <?php
                    }elseif($type == 'Adresse' ){
                        ?>
     <input type="text"  class="fadeIn second" name="input" placeholder="Adresse"/>
                        <?php   
                    }else{
                        ?>
     <input type="text"  class="fadeIn second" name="input" placeholder="Fax"/>
                        <?php 
                    }

                ?>
                 

                <input  name="typeContact" type="hidden" value="<?php echo $type; ?>" />
              
                 <input type="submit" name="modifDonne" value="Modifier"  class="fadeIn fourth" style="margin-left:22%;"/>
                 </form>
               
               </div>
               
      
          </body>
     </html>
     
     
     
     
     
     
     
     
     
     
     <?php 

}

}


?>