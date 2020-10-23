<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if( ( isset($_SESSION['ADM_CONNECTED']) && !empty($_SESSION['ADM_CONNECTED']) ) && ( isset($_SESSION['ADM_LOGIN']) && !empty($_SESSION['ADM_LOGIN']) ) ){
        $login = $_SESSION['ADM_LOGIN']; 
        $role = 1;
    } else {
        header("Location:".$baseRedirectURL."index.php?error=2");
    }
    if(isset($_GET["item"]) && $_GET["item"] != ""){
        $item_id = $_GET["item"];

    } else {
        header("Location:".$baseRedirectURL."admin_resto/plats.php");
    }

?>
<?php 
    include_once("../includes/functions.php");
    $montcalm= new Montcalm();
    //$id_admin = $Admin->getUser($login)['id_admin'];
 ?>
<?php 
    
    // DELETE USER
    $deleteItem = $montcalm->deleteById('plats', $item_id);    

    if( ($deleteItem == 'delete Successful')  ){
        //Redirection page User avec Toast
        header("Location:".$baseRedirectURL."admin_resto/plats.php#toast=1");
    } else {
        //echo "PROBLEMES = ".$deleteuser." ".$deleteuser;
        header("Location:".$baseRedirectURL."admin_resto/plats.php#toast=2");

    }
 ?>   