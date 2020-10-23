<?php 

include_once("../includes/functions.php");

$user = new Users();


$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`

//var_dump($_POST);

/* Validate the form on the server side */
if (empty($_POST['email'])) { //Name cannot be empty
    $errors['email'] = 'Email cannot be blank';
}

if (empty($_POST['session_id'])) { //Name cannot be empty
    $errors['session_id'] = 'Session cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
}
else { //If not, process the form, and return true on success
    
	if( $user->checkUserUnique($_POST["email"], $_POST["session_id"]) < 1 ){
    	$form_data['success'] = true;
    }
    else {
    	$form_data['success'] = false;
    }
}

if($form_data['success']){
	echo 'true';
} else {
	echo 'false';
}

 ?>