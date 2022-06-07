<?php 

require_once('../controllers/AnnonceController.php');
require_once('../models/ObjetModel.php');

class Annonce{
  
    public function AfficherAnnonce ($var,$depart,$arriver,$nb,$transaction){
      $controller = new AnnonceController();

      if($var == 1){// pour tous les visiteur
        
      $rows = $controller->getAnnonces();
       }
       elseif($var == 2){// la recherche pour tous les visiteurs
       
        $rows = $controller->rechercherAnnonce($depart,$arriver);
       }
       elseif($var== 3){ // affichage des annonces d'un user
        $rows= $controller->getAnnoncesUser($_SESSION['matricule']);
       }elseif($var == 4){
         $rows=$controller->rechercheAnnonceUser($_SESSION['matricule'],$depart,$arriver);
       }
      ?>
      <div id="Annonces">
        <?php
      if($depart== "pas Transport"){
                          ?>
                          <p style='color:red; margin-left:29%;margin-top:5%;'>Pas de transporteurs disponibles pour ce trjet pour l'instant</p>
                          <?php
                        }
                        elseif($depart== "pas notif"){
                          ?>
                          <p style='color:red; margin-left:29%;margin-top:5%;'>Pas de Nouvelle notifications pour l'instant</p>
                          <?php 
                        }
       
       
       $i =$nb+8;
       $j=0;

       if($rows == "N 'existe pas"){
         ?>
          <div id="existepas">Aucune annonce avec ce trajet !</div>
         
          <?php
        
       }elseif($rows == "Vous avez aucune annonce pour l'instant"){
         ?>
        <div id="existepas"><?=$rows?></div>
        <?php
       }else{
        $controller = new AnnonceController();
        $objet = new ObjetModel();
        $nbrows=count($rows);
       
       
      foreach($rows as $line ):
          if($nb >=8){

            if($j <$nb){
              $j++;
            }
            else{
              
              if($nb< $i && $nb< $nbrows){
                $row1=$controller->getAnnonce($line['idAnnonce']);
                $row2=$objet->getObjet($row1['idObjet']);
               
            ?>
            <div class="cadre" >
                        <?php
                           $content = $row2['image'];
                           echo '<img id="imageCadre" src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                           if($row1['etatAnnonce']=='en cours'){
                             ?>
                            <a href="../controllers/SupprimerAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" > <img src="Public/b-supprimer.png" class = "iconOPAnnonce"/></a>
                          <?php 
                          }
                          if($row1['archiver']=='0'){
                            ?>
                           <a href="../controllers/ArchiverAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" > <img src="Public/archiver.png" class = "iconOPAnnonce"/></a>
                         <?php 
                         }                          
                           ?> 
                       <h2 style="font-weight: bold;"><?=$line['titreAnnonce'] ?></h2>
                       <p><img src="Public/depart.png" class="icon"/><?=$line['adresseDepart'] ?> </p>
                       <p><img src="Public/arriver.png" class="icon"/><?=$line['adresseArriver'] ?></p>
                        <a href ="LireSuiteAnnonce.php?id=<?php echo $line['idAnnonce']; ?>">Lire la suite</a>
                        <?php
                       if(isset($_SESSION['matricule'])  ){
                        $verifPost = $controller->verifiyPostuleAnnonce ($idAnnonce,$_SESSION['matricule']);
                      
                          $typeUser= $_SESSION['typeUser'];
                          if($line['etatAnnonce']=='Clotureé' AND $transaction!='vide' AND $transaction != ''){
                            foreach($transaction as $tran):
                              if($tran != 'vide' AND ( $tran['idAnnoce']== $line['idAnnonce'])){
                                
                                ?>
                                
                                <a href="EvaluationTransaction.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Evaluer Transaction</a>
                              <?php
                              }
                            endforeach;
                          }else{
                          if($line['etatAnnonce']=='en route'){
                            ?>
                             
                            <a href="Accueil.php" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">En Route</a>
                            <?php

                          }else{
                          if($typeUser == 'Transporteur' AND $verifPost== 'vide' ){
                            ?>
                            <a href="../controllers/PostuleAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Postuler</a>
                            <?php
                          }
                          elseif($typeUser == 'Transporteur' AND $verifPost!= 'vide'){
                            ?>
                            <a href="Accueil.php" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">En attente</a>
                            <?php
                          }
                          elseif($typeUser == 'Client' AND $_SESSION['matricule']== $line['matricule']){
                            ?>
                            <a href="ProposeTransporteur.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Transporteurs disponibles</a>
                            <?php
                          }
                        }
                         
                        }
                       }
                      
                      
                      ?>
            </div> 
            <?php
            $nb++;
             }
            }

          }
          else{
            if($nb< $i){
              $row1=$controller->getAnnonce($line['idAnnonce']);
              $row2=$objet->getObjet($row1['idObjet']);
             
          ?>
          <div class="cadre" style="height:65rem;" >
                      <?php
                         $content = $row2['image'];
                         echo '<img id="imageCadre" src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                         if($row1['etatAnnonce']=='en cours'){
                          ?>
                         <a href="../controllers/SupprimerAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" > <img  src="Public/b-supprimer.png"class = "iconOPAnnonce" /></a>
                       <?php 
                       }
                       if($row1['archiver']=='0'){
                         ?>
                        <a href="../controllers/ArchiverAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" > <img  src="Public/archiver.png" class = "iconOPAnnonce" /></a>
                      <?php 
                      }                          
                        ?> 
                     <h2 style="font-weight: bold;"><?=$line['titreAnnonce'] ?></h2>
                     <p><img src="Public/depart.png" class="icon"/><?=$line['adresseDepart'] ?> </p>
                     <p><img src="Public/arriver.png" class="icon"/><?=$line['adresseArriver'] ?></p>
                      <a  href ="LireSuiteAnnonce.php?id=<?php echo $line['idAnnonce']; ?>">Lire la suite</a>
                     
                      <?php
                       if(isset($_SESSION['matricule'])  ){
                        $verifPost = $controller->verifiyPostuleAnnonce ($line['idAnnonce'],$_SESSION['matricule']);
                      
                     
                          $typeUser= $_SESSION['typeUser'];
                          if($line['etatAnnonce']=='Clotureé' AND $transaction!='vide' AND $transaction != ''){
                            foreach($transaction as $tran):
                              if($tran != 'vide' AND ( $tran['idAnnoce']== $line['idAnnonce'])){
                                
                                ?>
                                
                                <a href="EvaluationTransaction.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Evaluer Transaction</a>
                              <?php
                              }
                            endforeach;
                          }else{
                          if($line['etatAnnonce']=='en route'){
                            ?>
                             
                            <a href="Accueil.php" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">En Route</a>
                            <?php

                          }else{
                          if($typeUser == 'Transporteur' AND $verifPost== 'vide' ){
                            ?>
                            <a href="../controllers/PostuleAnnonce.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Postuler</a>
                            <?php
                          }
                          elseif($typeUser == 'Transporteur' AND $verifPost!= 'vide'){
                            ?>
                            <a href="Accueil.php" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">En attente</a>
                            <?php
                          }
                          elseif($typeUser == 'Client' AND $_SESSION['matricule']== $line['matricule']){
                            ?>
                            <a href="ProposeTransporteur.php?id=<?php echo $line['idAnnonce']; ?>" class="btn" style="height:6%;width:30%;padding:2%;margin-left:60%;">Transporteurs disponibles</a>
                            <?php
                          }
                        }
                         
                        }
                       }
                      
                      ?>
                      
          </div> 
          <?php
          $nb++;
           }
          }
      
