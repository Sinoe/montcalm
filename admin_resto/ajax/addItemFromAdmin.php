<?php

include_once("../../includes/functions.php");
$montcalm = new Montcalm();


$nom_err =  $prix_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//var_dump($_POST);
	// CHECK regular Value NOT empty
	if(empty(trim($_POST["nom"]))){
        $nom_err = "Veuillez saisir un Plat.";
    } else {
    	$nom = trim($_POST["nom"]);
        $arrayPost["nom"] = addslashes($nom);
    }

    if(empty(trim($_POST["prix"]))){
        $prix_err = "Veuillez saisir un Prix.";
    } else {
    	$prix = trim($_POST["prix"]);
        $arrayPost["prix"] = addslashes($prix);
    }

    if(! empty(trim($_POST["ordering"]))){
    	$ordering = trim($_POST["ordering"]);
        $arrayPost["ordering"] = addslashes($ordering);
    }

    //CHECK CREDENTIALS
    if( empty($nom_err) &&  empty($prix_err) ){
        //INSERT ITEM
        $insertItem = $montcalm->insertItem($arrayPost);
    
         if($insertItem != 'Error'){
        	echo $insertItem;

        } else {
        	echo "Une erreur est survenue : <br>".$insertItem;
        }
    } else {
    	echo "Le plat n'a pu être enregistrée :<br>".$nom_err." ". $prix_err;
    }


}

?>