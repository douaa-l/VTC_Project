<?php 
session_start();
require_once('PageAccueil.php');
class Statistique {


public function AfficherStatistique ( array $nbUsers, array $nbNews, array $nbAnnonces){
    $v= new PageAccueil();

?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div  > <!--id="GlobalContainer" style="width:90%; height: 120rem;"-->
    <?php
    if(isset($_SESSION['matricule'])){
    // $v->headerPageConnexion();
     $v->menuConnexion();
     $login=true;

    }else{
    // $v->headerPage();
     $v->menu();
     $login=false;
    }
   

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
                          Statistiques du site
                        </text>
                </svg>
            </div>
            <div>
        <div class="info" style="padding: 50px;"> 
            <p  style="font-size: 22px;">Nombre totale des utilisateur du site: <strong style="color:#007b5e;font-size: 30px;"><?=$nbUsers['totale'] ?></strong> </p>
            <p style="font-size: 22px;">Nombre totale des clients: <strong style="color:#007b5e;font-size: 30px;"><?=$nbUsers['client'] ?></strong> </p>
            <p style="font-size: 22px;">Nombre totale des transporteurs: <strong style="color:#007b5e;font-size: 30px;"><?=$nbUsers['transporteur'] ?></strong> </p>
            <p style="font-size: 22px;">Dispersser comme suit:</p>
        
          </div>
             <div id="button">
                <button id="selectSexe" class="btn" onclick="show1()"> Sexe</button>
              
                <button id="selectAge"class="btn" onclick="show2()">Age</button>
                <button id="selectAge"class="btn" onclick="show3()">Région</button>
              
               
            </div><!--button-->
    <div id="tableSexe">
    <table class="fl-table" >
               <thead>
                    <tr id="PremiereLigne">
                        <th scope="col" > Catégorie</th>
                         <th scope="col" > Nombre de clients</th>
                         <th scope="col" > Nombre de transporteurs</th>
                        
                    </tr>
               </thead>
               <tbody>
               
                   <tr >
                    <th>Femme</th>
                    <td ><?=$nbUsers['clientfemme'] ?></td>
                    <td ><?=$nbUsers['transporteurfemme'] ?></td>
                   
                   </tr>
                   <tr >
                    <th>Homme</th>
                    <td ><?=$nbUsers['clienthomme'] ?></td>
                    <td ><?=$nbUsers['transporteurhomme'] ?></td>
                   
                   </tr>
                  

               </tbody>
               <tfoot>
                    <tr >
                         <th>Totale</th>
                         <td><?=$nbUsers['client'] ?></td>
                         <td><?=$nbUsers['transporteur'] ?></td>
                    </tr>
               </tfoot>

          </table>
</div><!--tableSexe-->
<div id="tableAge" style="display:none;">
          <table  class="fl-table" >
               <thead>
                    <tr id="PremiereLigne">
                        <th scope="col" > Catégorie </th>
                         <th scope="col" > Nombre de clients</th>
                         <th scope="col" > Nombre de transporteurs</th>
                        
                    </tr>
               </thead>
               <tbody>
               
                   <tr >
                    <th>18ans < Age > 30ans </th>
                    <td ><?=$nbUsers['client30'] ?></td>
                    <td ><?=$nbUsers['transporteur30'] ?></td>
                   
                   </tr>
                   <tr >
                    <th>30ans < Age > 50ans</th>
                    <td ><?=$nbUsers['client50'] ?></td>
                    <td ><?=$nbUsers['transporteur50'] ?></td>
                  
                   
                   </tr>
                   <tr>
                   <th>Age > 50ans</th>
                    <td ><?=$nbUsers['client60'] ?></td>
                    <td ><?=$nbUsers['transporteur60'] ?></td>
                  
                   
                   </tr>
                  

               </tbody>
               <tfoot>
                    <tr >
                         <th>Totale</th>
                         <td><?=$nbUsers['client'] ?></td>
                         <td><?=$nbUsers['transporteur'] ?></td>
                    </tr>
               </tfoot>

          </table>
</div><!--Age-->

<div id="tableRegion" style="display:none;">
          <table  class="fl-table" >
               <thead>
                    <tr id="PremiereLigne">
                        <th scope="col" > Régions </th>
                         <th scope="col" > Nombre de clients</th>
                         <th scope="col" > Nombre de transporteurs</th>
                        
                    </tr>
               </thead>
               <tbody>
               
                   <tr >
                    <th>Sude </th>
                    <td ><?=$nbUsers['sud'] ?></td>
                    <td ><?=$nbUsers['sudT'] ?></td>
                   
                   </tr>
                   <tr >
                    <th>Nord</th>
                    <td ><?=$nbUsers['nord'] ?></td>
                    <td ><?=$nbUsers['nordT'] ?></td>
                  
                   
                   </tr>
                   <tr>
                   <th>Ouest</th>
                    <td ><?=$nbUsers['ouest'] ?></td>
                    <td ><?=$nbUsers['ouestT'] ?></td>
                   </tr>
                   <tr>
                   <th>Est</th>
                    <td ><?=$nbUsers['east'] ?></td>
                    <td ><?=$nbUsers['eastT'] ?></td>
                   </tr>

                  

               </tbody>
               <tfoot>
                    <tr >
                         <th>Totale</th>
                         <td><?=$nbUsers['client'] ?></td>
                         <td><?=$nbUsers['transporteur'] ?></td>
                    </tr>
               </tfoot>

          </table>
</div><!--region-->

           
<div class="info" style="margin-top:10%;margin-buttom:7%;padding: 50px;"> 
            <p style="font-size: 22px;">Nombre totale des Annonces publiées dans le site: <strong style="color:#007b5e;font-size: 30px;"><?=$nbAnnonces['totale'] ?></strong>  </p>
            <p  style="font-size: 22px;">Nombre totale des News publiés dans le site:  <strong style="color:#007b5e;font-size: 30px;"><?=$nbNews['totale'] ?></strong></p>
           
        
  
</div>    
<div id="tableNewsAnnonce">
          <table class="fl-table" >
               <thead>
                    <tr id="PremiereLigne">
                        <th scope="col" > Année </th>
                         <th scope="col" > Nombre d'annonces</th>
                         <th scope="col" > Nombre de news</th>
                        
                    </tr>
               </thead>
               <tbody>
               
                   <tr >
                    <th>2021 </th>
                    <td ><?=$nbAnnonces['2021'] ?></td>
                    <td ><?=$nbNews['2021'] ?></td>
                   
                   </tr>
                   <tr >
                    
                    <th>2020 </th>
                    <td ><?=$nbAnnonces['2020'] ?></td>
                    <td ><?=$nbNews['2020'] ?></td>
                   
                   </tr>
                   <tr>
                   <th>2019</th>
                   <td ><?=$nbAnnonces['2019'] ?></td>
                    <td ><?=$nbNews['2019'] ?></td>
                   </tr>
                   <tr>
                   <th>2018</th>
                   <td ><?=$nbAnnonces['2018'] ?></td>
                    <td ><?=$nbNews['2018'] ?></td>
                   </tr>
                   <tr>
                   <th>2017</th>
                   <td ><?=$nbAnnonces['2017'] ?></td>
                    <td ><?=$nbNews['2017'] ?></td>
                   </tr>

                  

               </tbody>
               <tfoot>
                    <tr >
                         <th>Totale</th>
                         <td><?=$nbAnnonces['totale'] ?></td>
                         <td><?=$nbNews['totale'] ?></td>
                    </tr>
               </tfoot>

          </table>
</div><!--region-->
           
    </div> <!-- marg -->
    <?php
   
        $v->btnCommentCaMarche();   
        
        if($login == true){
          $v->footerPageConnexion();   
         }
         else{
          $v->footerPage();
         } 
     ?>
    
   
    </div>
   
    <script type="text/javascript">
         
              function show1(){
                
                  document.getElementById('tableSexe').style.display="block";
                  document.getElementById('tableAge').style.display="none";
                  document.getElementById('tableRegion').style.display="none";
              }
              function show2(){
              
                  document.getElementById('tableSexe').style.display="none";
                  document.getElementById('tableAge').style.display="block";
                  document.getElementById('tableRegion').style.display="none";
              }
              function show3(){
              
              document.getElementById('tableSexe').style.display="none";
              document.getElementById('tableAge').style.display="none";
              document.getElementById('tableRegion').style.display="block";
          }
          
           
                </script>
               <script src="Chart.js"></script> 
</body>
</html>
<?php

}


}
?>