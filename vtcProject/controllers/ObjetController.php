<?php
session_start();
require_once('../models/ObjetModel.php');
require_once('../models/AnnoncesModel.php');

function compatibilitie_PoidVolume_MoyenTransport($poid,$unitPoid,$larg,$haut,$unitVolume,$moyenTransport)
{
	$poidNum= intval($poid);
    $largNum = intval($larg);
    $hautNum = intval($haut);
    $control= 0;
	if($moyenTransport == 'Motos'|| $moyenTransport== 'Voiture'){
        
        if((($unitPoid == 'G' AND $poidNum > 100000000) ||
        ($unitPoid == 'KG' AND $poidNum > 100 ) )){
            $control=1;  
        }
       
        if((($unitPoid == 'M' AND $larg * $haut > 6) || ($unitPoid == 'CM' AND $larg * $haut  > 600 ))){
            $control=1; 
        }
		if($control == 1){return true ;}else{return false;}
    }
    else{return false;}
}
if($_GET['c']==1){


if(isset($_POST['AjoutObjet'])){
    if(empty($_POST['nomObj']) || empty($_POST['typeObj']) || empty($_POST['poid2'])|| empty($_POST['poid1']) ||empty($_POST['volm1']) 
    ||(empty($_POST['larg']) && empty($_POST['haut']))|| empty($_POST['moyenTransport']) || !is_uploaded_file($_FILES['imageObj']['tmp_name'])){
        header('Location: ../views/AjouterObjet.php?message=1');
    }
    else{
        $nomObj =$_POST['nomObj'];
        $typeObj=$_POST['typeObj'];
        $poid2=$_POST['poid2'];
        $poid1=$_POST['poid1'];
        $poid1 .=' ';
        $poid1 .= $poid2;
        $larg=$_POST['larg'];
        $haut=$_POST['haut'];
        $volm1=$_POST['volm1'];
        $haut .= ' sur ';
        $haut .= $larg;
        $haut .= ' ';
        $haut .= $volm1;
        $moyenTransport=$_POST['moyenTransport'];
    
        if(compatibilitie_PoidVolume_MoyenTransport($_POST['poid1'],$_POST['poid2'],$_POST['larg'],$_POST['haut'],$_POST['volm1'],$moyenTransport)){
            header('Location: ../views/AjouterObjet.php?message=2'); 
        }else{
       
        $image = addslashes(file_get_contents($_FILES['imageObj']['tmp_name']));
        $objetModel = new ObjetModel();
   
      

        
        $row = $objetModel->inserteObjet($nomObj,$typeObj,$poid1,$haut,$moyenTransport,$image);
        $_SESSION['idObjet']= $row['idObjet'];
        header('Location: ../views/AjouterAnnonce.php'); 

         }
    }
}
else{

       echo 'Ajout OBjet no set';

   
}
}
if($_GET['c']==2){
    if(isset($_POST['AjoutAnnonce'])){
        if(empty($_POST['titre']) ||empty($_POST['adresseDepart']) || empty($_POST['wilayaDepart']) || empty($_POST['adresseArriver'])|| empty($_POST['wilayaArriver']) ||
        (empty($_POST['oui']) AND empty($_POST['non'] ))){
            header('Location: ../views/AjouterAnnonce.php?message=1'); 
        }
        else{
            $titre=$_POST['titre'];
            $adrDepart= $_POST['adresseDepart'];
            $adrArriver=$_POST['wilayaDepart'];
            $wilayaDepart=$_POST['adresseArriver'];
            $wilayaArriver= $_POST['wilayaArriver'];
            $adrDepart .= ' ';
            $adrDepart .=$wilayaDepart;
            $adrArriver.= ' ';
            $adrArriver .= $wilayaArriver;
            $matricule=$_SESSION['matricule'];
            $idObj=$_SESSION['idObjet'];
            if(empty($_POST['oui'])){
                $rep='0';
            }
            else{
                $rep='1';
            }
            if(($adrArriver == $adrDepart) AND ($wilayaArriver == $wilayaDepart)){
                header('Location: ../views/AjouterAnnonce.php?message=2'); 
            }
            else{
                $AnnoncesModel = new AnnoncesModel();
                $AnnoncesModel->insertAnnonce($titre,$adrDepart,$adrArriver,$rep,$matricule,$idObj);
                header('Location: ../views/Accueil.php');
            
            }
        }
    }
}