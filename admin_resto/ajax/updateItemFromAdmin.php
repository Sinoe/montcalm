<?php

include_once("../../includes/functions.php");
$montcalm = new Montcalm();


$nom_err =  $prix_err = $item_id_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//var_dump($_POST);
	// CHECK regular Value NOT empty
	if(empty(trim($_POST["nom"]))){
        $nom_err = "Veuillez saisir un Nom.";
    } else {
    	$nom = trim($_POST["nom"]);
        $arrayPost["nom"] = addslashes($nom);
    }

    if(empty(trim($_POST["prix"]))){
        $prix_err = "Veuillez saisir un Prénom.";
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
    	//INSERT USER 
        $updateItem = $montcalm->updateItem($arrayPost, $_POST['item_id']);
    
        if($updateItem == 'update Successful'){
        	//SendMAil;
            //echo "ok";
            header("Location:".$baseRedirectURL."admin_resto/plats.php");

        	//$sessionInfo = $user->sessionInfo($session_id);
        	
        } else {
        	echo $updateItem;
        }
    } else {
    	echo "Problème :<br>".$nom_err." ". $prix_err;
    }
}

?>