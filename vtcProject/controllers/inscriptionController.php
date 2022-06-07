<?php
session_start();
require_once('../models/UserModel.php');
require_once('../models/TrajetModel.php');
function tarifTransport($wilayaArrriver)
{
	if($wilayaArrriver == 'Alger'|| $wilayaArrriver=='Oran'||$wilayaArrriver=='Annaba'){
        $tarif=0.5;
    }elseif($wilayaArrriver == 'Batna'|| $wilayaArrriver=='Constantine'||$wilayaArrriver=='Skikda'){
        $tarif=0.4;
    }
    else {
     $tarif=0.3;
    }
    return $tarif;
}

function check_mdp_format($mdp)
{
	$majuscule = preg_match('@[A-Z]@', $mdp);
	$minuscule = preg_match('@[a-z]@', $mdp);
	$chiffre = preg_match('@[0-9]@', $mdp);
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8)
	{
		return false;
	}
	else 
		return true;
}

if(isset($_POST['submit'])){
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['tel'])|| empty($_POST['mail']) ||empty($_POST['adresse']) 
    ||(empty($_POST['oui']) && empty($_POST['non']))|| empty($_POST['day']) || empty($_POST['mois'])|| empty($_POST['annee'])||
    empty($_POST['sexe'])|| empty($_POST['wilaya'])||empty($_POST['password'])||empty($_POST['confirm'])|| (!empty($_POST['oui']) && (empty($_POST['wilayaArriver']))) ){
        if(!empty($_POST['oui']) && (empty($_POST['wilayaArriver']))){
            header('Location: ../views/Inscription.php?message=5');   
           
        }
       header('Location: ../views/Inscription.php?message=1');
      
    }
    else{
        if (check_mdp_format($_POST['password']) != true)
            {
                header('Location: ../views/Inscription.php?message=2');	
            }
            else{
                $password=$_POST['password'];
                if(empty($_POST['oui'])){
                    $type='Client';
                }
                else{
                    $type='Transporteur';
                }
                $nom= $_POST['nom'];
                $prenom=$_POST['prenom'];
                $sexe=$_POST['sexe'];
                $datenaissance= $_POST['annee'];
                $datenaissance .='-';
                $datenaissance .= $_POST['mois'];
                $datenaissance .='-';
                $datenaissance .= $_POST['day'];
                $tel=$_POST['tel'];
                $mail=$_POST['mail'];
                $adresse=$_POST['adresse'];
                $wilaya=$_POST['wilaya'];
                $model = new UserModel();
                if(is_uploaded_file($_FILES['image']['tmp_name'])){
                $image_tmp = $_FILES["image"]["tmp_name"];
                $image_size = $_FILES["image"]["size"];
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $reslt=$model->getUserByINFO($nom,$prenom,$password);
                     if($reslt == "user n'existe pas "){
                           $row = $model->inserteUser($nom,$prenom,$datenaissance,$sexe,$adresse,$wilaya,$tel,$mail,$password,$type,$image);
                            $_SESSION['matricule']=$row['matricule'];
                            $_SESSION['nom']=$row['nom'];
                            $_SESSION['prenom']=$row['prenom'];
                            $_SESSION['adresse']=$row['adresse'];
                            $_SESSION['wilaya']=$row['wilaya'];
                            
                             if($type == 'Transporteur'){
                                $mode=new TrajetModel();
                                if(isset($_POST['wilayaArriver']) && !empty($_POST['wilayaArriver'])){
                                    $Wilayas_Array = $_POST['wilayaArriver']; 
                                    foreach( $Wilayas_Array as $wilaya){
                                        $tarif=tarifTransport($wilaya);
                                        $mode->setWilaya ($wilaya,$tarif,$_SESSION['matricule']);
                                    }
                                }
                                 header('Location: ../views/Transporteur.php');	
                             }
                             else{
                                header('Location: ../views/Accueil.php');	
                             }
                     }
                     else{
                        header('Location: ../views/Inscription.php?message=4');
                     }
                  }
                  else{
                    header('Location: ../views/Inscription.php?message=3');
                  }

               
            
            
            }
        
       
    }
}
else{
    echo "sbmit no set";
}

?>