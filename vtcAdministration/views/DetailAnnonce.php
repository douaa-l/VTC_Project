<?php
require_once('../controllers/AnnonceController.php');
require_once('../models/ObjetModel.php');
require_once('../models/UserModel.php');

class DetailAnnonce{

    public function detail($id){

        $objet = new ObjetModel();
        $user =new UserModel();
        $controller = new AnnonceController();

            $row1=$controller->getAnnonce($id);
            $row2=$objet->getObjet($row1['idObjet']);
            $row3=$user->getUser($row1['matricule']);
            
            ?>
            
            <div class="titre">
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
                            <?=$row1['titreAnnonce'] ?>
                        </text>
                </svg>
            </div>
            <div>
            <div class= "Objet">
                 <div class="imageAnnonce">
                     <?php
                   
                     $content = $row2['image'];
                     echo '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                     ?>
                </div>
                <div class="detailObjet">
                 <h2><?=$row2['nomObjet'] ?></h2>
                 <p>  Type de l'objet:<span><?=$row2['typeObjet'] ?></span> </p>
                 <p> Poids:<span><?=$row2['poid'] ?></span></p>
                 <p> Volume:<span><?=$row2['volume'] ?></span> </p>
                 <p> Moyen de transport:<span><?=$row2['moyenTransport'] ?></span></p>
                </div>
                

             </div>
        <div class="globalDetail">
             <div class="detailAnnonce">
                 <p class="typing-demo">
                 Adresse de départ: <?=$row1['adresseDepart'] ?>  </p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Adresse d'arrivée: <?=$row1['adresseArriver'] ?> </p>    
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Date de creation: <?=$row1['dateCreation'] ?>  </p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Date de creation: <?=$row1['etatAnnonce'] ?>  </p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 A Garentir:<?php if($row1['garantir']== 0){?> NON <?php }else { ?> OUI <?php } ?> </p>
                 
            </div>


            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Créer par :</p>    
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Nom:<?=$row3['nom'] ?>   </p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Prénom:<?=$row3['prenom'] ?></p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Email:<?=$row3['email'] ?>    </p>
                 
            </div>
            <div class="detailAnnonce">
                 <p class="typing-demo">
                 Tel:<?=$row3['tel'] ?></p>
                 
            </div>
         </div>
                 
               
            
    </div>
            <?php




        
        }

    
}
?>