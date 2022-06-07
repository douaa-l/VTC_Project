
<?php
require_once('../models/UserModel.php');
require_once('../models/AnnoncesModel.php');
class Datatables {
   
    public function  afficherSignal(array $rows){
        $modelUser= new UserModel ();
        $modelAnnonce = new AnnoncesModel ();
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

   
    <title>Gestion Transaction</title>
</head>
<body>

    <table id="usersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Annonce</th>
                <th>Profil transporteur</th>
              <th>Profil Client</th>
                <th>Note Transporteur</th>
              <th>Note Client</th>
              <th>Avis Transporteur</th>
            <th>Avis Client</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
    foreach($rows as $line ):
        $idAnnonce= $line['idAnnoce'];
         $Annonce= $modelAnnonce-> getAnnonce($idAnnonce);
         $idClient = $Annonce['matricule'];
         $titre = $Annonce['titreAnnonce'];
        $idtransporteur= $line['matriculeTransport'];
        $noteClient =  $line['notClient'];
        $noteTransporteur = $line['noteTrans'];
        $signalClient= $line ['signalementClient'];
        $signalTransp= $line['signalementTrans'];
       $Client= $modelUser->getUser($idClient);
       $nomClient = $Client ['nom'];
       $prenomClient= $Client ['prenom'];
       $transporteur = $modelUser->getUser($idtransporteur);
       $nomTrans =$transporteur['nom'];
       $prenomTrans= $transporteur['prenom'];
    
       
?>
            <tr>
                <td><?=$titre?> <a href="../views/LireSuiteAnnonce.php?id=<?php echo $idAnnonce  ;?>">Annonce</a></td>
                <td><?=$nomTrans?> <?=$prenomTrans?> <a href="../controllers/ProfileController.php?id=<?php echo $idtransporteur ;?>">Profile</a></td>
             <td><?=$nomClient?> <?=$prenomClient?> <a href="../controllers/ProfileController.php?id=<?php echo $idClient ;?>">Profile</a></td>
                <td><?=$noteTransporteur?></td>
                 <td><?=$noteClient?></td>
             <td><?=$signalTransp?></td>
               <td><?=$signalClient?></td>
            
            </tr>
         <?php
         endforeach;
         ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Annonce</th>
                <th>Profil Transporteur </th>
                <th>Profil Client</th>
                <th>Note Transporteur</th>
                
                <th>Note Client</th>
                <th>Avis Transporteur</th>
                <th>Avis Client</th>
            </tr>
        </tfoot>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="../Public/script.js"></script>
</body>
</html>
<?php

    }

