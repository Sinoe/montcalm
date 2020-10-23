<?php

//GLOBALS
//$baseRedirectURL = 'https://www.conventionhusqvarna2017.fr/';
$baseRedirectURL = 'http://127.0.0.1/dev/montcalm/';
$target_dir = "C:/xampp/htdocs/dev/montcalm/uploads/";
$target_thumb_dir = "C:/xampp/htdocs/dev/montcalm/uploads/thumbs/";
// $baseRedirectURL = 'http://fk-agency-preprod.com/mitsu-plateforme-collab/';
// $target_dir = "http://fk-agency-preprod.com/mitsu-plateforme-collab/uploads/";
// $target_thumb_dir = "http://fk-agency-preprod.com/mitsu-plateforme-collab/uploads/thumbs/";

class Montcalm {

	function __construct(){
		//database configuration
		include('dbConfig.php');

		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
			mysqli_set_charset($con, "utf8");
		}
	}

	/*TRACES*/
		function storeTrace($id_admin, $method, $message){
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $IP = $_SERVER['HTTP_CLIENT_IP'];
			} else {
			    $IP = $_SERVER['REMOTE_ADDR'];
			}

			$mysqli = $this->connect;
			$id_admin = $mysqli->real_escape_string($id_admin);
			$method = $mysqli->real_escape_string($method);
			$message = $mysqli->real_escape_string($message);

			$insert = mysqli_query($this->connect, "INSERT INTO ".$this->Traces_table_name." SET
				id_admin = '".$id_admin."',
				method = '".$method."',
				message = '".$message."',
				IP = '".$IP."',
				date_create = '".date("Y-m-d H:i:s")."'
			");
		}
