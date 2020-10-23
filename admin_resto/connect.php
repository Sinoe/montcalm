<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
		

	if( ( isset($_POST['email']) && !empty($_POST['email']) ) && ( isset($_POST['password']) && !empty($_POST['password']) ) ) {
		//Init USER CLASS
			include_once("../includes/functions.php");
	        $admin = new Admin();
			//$user = new Users();
	    //Check client exist

	        	// Check if username is empty
				if(empty(trim($_POST["email"]))){
					$user_email_err = "Veuillez entrer votre email.";
				} else{
					$user_email = trim($_POST["email"]);
				}
			    // Check if password is empty
				if(empty(trim($_POST["password"]))){
					$password_err = "Veuillez entrer votre mot de passe.";
				} else{
					$password = trim($_POST["password"]);
				}

			    // Validate credentials
				if(empty($user_email_err) && empty($password_err)) {

					$userInfos = $admin->getAdmin($user_email, $password);	

					if( isset($userInfos) ){
						$id = $userInfos["id"];
						$user_email = $userInfos["login"];
						$hashed_password = $userInfos["password"];

						if( password_verify($password, $hashed_password) ){
							$_SESSION['ADM_CONNECTED'] = true;
							$_SESSION['ADM_LOGIN'] = $user_email;
							$_SESSION['ADM_ROLE'] = '1';  
							//echo 'CONNECTE';
							header("Location:".$baseRedirectURL."admin_resto/plats.php");
						} else {
							header("Location:".$baseRedirectURL."admin_resto/index.php?error=1");
						}
					}
				}
	} else {
		header("Location:".$baseRedirectURL."index.php");
	}
?>

<?php include('includes/header.php'); ?>     

        <p>PAGE CONNEXION</p>
        <?php if(isset($_POST['email'])) : ?>
			<?php echo $_POST['email']; ?>
        <?php else : ?>
			<p>renvoyer sur index</p>
        <?php endif; ?>

<?php include('includes/footer.php'); ?>   