    public function afficherSections(array $rows){
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

   
    <title>Gestion Sections</title>
</head>
<body>

    <table id="usersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Titre section</th>
                <th>Image asssocié</th>
              <!--  <th>Supprimer</th>-->
                <th>Supprimer</th>
              <!--<th>Ajouter Section</th>-->
              <!--<th>Consulter Sections</th>-->
                <!--<th>Gestion compte</th>-->
                
            </tr>
        </thead>
        <tbody>
        <?php
    foreach($rows as $line ):
        $titre= $line['titreSection'];
        $media= $line['titreMedia'];
    
        $id= $line['idSection'];
?>
            <tr>
                <td><?=$titre?></td>
                <td><?=$media?></td>
                 <!--  <td>Supprimer</td>-->
                <td><a href="../controllers/SectionController.php?id=<?php echo $id ;?>">Supprimer</a></td>
             <!--    <td><a href="#?idNews">Ajouter</a></td>-->
             <!--  <td><a href="../controllers/SectionController.php?idNews">Consulter</a></td>-->
              <!--  <td><a href="../controllers/UserController.php?t=client&&id=</a></td>-->
            
            </tr>
         <?php
         endforeach;
         ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Image</th>
                <th>Supprimer</th>
                <!-- <th>Supprimer</th>-->
                
                <!-- <th>Ajouter</th>-->
               <!-- <th>Consulter</th>-->
               <!-- <th></th>-->
            </tr>
        </tfoot>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="../Public/script.js"></script>
</body>
</html>
<?php

    }
    public function afficherNews(array $rows){
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

   
    <title>Gestion News</title>
</head>
<body>


    <table id="usersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date Création</th>
                <th>Auteur</th>
                <th>Supprimer</th>
                <th>Ajouter Section</th>
                <th>Consulter Sections</th>
                <!--<th>Gestion compte</th>-->
                
            </tr>
        </thead>
        <tbody>
        <?php
    foreach($rows as $line ):
        $titre= $line['titreNews'];
        $date= $line['dateCreation'];
        $auteur =$line['auteur'];
        $id= $line['idNews'];
?>
            <tr>
                <td><?=$titre?></td>
                <td><?=$date?></td>
                <td><?=$auteur?></td>
                <td><a href="../controllers/OperationNews.php?sup=<?php echo $id ;?>">Supprimer</a></td>
                <td><a href="../controllers/SectionController.php?ajout=1&&idNews=<?php echo $id ;?>">Ajouter</a></td>
                <td><a href="../controllers/SectionController.php?idNews=<?php echo $id ;?>">Consulter</a></td>
              <!--  <td><a href="../controllers/UserController.php?t=client&&id=</a></td>-->
            
            </tr>
         <?php
         endforeach;
         ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Date Création</th>
                <th>Auteur</th>
                <th>Supprimer</th>
                
                <th>Ajouter</th>
                <th>Consulter</th>
               <!-- <th></th>-->
            </tr>
        </tfoot>
    </table>
    
    <a href="../controllers/OperationNews.php?ajou=1" class="btn" style="background: #a55265;">Ajout News</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="../Public/script.js"></script>
</body>
</html>
<?php

    }
    public function afficherClient(array $rows){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

   
    <title>Gestion Clients</title>
</head>
<body>

    <table id="usersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th>Etat compte</th>
                <th>Profil</th>
                <th>Gestion compte</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
    foreach($rows as $line ):
        $name= $line['nom'];
        $prenom= $line['prenom'];
        $sexe =$line['sexe'];

        $adresse = $line['adresse'];
        $adresse .= ' ';
        $adresse .= $line['wilaya'];
        if($line ['bannier']== '1'){
            $bannier= 'Activer';
            $bann= 'Bloquer';
        }else{
            $bannier='Bloquer';
            $bann=  'Autoriser';
        }
        $matricule=$line['matricule'];
      
?>
            <tr>
                <td><?=$name?></td>
                <td><?=$prenom?></td>
                <td><?=$sexe?></td>
                <td><?=$adresse?></td>
                <td><?=$bannier?></td>
                <td><a href="../controllers/ProfileController.php?id=<?php echo $matricule ;?>">Profil</a></td>
                <td><a href="../controllers/UserController.php?t=client&&id=<?php echo $matricule ;?>"><?=$bann?></a></td>
            
            </tr>
         <?php
         endforeach;
         ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Adresse</th>
                
                <th>Etat compte</th>
                <th>Consulter</th>
                <th><?=$bannier?></th>
            </tr>
        </tfoot>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="../Public/script.js"></script>
</body>
</html>
<?php
}

public function afficherTransporteur(array $rows){

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
       
        <title>Gestion Transporteurs</title>
    </head>
    <body>
    
        <table id="usersTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th>Etat compte</th>
                    <th>Statut transporteur</th>
                    <th>Etat demande</th>
                    <th>Profil</th>
                    <th>Gestion compte</th>
                    <th>Gestion demande</th>
                  
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php
        foreach($rows as $line ):
            $name= $line['nom'];
            $prenom= $line['prenom'];
            $sexe =$line['sexe'];
    
            $adresse = $line['adresse'];
            $adresse .= ' ';
            $adresse .= $line['wilaya'];
            if($line ['bannier']== '0'){
                $bannier= 'Active';
                $bann= 'Bloquer';
            }else{
                $bannier='Bloqué';
                $bann=  'Autoriser';
            }
            $matricule=$line['matricule'];
            $statut=$line['statutTransporteur'];
            if($line['etatDemande']=='en cours de traitement'){
                $etatDemande= 'Demande de se certifier';
                $repondre="Répondre";
                
                
            }elseif($line['etatDemande']=='Accepter' ||$line['etatDemande']=='Refuser' ){
                $etatDemande=$line['etatDemande'];
                $repondre=""; 
            }
            else{
            
                $etatDemande="Pas de demande";
                $repondre="";
            }
          
    ?>
                <tr>
                    <td><?=$name?></td>
                    <td><?=$prenom?></td>
                    <td><?=$sexe?></td>
                    <td><?=$adresse?></td>
                    <td><?=$bannier?></td>
                    <td><?=$statut?></td>
                    <td><?=$etatDemande?></td>
                    <td><a href="../controllers/ProfileController.php?id=<?php echo $matricule ;?>">Profil</a></td>
                    <td><a href="../controllers/UserController.php?t=trans&&id=<?php echo $matricule ;?>"><?=$bann?></a></td>
                    <td><a href="../controllers/UserController.php?t=repo&&id=<?php echo $matricule ;?>"><?=$repondre?></a></td>
                  
                
                </tr>
             <?php
             endforeach;
             ?>  
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th>Etat compte</th>
                    <th>Statut Transporteur</th>
                    <th>Etat demande</th>
                    <th>Consulter</th>
                    <th><?=$bannier?></th>
                    <th>Répondre</th>

             
                </tr>
            </tfoot>
        </table>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../Public/script.js"></script>
    </body>
    </html>
    <?php
    }

