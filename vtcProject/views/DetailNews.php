
<?php
require_once('../controllers/NewsController.php');
require_once('../models/NewsModel.php');


class DetailNews{

    public function detail($id){

        
        $controller = new NewsController();

            $row1=$controller->getNew($id);
            $row2=$controller->getSections($id);
            $mot=$controller->split_words($row1['titreNews']);
            
            ?>
            
            <div class="titreNews" >
                 
                 <div> 
                     <span style="font-size: 30px;"> <?=$row1['titreNews'] ?></span>
                 </div>
                 <span><?=$row1['dateCreation'] ?></span>
        
            </div>
            <div class="News"style="    margin-bottom: 15%;">
                 <?php
                foreach($row2 as $line ):

                    if($line['media']!= null){
                        ?>
                <div class="imageNews" style="width:90%;margin-left:5%;" >
                     <?php
                   
                     $content = $line['media'];
                     echo '<img style="width:100%;" src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                     ?>
                         <div class="container">
                         <p><?=$line['titreMedia'] ?> </p>
                         </div>
                </div>
                      <?php  
                    }
                    ?>

               
                <div >
                 
                 <h2 style="margin-top: 3%;    margin-bottom: 2%;"><?=$line['titreSection'] ?></h2>
                 <p><?=$line['descriptionSection'] ?> </p>
                </div>
                <?php
                endforeach;
                ?>
                 
             </div>
        <hr style=" border: 3px solid #335449;"/>
            
             <span style="margin-bottom: 5%; ">Ecrit par <?=$row1['auteur'] ?></span>
       
        
                 
               
            
 
            <?php




        
        }

    
}
?>