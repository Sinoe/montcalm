<?php 

$menu_err = $nom_err =  $getDate_err = $tel_err = $email_err = "";

include_once('includes/functions.php');
$montcalm = new Montcalm();

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_POST);

    //CHECK MENU NOT EMPTY
    $items[] = $_POST['item'];
    $qty = 0;
    $total = 0;
    $messageCmd = "<ul>";
    $keys = array_keys($items);
    
    for($i = 0; $i < count($items); $i++) {
        foreach($items[$keys[$i]] as $key => $value) {
            //echo "ID = ".$key . " => QTY = " . $value['qty'] . "<br>";
            if($value['qty'] > 0){
                $qty = $qty + $value['qty'];
                $item = $montcalm->getPlatsById($key);
                $messageCmd = $messageCmd.'<li><span class="number">'.$value['qty'].'</span>&nbsp;:&nbsp;<span class="name">'.$item['nom'].'</span></li>';
                $subtotal = ($item['prix'] * $value['qty']);
                $total = ($total + $subtotal);
            }
        }
    }
    $messageCmd = $messageCmd.'</ul>';

    // echo $messageCmd;
    // echo ' TOTAL = '.$total;

    if($qty > 0){
        $arrayPost["content"] = addslashes($messageCmd);
        $arrayPost["cout"] = addslashes($total);
    } else {
        $menu_err = "- veuillez sélectionner au moins un plat<br>";
    }

    //CHECK NOM NOT EMPTY
    if(empty(trim($_POST["nom"]))){
        $nom_err = "Veuillez saisir un nom.";
    } else {
    	$nom = trim($_POST["nom"]);
        $arrayPost["client_nom"] = addslashes($nom);
    }

    //CHECK date NOT EMPTY
    if(empty(trim($_POST["getDate"]))){
        $getDate_err = "- veuillez saisir une date de retrait<br>";
    } else {
    	$getDate = trim($_POST["getDate"]);
        $arrayPost["date"] = addslashes($getDate);
    }

    //CHECK TEL

    if(empty(trim($_POST["tel"]))){
        $tel_err = "- veuillez saisir un numéro de télephone<br>";
    } else {
    	$tel = trim($_POST["tel"]);
        $arrayPost["client_tel"] = addslashes($tel);
    }


    //CHECK EMAIL
    if( $montcalm->mailIsValid($_POST["email"]) ){
        $email = trim($_POST["email"]);
        $arrayPost["client_mail"] = addslashes($email);
    } else {
        $email_err = "- veuillez saisir une adresse email valide<br>";
    }


    //ADD REMARQUES
    if(! empty(trim($_POST["remarques"]))){
    	$remarques = trim($_POST["remarques"]);
        $arrayPost["remarques"] = addslashes($remarques);
    }

    //CHECK CREDENTIALS
    if( empty($nom_err) && empty($menu_err) && empty($tel_err) && empty($email_err) && empty($menu_err) ){
    	//INSERT CMD 
        $newCmd = $montcalm->addCmd($arrayPost);
        
        if($newCmd != 'Error'){
            echo 'OK';
            //echo "<br>NEW CMD = ".$newCmd;
            //SEND MAIL TO BOYS
            $email = "willguillaume.resto@gmail.com";
            $message = '<p style="margin: 10px 0; color:#000; font-size:18px"><br><br><b>Nouvelle commande sur le site :</b></p><ul style="margin: 10px 0; color:#000; font-size:18px">'.$arrayPost["content"].'</ul><p style="margin: 10px 0; color:#000; font-size:18px"><b>Date de récupération :</b><br>'.date('d/m/Y',strtotime($arrayPost["date"])).'</p><p style="margin: 10px 0; color:#000; font-size:18px"><b>Total affiché :</b><br>'.$arrayPost["cout"].'€</p><p style="margin: 10px 0; color:#000; font-size:18px"><b>Remarques :</b><br>'.$arrayPost["remarques"].'</p><p style="margin: 10px 0; color:#000; font-size:18px"><b>Infos utilisateur:</b><br>- Nom : '.$arrayPost["client_nom"].'<br>- Mail : <a href="mailto:'.$arrayPost["client_mail"].'">'.$arrayPost["client_mail"].'</a><br>- Tel : <a href="tel:'.$arrayPost["client_tel"].'">'.$arrayPost["client_tel"].'</a></p><br><p style="margin: 10px 0; color:#000; font-size:18px">Créer sur le site le '.date("d/m/Y \à H:i:s" ).'.</p><br>';
                $mail = $montcalm->sendMail($message, $email, $newCmd, "boys");
                //$mail = $montcalm->setMessage($message);
                //var_dump($mail);
            //SEND MAIL TO CLIENT
                $ClientEmail = $arrayPost["client_mail"];
                $ClientMessage = '<p style="margin: 10px 0; color:#000; font-size:18px"><br>Bonjour,<br><br>Votre commande &agrave; emporter du '.date("d/m/Y \à H:i:s" ).' compos&eacute;e de</p><ul style="margin: 10px 0; color:#000; font-size:18px">'.$arrayPost["content"].'</ul><p style="margin: 10px 0; color:#000; font-size:18px">est bien prise en compte.<br><br>Vous pourrez la r&eacute;cup&eacute;rer le <b>'.date('d/m/Y',strtotime($arrayPost["date"])).' entre 18h30 et 21h00</b> au <a class="text-montcalm"  style="color:#014d49;" target="_blank" href="https://www.google.com/maps/place/Restaurant+Montcalm/@48.8928278,2.3370904,15z/data=!4m2!3m1!1s0x0:0x39e35a77cea6b69e?sa=X&ved=2ahUKEwjsh5i8zqDlAhUPx4UKHRCJBJ8Q_BIwCnoECAsQCA">21 Rue Montcalm, 75018 Paris</a>, le montant &agrave; r&eacute;gler au moment de sa r&eacute;cup&eacute;ration sera de <b>'.$arrayPost["cout"].'€</b>.</p><p style="margin: 10px 0; color:#000; font-size:18px">Nous vous remercions pour votre confiance et restons &agrave; votre disposition en cas de besoin.<br><br><br><br>Merci de ne pas r&eacute;pondre &agrave; ce mail, les moyens de contacts sont indiqu&eacute;s sur notre site : <a style="color:#014d49;" href="https://www.restaurant-montcalm.fr/#section-5">https://www.restaurant-montcalm.fr</a>.</p>';
                $mailClient = $montcalm->sendMail($ClientMessage, $ClientEmail, $newCmd, "client");
                //$mailClient = $montcalm->setMessage($ClientMessage);
                //..TO DO
                //var_dump($mailClient);
        } else {
        	echo "Une erreur est survenue, veuillez essayer ultèrieurement.";
        }
    } else {
        echo "Votre commande est incomplète :<br>".$menu_err." ".$nom_err." ". $getDate_err." ".$tel_err." ".$email_err." Merci";
    }

} 
?>