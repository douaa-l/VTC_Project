<?php
session_start();
require_once('PageAccueil.php');

$v1= new PageAccueil();
?>
<!doctype html>
<html lang="fr">

<?php

$v1-> entetePage();

?>
<body>
    <div  ><!--id="GlobalContainer" style="width: 90%;"-->

    <?php
     if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        $login=true;
     //   $v1->headerPageConnexion();
        $v1->menuConnexion();
    }
    else {
        $login=false;
     //   $v1->headerPage();
        $v1->menu();
    }
 ?>
 <div class="marg" style=" height: 100rem;">
    <form  class= "form" action="../controllers/ObjetController.php?c=2" method="POST" style=" max-width:50%;margin-top: 5%;" enctype="multipart/form-data">
    
   
        <img src ="Public/Logo1.jpg" style="width:40%;height:40%; margin-left: 30%;">
        <hr style="border: 2px solid #335449; width:90%; margin-right:auto;margin-left:auto;"/>
        <?php
                if(isset($_GET['message'])){
                    if($_GET['message']== '1'){
                        echo "<p style='color:red; margin-left:35%;'>Faut remplir tous les champs!</p>";
                    }
                    else{
                      if($_GET['message']== '2'){
                        echo "<p style='color:red; margin-left:15%;'>Transport vers la meme adresse de départ c'est impossible !</p>";
                      }
                    
                     
                    }
                  
                       
                       
                }
                ?>
                <h2 style="margin-left:15%;">Détail de l'annonce:</h2>
                <div class= "inputName">
        <label  >Nom Objet:</label>
        <input type="text" class="email formEntry" placeholder="Titre Annonce" name="titre"/>
            </div>
                <div class= "inputName">
        <label  >Adresse exacte de départ sans wilaya:</label>
        <input type="text" class="email formEntry" placeholder="N° rue et ville" name="adresseDepart"/>
        <label>Wilaya de départ:</label>
				<select name="wilayaDepart" class="email formEntry"style="width:35%; height: 35px;" >
			
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
        </div>
        <div class= "inputName">
        <label  >Adresse exacte d'arriver:</label>
        <input type="text" class="email formEntry" placeholder="N° rue et ville" name="adresseArriver"/>
        <label>Wilaya d'arriver:</label>
				<select name="wilayaArriver" class="email formEntry"style="width:35%; height: 35px;" >
			
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
            </div>
       

            <div class= "inputName">
        <label style="font-size: 20px;" >Voulez vous que le transport de cet objet soit garantie ?</label>
        <input type="radio"class="form-radio" id="input_43_0" name="oui"/>
        <label id="label_input_43_0" for="input_43_0"> Oui </label>
        <input type="radio" class="form-radio" id="input_43_1" name="non"/>
        <label id="label_input_43_1" for="input_43_1"> Non </label>
        </div>
        <button class="submit formEntry" name="AjoutAnnonce">Valider l'annonce</button>

</form>
       

              
 </div>
 <?php    
$v1->btnCommentCaMarche();

if($login == true){
    $v1->footerPageConnexion();   
   }
   else{
    $v1->footerPage();
   } 
   ?>
</body>
</html>