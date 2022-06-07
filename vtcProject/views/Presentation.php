<?php
session_start();
require_once('PageAccueil.php');
require_once('../controllers/PresentationController.php');

$v= new PageAccueil();
$Presentation = new PresentationController();
?>

<!doctype html>
<html lang="fr">
<?php

$v-> entetePage();

?>
<body>
    <div ><!--id="GlobalContainer"  style="width: 90%;"-->

    <?php
    if(isset($_SESSION['matricule'])){
        $idUser=$_SESSION['matricule'];
        $login=true;
       // $v->headerPageConnexion();
        $v->menuConnexion();
    }
    else {
        $login=false;
       // $v->headerPage();
        $v->menu();
    }
    $row=$Presentation->getPresentation();
    ?>
               <div class="titre" style="margin-left:2%;">
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
                            <?=$row['titrePresentation'] ?>
                        </text>
                </svg>
            </div>
            <?php
            $pieces = array();
            $pieces = preg_split("/[\\r\\t\\n]+/i", $row['discriptionPresentation']);
            foreach($pieces as $element)
            {
                ?>
                     <div class="detailAnnonce">
                      <p class="typing-demo" style=" width: 90%;margin-top:0%;margin-left:1%;">
                        <?=$element ?>
           
                     </p>
                     </div>
                <?php
            }

    
    $image = $Presentation->getMedia('0');
    $video=$Presentation->getMedia('1');
    foreach($image as $line ):
       
        ?>
       
        <div class="imageAnnonce" style="margin-bottom: 7%;">
                         <?php
                         $content = $line['media'];
                         echo '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                         ?>
                    </div> 
        

        <?php
    
    endforeach;
    
    ?>
    <hr/>
        <h2 style="margin-left:7%;margin-top:3%;" id="ancre" > Comment ça marche ?</h2>
    
    <?php
     foreach($video as $line ):
       
        ?>
       
        <div  style="margin:7% 0% 7% 10%;">
                         <?php
                         $content = $line['media'];
                         echo '<video src="data:video/mp4;base64,'. base64_encode( $content ) . '" width="90% " height="500"
                         preload="auto" controls="autoplay"></video>';
                    
                         ?>
                    </div> 
        

        <?php
    
    endforeach;
    
    if($login == true){
        $v->footerPageConnexion();   
       }
       else{
        $v->footerPage();
       }

    ?>
    </div>
   
   
   

</body>
</html>



