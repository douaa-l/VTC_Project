<?php 
require_once('../controllers/NewsController.php');

class AfficherNews{
  
    public function AfficherAllNews ($var,$nomNews,$nb){
      $controller = new NewsController();
    
        
      $rows = $controller->getNews();
       
      ?>
      <div style="margin-top:10%;margin-bottom: 10%;" >
       <?php 
       
       $i =$nb+8;
       $j=0;
       
        $nbrows=count($rows);
       
       
      foreach($rows as $line ):
          if($nb >=8){

            if($j <$nb){
              $j++;
            }
            else{
              
              if($nb< $i && $nb< $nbrows){
               
            ?>
            <div class="news"  >
            <?php
                           $content = $line['image'];
                           echo '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                           ?>
                       <h2><?=$line['titreNews'] ?></h2>
                        <a href ="LireSuiteNews.php?id=<?php echo $line['idNews']; ?>">lire la suite </a>
            </div> 
            <?php
            $nb++;
             }
            }

          }
          else{
            if($nb< $i){
             
          ?>
          <div class="news"  >
              <?php
          $content = $line['image'];
                           echo '<img src="data:image/png|image/jpeg|image/gif|image/jpg;base64,' . base64_encode( $content ) . '" />';
                           ?>
                         <h2><?=$line['titreNews'] ?></h2>
                         <a href ="LireSuiteNews.php?id=<?php echo $line['idNews']; ?>">lire la suite </a>
          </div> 
          <?php
          $nb++;
           }
          }
      
       endforeach;
      
    ?>
    </div>
    <?php
    if($nb== $nbrows){
      return -1;
    }else{
    return $nb;}
    }
    

}

?>