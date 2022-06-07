<?php
require_once('Annonce.php');
require_once('PageAccueil.php');
class Profil{

private $idUser;

public function __construct($id){
   $this->idUser=$id;
 
}
public function AfficherProfile (array $rows, array $trajet,$transaction){
    $v=new PageAccueil();
    $view=new Annonce();
    ?>

        <!doctype html>
        <html lang="fr">
    <?php

    $v-> entetePage();

    ?>
        <body>
            <div ><!--id="GlobalContainer" style="width: 90%;"-->
     
             <?php
            // $v->headerPageConnexion();
   
              $v->menuConnexion();  
                    
            ?>
               <div class="GlobalContainerProfile">
                <div id="user-image">
                <?php
                   
                   $content = $rows['photos'];
                   echo '<img id="photosUser" src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                   ?>
                </div><!--imageuser-->
                
                <div id="user-data">
              
                <h2> <?=$rows['nom'];?> <?= $rows['prenom'];?> </h2>
                <?php
                if($rows['typeUtilisateur']=='Transporteur')
                {
                    ?>
                    <span ><?= $rows['statutTransporteur'];?> </span>
                    <?php
                }
                ?>
                <span ><?= $rows['typeUtilisateur'];?> </span>
               
              
                <a href="mailto:<?= $rows['email'];?>" type="button" class="msg-btn"><i class="fa fa-envelope-o" aria-hidden="true"></i>Envoyer Message</a>
                <a href="ModifProfil.php"><img src="Public/modifier.png" style="width:50px;height:50px;"/></a>    
            </div><!--user data-->
                
            </div>
            <div id="button">
                <button id="selectDetail" onclick="show1()">Details Profile</button>
              
                <button id="selectHisto" onclick="show2()">Historique</button>
                <?php 
                if($rows['typeUtilisateur']=='Transporteur'){
                        ?>
                 <button id="selectTrajet" onclick="show4()">Wilaya possible:</button>
                 <?php
                }
                if($rows['statutTransporteur']!=''){
                        ?>
                 <button id="selectReponse" onclick="show3()">Réponse</button>
                 <?php
                }
                ?>
               
                 </div><!--button-->
                
                 <div id="detailProfile">
                
                 <div class="left">
                 
                  <p>Detail</p>
                 <p>Nom:<?=$rows['nom'];?></p>
                 <p>Prénom:<?=$rows['prenom'];?></p>
                 <p>Type d'tilisateur:<?=$rows['typeUtilisateur'];?></p>
                 <?php
                 if($rows['typeUtilisateur']=='Transporteur'){
                     ?>
                     <p>Statut de transporteur:<?=$rows['statutTransporteur'];?></p>
                     <p>Etat de la demande:<?=$rows['etatDemande'];?></p>
                     <?php
                 }
                 ?>
             </div>
             <div class="right">
               
               
              <p>Adresse:<?=$rows['adresse'];?></p>
              <p>Wilaya de départ:<?=$rows['wilaya'];?></p>
              
              <p>Tel:<?=$rows['tel'];?></p>
              <p>Email:<?=$rows['email'];?></p>
          </div>

                </div><!--detailProfile-->
                <div id="historique"  >
                <?php
                $v->recherche();
               
                $var =3;
                 if(isset($_GET['nb'])){
                     ?>
                     <div  >
                     <?php
                  $nb=$view->AfficherAnnonce($var,"","",$_GET['nb'],$transaction);
                  ?>
                  </div>
                  <?php
                  }else{
                      ?>
                       <div >
                     <?php
                  $nb=$view->AfficherAnnonce($var,"","",0,$transaction);}
                  ?>
                  </div>
                  <?php
                  if($nb == -1){
                 ?>
                  
                 <?php
                  }else{
                 ?>

  
                  <div style="margin-left:45%;">
                     <a href="javascript:history.go(-1)" > <img src="Public/suivant.png" style="width:38px;height:38px;margin-top:-4px; transform: rotate(180deg);"/></a>
                      <a href="ProfileController.php?nb=<?php echo $nb; ?>" >    <img src="Public/suivant.png" style="width:37px;height:37px;margin-top:-4px;"/></a>
           
                    </div>
                    <?php
                  }
                  ?>
            </div><!-- historique-->
            <div id="Reponse" style="display:none;">
                <?php
                if($rows['typeReponse']==''){
                    ?>
                    <div  id="existepas">Acune Réponse pour l'instant !</div>
                    <?php
                }
                else{
                    ?>
                    <div class="left">
                    <p>Réponse:</p>
                 <p>Réponse:<?=$rows['typeReponse'];?></p>

                    </div>
                    <div class="right">
                    <p>Detail:</p>
                 <p>Réponse:<?=$rows['pieceJointe'];?></p>
                    </div>

                    <?php
                }
                ?>

                </div><!--tarajet-->
                <div id="Trajet" style="display:none;">
                <p>Mon Trajet:</p>
                <table id="table-wilaya" class="tableau" style="border=2px ;margin-left:30%;" >
               <thead>
                    <tr id="PremiereLigne">
                         <th scope="col" > Wilaya Arriver</th>
                         <th scope="col" > Tarif de transport</th>
                         <th scope="col" > Supprission</th>
                        
                    </tr>
               </thead>
               <tbody>
               <?php foreach($trajet as $line):?>
                   <tr >
                  
                    <td name="NomWilaya"><?=$line['wilaya'] ?></td>
                    <td class="Tarif"><?=$line['tarifTrans'] ?></td>
                  <td name="supprimWilaya"><a href="../controllers/TrajetController.php?supp=<?php echo $line['wilaya']; ?>">Supprimer</td>
                  
                   </tr>
                   <?php endforeach;?>

               </tbody>

          </table>
      

          <form class= "form" action="../controllers/TrajetController.php" method="POST" >
          <select name="wilaya" class="email formEntry" >
				<option value = ""></option>
				<option value = "Adrar">Adrar</option>
				<option value = "Chlef">Chlef</option>
				<option value = "Laghouat">Laghouat</option>
				<option value = "Oum El Bouaghi">Oum El Bouaghi</option>
				<option value = "Batna">Batna</option>
				<option value = "Bejaia">Bejaia</option>
				<option value = "Biskra">Biskra</option>
				<option value = "Bechar">Bechar</option>
				<option value = "Blida">Blida</option>
				<option value = "Bouira">Bouira</option>
				<option value = "Tamanrasset">Tamanrasset</option>
				<option value = "Tebessa">Tebessa</option>
				<option value = "Tlemcen">Tlemcen</option>
				<option value = "Tiaret">Tiaret</option>
				<option value = "Tizi Ouzou">Tizi Ouzou</option>
				<option value = "Alger">Alger</option>
				<option value = "Djelfa">Djelfa</option>
				<option value = "Jijel">Jijel</option>
				<option value = "Setif">Setif</option>
				<option value = "Saida">Saida</option>
				<option value = "Skikda">Skikda</option>
				<option value = "Sidi Bel Abbes">Sidi Bel Abbes</option>
				<option value = "Annaba">Annaba</option>
				<option value = "Guelma">Guelma</option>
				<option value = "Constantine">Constantine</option>
				<option value = "Medea">Medea</option>
				<option value = "Mostaganem">Mostaganem</option>
				<option value = "MSila">MSila</option>
				<option value = "Mascara">Mascara</option>
				<option value = "Ouargla">Ouargla</option>
				<option value = "Oran">Oran</option>
				<option value = "32">El Bayadh</option>
				<option value = "33">Illizi</option>
				<option value = "34">Bordj Bou Arreridj</option>
				<option value = "35">Boumerdes</option>
				<option value = "36">El Tarf</option>
				<option value = "37">Tindouf</option>
				<option value = "38">Tissemsilt</option>
				<option value = "39">El Oued</option>
				<option value = "40">Khenchela</option>
				<option value = "41">Souk Ahras</option>
				<option value = "42">Tipaza</option>
				<option value = "43">Mila</option>
				<option value = "44">Ain Defla</option>
				<option value = "45">Naama</option>
				<option value = "46">Ain Temouchent</option>
				<option value = "47">Ghardaia</option>
				<option value = "48">Relizane</option>
			</select>
            <button class="submit formEntry" name="submitAjout">Ajouter</button>
          
               </form>

                </div><!--trajet-->
            </div><!--GlobalContainer-->
  
     <?php
    $v->btnCommentCaMarche();

        $v->footerPageConnexion();   
     
     ?>
<script type="text/javascript">
              function show1(){
                  console.log("show1");
                  document.getElementById('detailProfile').style.display="block";
                  document.getElementById('historique').style.display="none";
                  document.getElementById('Reponse').style.display="none";
                  document.getElementById('Trajet').style.display="none";
              }
              function show2(){
                console.log("show2");
                  document.getElementById('detailProfile').style.display="none";
                  document.getElementById('historique').style.display="block ";
                  document.getElementById('Reponse').style.display="none";
                  document.getElementById('Trajet').style.display="none";
              }
              function show3(){
                console.log("show2");
                  document.getElementById('detailProfile').style.display="none";
                  document.getElementById('historique').style.display="none";
                  document.getElementById('Reponse').style.display="block";
                  document.getElementById('Trajet').style.display="none";
              }
              function show4(){
                console.log("show2");
                  document.getElementById('detailProfile').style.display="none";
                  document.getElementById('historique').style.display="none";
                  document.getElementById('Reponse').style.display="none";
                  document.getElementById('Trajet').style.display="block";
              }
                </script>
</body>
</html>
<?php

}




}


?>