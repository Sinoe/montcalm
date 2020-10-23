<?php

include_once("../includes/functions.php");
$user = new Users();


$nom_err =  $prenom_err =  $societe_err = $fonction_err = $telephone_err = $session_id_err = $email_err = $pseudo_err = "";


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

    if(empty(trim($_POST["prenom"]))){
        $prenom_err = "Veuillez saisir un Prénom.";
    } else {
    	$prenom = trim($_POST["prenom"]);
        $arrayPost["prenom"] = addslashes($prenom);
    }

    if(empty(trim($_POST["societe"]))){
        $societe_err = "Veuillez saisir une Societe.";
    } else {
    	$societe = trim($_POST["societe"]);
        $arrayPost["societe"] = addslashes($societe);
    }

    if(empty(trim($_POST["fonction"]))){
        $fonction_err = "Veuillez saisir une Fonction.";
    } else {
    	$fonction = trim($_POST["fonction"]);
        $arrayPost["fonction"] = addslashes($fonction);
    }

    if(empty(trim($_POST["telephone"]))){
        $telephone_err = "Veuillez saisir un Télephone.";
    } else {
    	$telephone = trim($_POST["telephone"]);
        $arrayPost["telephone"] = addslashes($telephone);
    }

    if(empty(trim($_POST["session_id"]))){
        $session_id_err = "Veuillez sélectionner une Session.";
    } else {
    	$session_id = trim($_POST["session_id"]);
        $arrayPost["session_id"] = addslashes($session_id);
    }

    // CHECK EMAIL IS NOT EMPTY, VALID AND USER IS UNIQUE
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez saisir une adresse Email.";
    } else{
        //Vérification format de mail (mailIsValid)
            if( $user->mailIsValid($_POST["email"]) ){

                // Vérification mail unique 
                if( $user->checkUserUnique($_POST["email"], $_POST["session_id"])  < 1 ){
                	$email = trim($_POST["email"]);
        			$arrayPost["email"] = addslashes($email);
                } else {
                    $email_err = "Un utilisateur est déjà inscrit à cette session avec cette adresse email.";
                    //echo '<br> REDIRECT //ERREUR MAIL NOT UNIQUE;';
                }
            } else {
                $email_err = "Cet email est invalide.";
                //echo '<br> REDIRECT //ERREUR MAIL INVALIDE;';
            }
    }

    // CHECK PSEUDO IS NOT EMPTY AND UNIQUE
    if(empty(trim($_POST["pseudo"]))){
        $pseudo_err = "Veuillez saisir un pseudo.";
    } else{
    	if($user->checkPseudoUnique($_POST["pseudo"]) < 1 ){
    		$pseudo = trim($_POST["pseudo"]);
        	$arrayPost["pseudo"] = addslashes($pseudo);

	    } else {
	    	if($user->checkCouplePseudo($_POST["pseudo"], $_POST["email"]) > 0 ) {
	    		$pseudo = trim($_POST["pseudo"]);
	    		$arrayPost["pseudo"] = addslashes($pseudo);
	    	} else {
	    		$pseudo_err = "Cet pseudo est déjà utilisé.";
	    	}
	    }
    }

    //CHECK CREDENTIALS
    if( empty($nom_err) &&  empty($prenom_err) &&  empty($societe_err) && empty($fonction_err) && empty($telephone_err) && empty($session_id_err) && empty($email_err) && empty($pseudo_err) ){
    	//INSERT USER 
        $newUser = $user->addUserFromRun($arrayPost);
    
        if($newUser != 'Error'){
        	echo $newUser;

        } else {
        	echo "Une erreur est survenue : <br>";
        }
    } else {
    	echo "Votre inscription n'a pu être enregistrée :<br>".$nom_err." ". $prenom_err." ". $societe_err." ".$fonction_err." ".$telephone_err." ".$session_id_err." ".$email_err." ".$pseudo_err;
    }
}

?>