    public function afficherAnnonces(array $rows){

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        
           
            <title>Gestion Annonces</title>
        </head>
        <body>
        
        <table id="usersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Annonce</th>
                <th>Etat</th>
                <th>Wilaya Départ</th>
                <th>Wilaya Arriver</th>
                <th>Créateur</th>
                <th>Date Création</th>
                <th>Gestion etat</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
           foreach($rows as $line ):
   $titre= $line['titreAnnonce'];
   $depart= $line['adresseDepart'];
   $Arriver= $line['adresseArriver'];
   $etat=$line['etatAnnonce'];
   $date =$line['dateCreation'];
   $nom = $line['nom'];
   $prenom=$line['prenom'];
   $matricule= $line['matricule'];
   $idAnnonce=$line['idAnnonce'];
   if($line['etatAnnonce']== 'Non validée par admin'){
       $gestion= 'Valider';
   }else{
       $gestion='';
   }
      
?>
            <tr>
                <td><?=$titre?> <a href="../views/LireSuiteAnnonce.php?id=<?php echo $idAnnonce  ;?>">Annonce</a></td>
                <td><?=$etat?></td>
                <td><?=$depart?></td>
                <td><?=$Arriver?></td>
                <td><?=$nom?> <?=$prenom?> <a href="../controllers/ProfileController.php?id=<?php echo $matricule ;?>">Profile</a></td>
                <td><?=$date?></td>
                <td><a href="../controllers/Gestion.php?id=<?php echo $idAnnonce ;?>"><?=$gestion?></a></td>
            
            </tr>
         <?php
         endforeach;
         ?>  
        </tbody>
        <tfoot>
            <tr>
                <th>Consulter</th>
                <th>Etat</th>
                <th>Wilaya départ</th>
                <th>Wilaya arriver</th>
                
                <th>Créateur</th>
                <th>Date création</th>
                <th>Gérer</th>
            </tr>
        </tfoot>
    </table>

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="../Public/script.js"></script>
        </body>
        </html>
        <?php
        }
}
?>