       endforeach;
      }
    ?>
    </div>
    <?php
     if($rows !=  "Vous avez aucune annonce pour l'instant"){
    if($nb== $nbrows){
      return -1;
    }else{
    return $nb;}
    }
  }

  public function ProposerTransporteurs( array $matriculeAdr ,$idAnnonce){

    $v= new PageAccueil();
    $controller= new AnnonceController();

    ?>
    
    <!doctype html>
    <html lang="fr">
    <?php
    
    $v-> entetePage();
    
    ?>
    <body>
        <div > <!--id="GlobalContainer" style="width:90%; height: 120rem;"-->
        <?php
        $v->headerPageConnexion();
        $v->menuConnexion();
        ?>
    
    
        <div class="marg" style=" height: 100rem;">
        <div class="titre" style="margin-left:3%;">
                    <svg width="100%" height="100%">
                     <defs>
                      <pattern id="polka-dots" x="0" y="0"  width="50" height="50"patternUnits="userSpaceOnUse">
                      </pattern>  
                       <style>
                           @import url("https://fonts.googleapis.com/css?  family=Lora:400,400i,700,700i");
                         </style>
          
                     </defs>          
                          <rect x="0" y="0" width="50%" height="50%" fill="url(#polka-dots)"> </rect>
                            <text x="50%" y="60%"  text-anchor="middle"  >
                              Transporteurs disponibles
                            </text>
                    </svg>
                </div>
                <div>
           
              
        <div id="tableTransporteurs">
        <table class="fl-table" >
                   <thead>
                        <tr id="PremiereLigne">
                            <th scope="col" > Transporteur</th>
                             <th scope="col" > Date de Naissance</th>
                             <th scope="col" >Adresse </th>
                             <th scope="col" >Status </th>
                             <th scope="col" >Numéro de télephone </th>
                             <th scope="col" >Email</th>
                             <th scope="col" >Valider</th>
                             
                             

                            
                        </tr>
                   </thead>
                   <tbody>
                   <?php
                    foreach($matriculeAdr as $line ):
                      ?>
                       <tr >
                       
                      
                        <td ><?=$line['nom']; $line['prenom']  ?></td>
                        <td ><?=$line['dateNaissance'] ?></td>
                        <td ><?=$line['adresse'];  $line['wilaya'] ?> </td>
                        <td ><?=$line['statutTransporteur'] ?></td>
                        <td ><?=$line['tel'] ?></td>
                        <td ><?=$line['email'] ?></td>
                        <?php
                        if($controller->verifiyPostuleAnnonce ($idAnnonce,$line['matricule'])=='vide'){
                          ?>
                           <td ><a href="../controllers/PostuleAnnonce.php?id=<?php echo $idAnnonce; ?>&&matr=<?php echo $line['matricule'];?>">Demander</a></td>
                          <?php
                          }
                          else {
                            ?>
                             <td ><a href="#">En attente</a></td>
                            <?php
                          }
                       
                          ?>
                       
                       </tr>
                    
                      <?php
                             endforeach;
                      ?>
    
                   </tbody>
               
    
              </table>
              </div> <!-- marg -->
    <?php
   
        $v->btnCommentCaMarche();    
     ?>
    
   
    </div>
    </body>
</html>
<?php
  }  
  public function AfficherNotifications( $Typenotif,$AllNotif){

    $v= new PageAccueil();
  

    ?>
    
    <!doctype html>
    <html lang="fr">
    <?php
    
    $v-> entetePage();
    
    ?>
    <body>
        <div > <!--id="GlobalContainer" style="width:90%; height: 120rem;"-->
        <?php

        $v->menuConnexion();
        ?>
    
    
        <div class="marg"  >
        <div class="titre" style="margin-left:3%;">
                    <svg width="100%" height="100%">
                     <defs>
                      <pattern id="polka-dots" x="0" y="0"  width="50" height="50"patternUnits="userSpaceOnUse">
                      </pattern>  
                       <style>
                           @import url("https://fonts.googleapis.com/css?  family=Lora:400,400i,700,700i");
                         </style>
          
                     </defs>          
                          <rect x="0" y="0" width="50%" height="50%" fill="url(#polka-dots)"> </rect>
                            <text x="50%" y="60%"  text-anchor="middle"  >
                            Notifications
                            </text>
                    </svg>
                </div>
                <div>
           
              <?php
              if($AllNotif == 'vide'){
                header('Location: Accueil.php?pro=2');
              }else{
               
              ?>
          
        
              <?php
                foreach($AllNotif as $line):
                  $idNotif=$line['idNotif'];
                  $idAnnonce=$line['idAnnonce'];
                  if($_SESSION['typeUser']=='Client'){
                  ?>
                <div style="width: 50rem; margin: 0 auto;"><!-- DEMO CONTAINER -->
  <h1 id="hNotif" style="text-align: center;"> <?=$Typenotif;?></h1>

	
	<div class="alert info" style=" width: 100%; height:260px;">
		<input type="checkbox" id="alert3"/>
    
    
		<div class="inner" >
    <img src="Public/client.png" id="logoSite1" alt="Logo du site" style="width:35%; height:25%; margin-left:7%;"/>
               <p style="margin-top:5%;margin-left:11%;font-size: 30px;">  <?=$line['nom'];?>  <?=$line['prenom'];?></p>
               <p style="margin-top:1%;margin-left:11%;font-size: 18px;"> Statut Transporteur: <?=$line['statutTransporteur'];?> </p>
               <p style="margin-top:1%;margin-left:11%;font-size: 18px;"> Contact: <?=$line['tel'];?> </p>

      
		
                  </div>
                  <p style="margin-top:-40%;margin-left:50%;font-size: 20px;">Titre de l'annonce concernée: <strong><?= $line['titreAnnonce'];?></strong></p>
                  <p style="margin-top:2%;margin-left:50%;font-size: 20px;">Lien vers l'annonce:<a href="LireSuiteAnnonce?id=<?php echo $line['idAnnonce'];?>">Consulter Annonce</a></p>
                  <p style="margin-top:2%;margin-left:50%;font-size: 20px;">Date demande: <?= $line['dateEnvoi'];?></p>
                  <?php
                  $idTranspo=$line['matriculeSender'];
                  if($line['reponse']== "Accepter"){
                    ?>
                    
                  <a href="#" class="btn" style=" background-color:rgb(70,136,71);margin-top:9%;margin-left:50%;">Acceptée</a>
                <?php  
                }
                  elseif ($line['reponse']== "Refuser") {
                    ?>
                    <a href="#" class="btn" style=" background-color: rgb(185,74,72);width:20%;margin-top:-7%;margin-left:75%;">Refusée</a>
                    <?php
                  }else{
                  ?>
                  <a href="../controllers/ReponseController.php?r=1&&id=<?php echo $idNotif; ?>&&idAnnonce=<?php echo $idAnnonce; ?>&&trans=<?php echo $idTranspo; ?>" class="btn" style=" background-color:rgb(70,136,71);margin-top:9%;margin-left:50%;">Accepter</a>
                  <a href="../controllers/ReponseController.php?r=2&&id=<?php echo $idNotif; ?>" class="btn" style=" background-color: rgb(185,74,72);width:20%;margin-top:-7%;margin-left:75%;">Refuser</a>
                 <?php
                 }
                 ?> 
                
	</div>

 
</div>
                 

                  <?php
                  }else{
                    ?>
                  <div style="width: 600px; margin: 0 auto;"><!-- DEMO CONTAINER -->
  <h1 id="hNotif" style="text-align: center;"> <?=$Typenotif;?></h1>

	
	<div class="alert info" style=" width: 100%; height:260px;">
		<input type="checkbox" id="alert3"/>
    
    
		<div class="inner" >
    <img src="Public/client.png" id="logoSite1" alt="Logo du site" style="width:35%; height:25%; margin-left:7%;"/>
    <p style="margin-top:5%;margin-left:15%;">  <?=$line['nom'];?>  <?=$line['prenom'];?></p>
               <p style="margin-top:1%;margin-left:15%;"> Statut Transporteur: <?=$line['statutTransporteur'];?> </p>
               <p style="margin-top:1%;margin-left:15%;"> Contact: <?=$line['tel'];?> </p>

      
		
                  </div>
                  <p style="margin-top:-40%;margin-left:50%;">Titre de l'annonce concernée: <?= $line['titreAnnonce'];?></p>
                  <p style="margin-top:2%;margin-left:50%;">Lien vers l'annonce:<a href="LireSuiteAnnonce?id=<?php echo $line['idAnnonce'];?>">Consulter Annonce</a></p>
                  <p style="margin-top:2%;margin-left:50%;">Date demande: <?= $line['dateEnvoi'];?></p>
                 <?php
                  if($line['reponse']== "Accepter"){
                    ?>
                    
                  <a href="#" class="btn" style=" background-color:rgb(70,136,71);margin-top:9%;margin-left:50%;">Acceptée</a>
                <?php  
                }
                  elseif ($line['reponse']== "Refuser") {
                    ?>
                    <a href="#" class="btn" style=" background-color: rgb(185,74,72);width:20%;margin-top:-7%;margin-left:75%;">Refusée</a>
                    <?php
                  }else{
                  ?>
                  <a href="../controllers/ReponseController.php?r=1&&id=<?php echo $idNotif; ?>&&idAnnonce<?php echo $idAnnonce; ?>" class="btn" style=" background-color:rgb(70,136,71);margin-top:9%;margin-left:50%;">Accepter</a>
                  <a href="../controllers/ReponseController.php?r=2&&id=<?php echo $idNotif; ?>" class="btn" style=" background-color: rgb(185,74,72);width:20%;margin-top:-7%;margin-left:75%;">Refuser</a>
                 <?php
                 }
                 ?> 
                
	</div>
 
</div>
  
                    <?php

                  }
                endforeach;
              }
              ?>
              </div> <!-- marg -->
    <?php
   
      
   
     ?>
    
   
    </div>
    </body>
</html>
<?php
  }  
    

}

?>