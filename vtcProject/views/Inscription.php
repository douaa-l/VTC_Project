<?php 
require_once('AfficherNews.php');
require_once('PageAccueil.php');
$v= new PageAccueil();

?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"  style="width:90%;height: 170rem;"-->
    <?php
  //  $v->headerPage();
    $v->menu();
?>


    <div class="marg" style=" height: 130rem;">
    <form  class= "form" action="../controllers/inscriptionController.php" method="POST" style=" max-width:50%;margin-top: 5%;" enctype="multipart/form-data">
    
   
        <img src ="Public/Logo1.jpg" style="width:40%;height:40%; margin-left: 30%;">
        <hr style="border: 2px solid #335449; width:90%; margin-right:auto;margin-left:auto;"/>
        <?php
                if(isset($_GET['message'])){
                    if($_GET['message']== '1'){
                        echo "<p style='color:red; margin-left:35%;'>Faut remplir tous les champs!</p>";
                    }
                    else{
                      if($_GET['message']== '2'){
                        echo "<p style='color:red; margin-left:15%;'>Mot de passe doit contenir: lettre majiscule, miniscule, chiffre, minimum 9 caractères</p>";
                      }
                      elseif($_GET['message']== '3'){
                        echo "<p style='color:red; margin-left:35%;'>Faut choisir une photos</p>";
                      }
                      elseif($_GET['message']== '4'){
                        echo "<p style='color:red; margin-left:35%;'>Utilisateur déja inscrit!</p>"; 
                      }
                      elseif($_GET['message']== '5'){
                        echo "<p style='color:red; margin-left:10%;'>Tanque vous voulez s'inscrir en tant que transporteur faut indiquer le trajet possible!</p>"; 
                      }
                     
                    }
                  
                       
                       
                }
                ?>
        <div class= "inputName">
        <label  >Nom complet:</label>
        <input type="text" class="email formEntry" placeholder="Prénom" name="prenom"/>
        <input type="text" class="email formEntry" placeholder="Nom" name="nom"/>
        </div>
        <div class= "inputName">
        <label  >Mot de passe :
        <input type="password" class="email formEntry" id="password" placeholder="Mot de passe" name="password" onkeyup='check(); '/>
        </label>
        <label>confirm password:
        <input type="password" class="email formEntry" id="confirm_password" placeholder="Confirmer mot de passe" name="confirm" onkeyup='check();'/>
        <span id='message'></span>
        </label>
        
        </div>
       
        <div class= "inputName">
        <label  >Date de naissance:</label>
        <select name="day" style="width:15%;height: 25px;" >
            
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9 </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="12"> 12 </option>
                <option value="13"> 13 </option>
                <option value="14"> 14 </option>
                <option value="15"> 15 </option>
                <option value="16"> 16 </option>
                <option value="17"> 17 </option>
                <option value="18"> 18 </option>
                <option value="19"> 19 </option>
                <option value="20"> 20 </option>
                <option value="21"> 21 </option>
                <option value="22"> 22 </option>
                <option value="23"> 23 </option>
                <option value="24"> 24 </option>
                <option value="25"> 25 </option>
                <option value="26"> 26 </option>
                <option value="27"> 27 </option>
                <option value="28"> 28 </option>
                <option value="29"> 29 </option>
                <option value="30"> 30 </option>
                <option value="31"> 31 </option>
              </select>
              <select name="mois" style="width:20%; height: 25px;" >
            
                <option value="01"> Janvier</option>
                <option value="02"> Février </option>
                <option value="03"> Mars </option>
                <option value="04"> Avril </option>
                <option value="05"> Mai </option>
                <option value="06"> Juin </option>
                <option value="07"> Juillet </option>
                <option value="08"> Août </option>
                <option value="09"> Septembre </option>
                <option value="10"> Octobre </option>
                <option value="11"> Novembre </option>
                <option value="12"> Décembre </option>
              </select>
              <select name="annee"style=" height: 25px;" >
             
                <option value="2021"> 2021 </option>
                <option value="2020"> 2020 </option>
                <option value="2019"> 2019 </option>
                <option value="2018"> 2018 </option>
                <option value="2017"> 2017 </option>
                <option value="2016"> 2016 </option>
                <option value="2015"> 2015 </option>
                <option value="2014"> 2014 </option>
                <option value="2013"> 2013 </option>
                <option value="2012"> 2012 </option>
                <option value="2011"> 2011 </option>
                <option value="2010"> 2010 </option>
                <option value="2009"> 2009 </option>
                <option value="2008"> 2008 </option>
                <option value="2007"> 2007 </option>
                <option value="2006"> 2006 </option>
                <option value="2005"> 2005 </option>
                <option value="2004"> 2004 </option>
                <option value="2003"> 2003 </option>
                <option value="2002"> 2002 </option>
                <option value="2001"> 2001 </option>
                <option value="2000"> 2000 </option>
                <option value="1999"> 1999 </option>
                <option value="1998"> 1998 </option>
                <option value="1997"> 1997 </option>
                <option value="1996"> 1996 </option>
                <option value="1995"> 1995 </option>
                <option value="1994"> 1994 </option>
                <option value="1993"> 1993 </option>
                <option value="1992"> 1992 </option>
                <option value="1991"> 1991 </option>
                <option value="1990"> 1990 </option>
                <option value="1989"> 1989 </option>
                <option value="1988"> 1988 </option>
                <option value="1987"> 1987 </option>
                <option value="1986"> 1986 </option>
                <option value="1985"> 1985 </option>
                <option value="1984"> 1984 </option>
                <option value="1983"> 1983 </option>
                <option value="1982"> 1982 </option>
                <option value="1981"> 1981 </option>
                <option value="1980"> 1980 </option>
                <option value="1979"> 1979 </option>
                <option value="1978"> 1978 </option>
                <option value="1977"> 1977 </option>
                <option value="1976"> 1976 </option>
                <option value="1975"> 1975 </option>
                <option value="1974"> 1974 </option>
                <option value="1973"> 1973 </option>
                <option value="1972"> 1972 </option>
                <option value="1971"> 1971 </option>
                <option value="1970"> 1970 </option>
                <option value="1969"> 1969 </option>
                <option value="1968"> 1968 </option>
                <option value="1967"> 1967 </option>
                <option value="1966"> 1966 </option>
                <option value="1965"> 1965 </option>
                <option value="1964"> 1964 </option>
                <option value="1963"> 1963 </option>
                <option value="1962"> 1962 </option>
                <option value="1961"> 1961 </option>
                <option value="1960"> 1960 </option>
                <option value="1959"> 1959 </option>
                <option value="1958"> 1958 </option>
                <option value="1957"> 1957 </option>
                <option value="1956"> 1956 </option>
                <option value="1955"> 1955 </option>
                <option value="1954"> 1954 </option>
                <option value="1953"> 1953 </option>
                <option value="1952"> 1952 </option>
                <option value="1951"> 1951 </option>
                <option value="1950"> 1950 </option>
                <option value="1949"> 1949 </option>
                <option value="1948"> 1948 </option>
                <option value="1947"> 1947 </option>
                <option value="1946"> 1946 </option>
                <option value="1945"> 1945 </option>
                <option value="1944"> 1944 </option>
                <option value="1943"> 1943 </option>
                <option value="1942"> 1942 </option>
                <option value="1941"> 1941 </option>
                <option value="1940"> 1940 </option>
              
              </select>
      
        </div>


        <div class= "inputName">
        <label  >Sexe:</label>
        <select name="sexe" class="email formEntry">
                <option>  </option>
                <option value="femme"> Femme </option>
                <option value="homme"> Homme </option>
        </select>
        </div>
        <div class= "inputName">
        <label  >Numéro de téléphone:</label>
        <input type="tel" class="email formEntry" placeholder="0xxxxxxxxx" name="tel"  pattern="0[5-7]{1}[0-9]{8}" required />
        </div>
        <div class= "inputName">
        <label  >E-mail:</label>
        <input type="email" class="email formEntry" placeholder="format: xxx@xxx.xxx" name="mail" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*" required/>
        </div>
        <div class= "inputName">
        <label  >Adresse:</label>
        <input type="text" class="email formEntry" placeholder="N° rue et ville" name="adresse"/>
        <label>Votre wilaya</label>
				<select name="wilaya" class="email formEntry"style="width:35%; height: 25px;" >
			
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
        <label style="font-size: 20px;" >Voulez vous s'inscrire comme étant un transporteur ?</label>
        <input type="radio"class="form-radio" id="input_43_0" name="oui"/>
        <label id="label_input_43_0" for="input_43_0"> Oui </label>
        <input type="radio" class="form-radio" id="input_43_1" name="non"/>
        <label id="label_input_43_1" for="input_43_1"> Non </label>
        </div>
        <div class= "inputName">
        <label>Sélectionner les wilayas de votre trajet possible:</label>
        <select name="wilayaArriver[]" multiple="multiple" style="width:20%; height: 35px;" >
		
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
				<option value = "El Bayadh">El Bayadh</option>
				<option value = "Illizi">Illizi</option>
				<option value = "Bordj Bou Arreridj">Bordj Bou Arreridj</option>
				<option value = "Boumerdes">Boumerdes</option>
				<option value = "El Tarf">El Tarf</option>
				<option value = "Tindouf">Tindouf</option>
				<option value = "Tissemsilt">Tissemsilt</option>
				<option value = "El Oued">El Oued</option>
				<option value = "Khenchela">Khenchela</option>
				<option value = "Souk Ahras">Souk Ahras</option>
				<option value = "Tipaza">Tipaza</option>
				<option value = "Mila">Mila</option>
				<option value = "Ain Defla">Ain Defla</option>
				<option value = "Naama">Naama</option>
				<option value = "Ain Temouchent">Ain Temouchent</option>
				<option value = "Ghardaia">Ghardaia</option>
				<option value = "Relizane">Relizane</option>	
        </select>
        </div>
        <div class= "inputName">
        <label for="avatar">Ajouter une photos de profile:</label>

        <input type="file" id="avatar" name="image" accept="image/png, image/jpeg">
        </div>
        <button class="submit formEntry" name="submit">S'inscrire</button>

       

    </form>
        
   
    </div><!-- div marg--->
    <?php
   
        $v->btnCommentCaMarche();
        
          $v->footerPage();
         
 

   ?>
    
   
    </div>
    <script type="text/javascript">
        var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'mot de passe confirmé';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'mot de passe non confirmé';
  }
}
           
                </script> 

</body>
</html>