/* MONTCALM */	
	/*PLAT FRONT*/

		function getPlats(){
			$mysqli = $this->connect;
			$sql = "SELECT * FROM plats WHERE `status` = '1' ORDER BY `ordering` ASC" ;
			$query = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
			
			$result = array();
			while ($data = mysqli_fetch_array($query)) {
			    $result[] = $data;
			}
			$query->free();
			return $result;
		}

		function getPlatsById($item_id){
			$mysqli = $this->connect;
			$query = mysqli_query($this->connect, " SELECT * FROM plats WHERE id = '".$item_id."'") or die(mysqli_error($this->connect));
			$result = mysqli_fetch_array($query);
			
            return $result;
		}

		function getCommandes(){
			$mysqli = $this->connect;
			$sql = "SELECT * FROM commandes ORDER BY STR_TO_DATE(`date`, '%Y-%m-%d') DESC" ;
			$query = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
			
			$result = array();
			while ($data = mysqli_fetch_array($query)) {
			    $result[] = $data;
			}
			$query->free();
			return $result;
		}

	/* *ADD CMD */	

	function addCmd(array $array_post){
			$mysqli = $this->connect;

			$arrayValues = $array_post;
			array_walk($array_post, function(&$value, $key){
		        $value = "{$key} = '{$value}'";
		    });

			$sInsert = implode(", ", array_values($array_post));

		    $insert = mysqli_query($this->connect,
				"INSERT INTO commandes
				SET ".$sInsert.",
				status = '1',
				created_at = '".date("Y-m-d H:i:s")."'");
			
			$insertId =	mysqli_insert_id($this->connect);
			if($insert){
				//echo $insertId;
				return $insertId;
				//die;
			}else{
				return "Error";
				// return "INSERT INTO commandes
				// SET ".$sInsert.",
				// status = '1',
				// created_at = '".date("Y-m-d H:i:s")."'";
			}
		}

	/* PLATS BACK */
		function insertItem (array $array_post){
			$mysqli = $this->connect;

			$arrayValues = $array_post;
			array_walk($array_post, function(&$value, $key){
		        $value = "{$key} = '{$value}'";
		    });

			$sInsert = implode(", ", array_values($array_post));

		    $insert = mysqli_query($this->connect,
				"INSERT INTO plats
				SET ".$sInsert.",
				status = '1',
				 created_at = '".date("Y-m-d H:i:s")."'");
			
			$insertId =	mysqli_insert_id($this->connect);
			if($insert){
				//echo $insertId;
				return $insertId;
				//die;
			}else{
				return "Error";
			}
		}
		/* DELETE PLATS */
		function deleteById($table, $id){
		
			$mysqli = $this->connect;
			$sql = "DELETE FROM ".$table." WHERE id = ".$id ;

			$delete = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
			
			if($delete){
				return "delete Successful";
			}else{
				return "Error";
			}
		}
		/* UPDATE PLATS */
		function updateItem (array $array_post, $item_id){
			$mysqli = $this->connect;

			$arrayValues = $array_post;
			array_walk($array_post, function(&$value, $key){
		        $value = "{$key} = '{$value}'";
		    });

			$sUpdate = implode(", ", array_values($array_post));

		    $update = mysqli_query($this->connect,
				"UPDATE plats
				SET ".$sUpdate.",
				 updated_at = '".date("Y-m-d H:i:s")."'
				 WHERE id = ".$item_id);

			if($update){
				return "update Successful";
			}else{
				return "Error => UPDATE plats
				SET ".$sUpdate.",
				 updated_at = '".date("Y-m-d H:i:s")."'
				 WHERE id = ".$item_id;
			}
		}

		function mailIsValid($mail){
			$regex_email = "#([\w\.]+)@(((?:[\w]+\.)+)([a-zA-Z]{2,4}))#";
			if( preg_match($regex_email, $mail) ){
				return true;
			}else{
	            $regex_email = "#[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}#";
	            if( preg_match($regex_email, $mail) ){
	                return true;
	            }else{
	            	$regex_email = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";
	            	if( preg_match($regex_email, $mail) ){
	            		return true;
	            	}else{
	                	return false;
	                }
	            }
			}
		}

		function randomPassword() {
		    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $pass = array(); //remember to declare $pass as an array
		    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $alphaLength);
		        $pass[] = $alphabet[$n];
		    }
		    return implode($pass); //turn the array into a string
		}



		function insertUser( $email, $password, $name, $firstname, $avatar = "avatar.png", $societe, $telephone){

			$mysqli = $this->connect;

			$email = $mysqli->real_escape_string($email);
			$password = password_hash($password, PASSWORD_DEFAULT);
			$name = $mysqli->real_escape_string($name);
			$firstname = $mysqli->real_escape_string($firstname);
			$societe = $mysqli->real_escape_string($societe);
			$telephone = $mysqli->real_escape_string($telephone);
			$avatar = $mysqli->real_escape_string($avatar);

			$insert = mysqli_query($this->connect,
				"INSERT INTO users
				SET email = '".$email."',
				 name = '".$name."',
				 firstname = '".$firstname."',
				 avatar = '".$avatar."',
				 societe = '".$societe."',
				 telephone = '".$telephone."',
				 password = '".$password."',
				 approved_at = 0,
				 created_at = '".date("Y-m-d H:i:s")."',
				 updated_at = '".date("Y-m-d H:i:s")."',
				 admin = '0'");
			if($insert){
				return "insert Successful";
			}else{
				return "Error";
			}
		}

		function updatePasswordUser($password, $email){

			$mysqli = $this->connect;

			$email = $mysqli->real_escape_string($email);
			$password = $mysqli->real_escape_string($password);
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			//$name = $mysqli->real_escape_string($name);

			$update = mysqli_query($this->connect,
				"UPDATE users SET
				 password = '".$passwordHash."',
				 updated_at = '".date("Y-m-d H:i:s")."'
				 WHERE email = '".$email."'");

			if($update){
				return "update Successful";
			}else{
				return "Error";
			}
		}


	/*MAILS*/
		/*MAILS*/
		public function sendMail($message, $email, $id){

		// return mail($to, $subject, $message, $headers);
			$to = $email;
			require( 'phpmailer/PHPMailerAutoload.php');
			$mail = new PHPMailer(true);
			// Configure gmail
			$mail->isSMTP();                                      // Set mailer to use SMTP
			//$mail->SMTPDebug = 2;
			
			$mail->Host = 'smtp.gmail.com';
			//$mail->Host = 'smtp-relay.sendinblue.com';
			
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			//$mail->Port = 587;
			$mail->Port = 465;
			
			//Set the encryption system to use - ssl (deprecated) or tls
			//$mail->SMTPSecure = 'tls';
			$mail->SMTPSecure = 'ssl';
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "mailer@fk-agency.com";
			//$mail->Username = "fabien.greppo@fk-agency.com";
			
			//Password to use for SMTP authentication
			$mail->Password = "FKMailer20!6";	
			//$mail->Password = "m4c3pGkSwWVrtgXR";


			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8';
			$mail->Encoding = "base64";

			$mail->setFrom('commande@montcalm.fr', 'Montcalm Restaurant');


			$mail->addAddress($to);     // Add a recipient
			$mail->addAddress('sinoe.grattepanche@gmail.com'); 

			$mail->Subject = "✔️🧈🍲 Nouvelle commande du site => #".$id;
			$mail->Body    = $this->setMessage($message);
			if(!$mail->Send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				exit;
			}
			return 'Message has been sent';
		}


		public function setMessage( $messageMail ){
			date_default_timezone_set('Europe/Paris');
			setlocale(LC_TIME, 'fr_FR','fra');
			//$infos = $infos_message;

			global $baseRedirectURL;

			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<!--[if !mso]><!-->
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<!--<![endif]--><meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>✔️🧈🍲 Nouvelle commande sur le site</title>
			<!--[if (gte mso 9)|(IE)]>
			<style type="text/css">
			table {border-collapse: collapse;}
			 </style>
			<![endif]-->
			<style type="text/css">
			/* Basics */
			 body {margin: 0 !important; padding: 0; background-color: #f7f7f7; }
			 .full-width-image img {width: 100%; max-width: 600px; height: auto; }
			 table {border-spacing: 0; font-family: sans-serif; color: #000; }
			 td {padding: 0; }
			 img {border: 0; }
			 div[style*="margin: 16px 0"] {margin:0 !important; }
			 .wrapper {width: 100%; table-layout: fixed; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
			 .webkit {max-width: 600px; margin: 0 auto; }
			 .outer {Margin: 0 auto; width: 100%; max-width: 600px; }
			 .full-width-image img {width: 100%; max-width: 600px; height: auto; }
			 .inner {padding: 0px; }
			 p {Margin: 0; }
			 a {color: #eb212e; text-decoration: underline; }
			 .h1 {font-size: 21px; font-weight: bold; Margin-bottom: 18px; }
			 .h2 {font-size: 18px; font-weight: bold; Margin-bottom: 12px; }
			 /* One column layout */
			 .one-column .contents {text-align: left; }
			 .one-column p {font-size: 18px; Margin-bottom: 10px; }
			 .one-column img {width: 100%; max-width: 600px; height: auto; }
			 /*Two column layout*/
			 .two-column {text-align: center; font-size: 0; }
			 .two-column .column {width: 100%; max-width: 300px; display: inline-block; vertical-align: top; }
			 .contents {width: 100%; }
			 .two-column .contents {font-size: 14px; text-align: left; }
			 .two-column img {width: 100%; max-width: 280px; height: auto; }
			 .two-column .text {padding-top: 10px; }
			 /*Three column layout*/
			 .three-column {text-align: center; font-size: 0; padding-top: 10px; padding-bottom: 10px; }
			 .three-column .column {width: 100%; max-width: 200px; display: inline-block; vertical-align: top; }
			 .three-column .contents {font-size: 14px; text-align: center; }
			 .three-column img {width: 100%; max-width: 180px; height: auto; }
			 .three-column .text {padding-top: 10px; }
			 /*Media Queries*/
			 @media screen and (max-width: 400px) {
			/*.two-column .column, .three-column .column {max-width: 100% !important; }
			 .two-column img {max-width: 100% !important; }
			 .two-column*/
			.two-column .column {max-width: 50% !important; }
			 .three-column img {max-width: 50% !important; }
			 }
			 @media screen and (min-width: 401px) and (max-width: 620px) {
			.three-column .column {max-width: 33% !important; }
			 .two-column .column {max-width: 50% !important; }
			 }
			/* Left sidebar layout */
			 .left-sidebar {text-align: center; font-size: 0; }
			 .left-sidebar .column {width: 100%; display: inline-block; vertical-align: middle; }
			 .left-sidebar .left {max-width: 271px; }
			 .left-sidebar .right {max-width: 329px; }
			 .left-sidebar .img {width: 100%; max-width: 80px; height: auto;}
			 .left-sidebar .contents {font-size: 14px; text-align: center; }
			 .left-sidebar a {color: #85ab70; }
			/* Right sidebar layout */
			 .right-sidebar {text-align: center; font-size: 0; }
			 .right-sidebar .column {width: 100%; display: inline-block; vertical-align: middle; }
			 .right-sidebar .left {max-width: 100px; }
			 .right-sidebar .right {max-width: 500px; }
			 .right-sidebar .img {width: 100%; max-width: 80px; height: auto; }
			 .right-sidebar .contents {font-size: 14px; text-align: center; }
			 .right-sidebar a {color: #70bbd9; }

			</style>
			</head>
			<body>
				<center class="wrapper">
				 <!--[if (gte mso 9)|(IE)]>
			    <table width="600" align="center">
			    <tr>
			    <td>
			    <![endif]-->
			    <table class="outer" align="center">

			    <tbody>
			<!-- HEADER -->
				<tr class="psingle">
				    <td class="one-column">
				        <table width="100%">
				            <tbody><tr>
				                <td align="center"><img width="200" style="width:200px; margin:0 auto;" src="https://sinoegrattepanche.com/img/logo-montcalm.png" alt="Logo Montcalm" /></td>
				            </tr>
				           	</tbody>
				        </table>
				    </td>
				</tr>
			<!-- CONTENT -->
				<tr class="psingle">
				    <td class="one-column">
				        <table width="100%">
				            <tbody><tr>
				                <td>
				                	'.$messageMail.'
				                </td>
				            </tr>
				           	</tbody>
				        </table>
				    </td>
				</tr>
				<!--[if (gte mso 9)|(IE)]>
						        </td>
						        </tr>
						        </table>
						        <![endif]-->
				</center>
			</body>';
			return $message;
		}
}
class Admin {
	
	function __construct(){
		//database configuration
		include('dbConfig.php');

		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
			mysqli_set_charset($con, "utf8");
		}
	}


	function getAdmin($name, $password){
			$mysqli = $this->connect;
			$query = mysqli_query($this->connect, " SELECT * FROM admin WHERE login = '".$name."'") or die(mysqli_error($this->connect));
			$result = mysqli_fetch_array($query);
			
            return $result;
    }
}    