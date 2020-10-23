<?php 

include_once("../includes/functions.php");

$user = new Users();


$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`

//var_dump($_POST);

/* Validate the form on the server side */
if (empty($_POST['pseudo'])) { //Name cannot be empty
    $errors['pseudo'] = 'Pseudo cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
}
else { //If not, process the form, and return true on success
    //SELECT COUNT(*) AS count FROM `sim_users` WHERE pseudo = 'User1' AND email = "user1@gmail.com"

	if( $user->checkPseudoUnique($_POST["pseudo"]) < 1 ){
    	$form_data['success'] = true;
    }
    else {
        // if pseudo en BDD correspond à la même adresse mail => OK
        if($user->checkCouplePseudo($_POST["pseudo"], $_POST["email"]) > 0 ) {
            //LE PSEUDO EST UTILISE PAR LE MËME USER
            $form_data['success'] = true;
        } else {
            $form_data['success'] = false;
        }
    	
    }
}

if($form_data['success']){
	echo 'true';
} else {
	echo 'false';
}

 ?>