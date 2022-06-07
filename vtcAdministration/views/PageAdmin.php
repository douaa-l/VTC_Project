<?php
require_once('Composent.php');

class PageAdmin {

    public function afficherPageAdmin($type){
        $composant = new Composent ();
        ?>
        
        <!doctype html>
        <html lang="fr">
        
             <head>
        
                <meta charset="utf-8">
                <title>Page Admin</title>
                <link href="../Public/AdminPage.css" rel="stylesheet" type="text/css"/>
                
                
             </head>
        
             
        
             <body>
                 <div class='ContenairePrincipale'>
                    
                   <?php  
                 
                 if($type=='GestionGlobal'){
                  $composant->GestionGlobal(); 
                 }
                 elseif($type=='GestionContenu'){
                     
                    $composant->GestionContenu();

                 }
                 if($type=='GestionUsers'){
                   
                   $composant->GestionUsers();

                }
                 
                   
                  
                  
                   ?>
                </div>
            
        
             </body>
        </html>
        
        
        
        
        
        
        
        
        
        
        <?php  
        } 
}

?>