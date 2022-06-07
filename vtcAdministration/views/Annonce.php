<?php 

require_once('../controllers/AnnonceController.php');
require_once('../models/ObjetModel.php');

class Annonce{
  
    public function AfficherAnnonce ($var,$depart,$arriver,$nb,$id){
      $controller = new AnnonceController();

      if($var == 1){// pour tous les visiteur
        
      $rows = $controller->getAnnonces();
       }
       elseif($var == 2){// la recherche pour tous les visiteurs
       
        $rows = $controller->rechercherAnnonce($depart,$arriver);
       }
       elseif($var== 3){ // affichage des annonces d'un user
        $rows= $controller->getAnnoncesUser($id);
       }elseif($var == 4){
         $rows=$controller->rechercheAnnonceUser($id,$depart,$arriver);
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
                           ?>
                       <h2><?=$line['titreAnnonce'] ?></h2>
                       <p><img src="Public/depart.png" class="icon"/><?=$line['adresseDepart'] ?> </p>
                       <p><img src="Public/arriver.png" class="icon"/><?=$line['adresseArriver'] ?></p>
                       
                      
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
          <div class="cadre" style="height: 55rem" >
                      <?php
                         $content = $row2['image'];
                         echo '<img id="imageCadre" src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                       
                                          
                        ?> 
                     <h2><?=$line['titreAnnonce'] ?></h2>
                     <p><img src="Public/depart.png" class="icon"/><?=$line['adresseDepart'] ?> </p>
                     <p><img src="Public/arriver.png" class="icon"/><?=$line['adresseArriver'] ?></p>
               
                      
                 
                      
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

  

}

?>