<?php 

    include_once("../../../includes/functions.php");
$montcalm = new Montcalm();

$commandes = $montcalm->getTodayCommandes(); 
$data = array();
    foreach($commandes as $commande) :


    if(strtotime($commande["created_at"]) > strtotime("-30 minutes")) {
        $created = '<span class="newCMD">'.$commande["created_at"].'</span>';
    } else {
        $created = '<span class="oldCMD">'.$commande["created_at"].'</span>';
    }    

    $infosclient = '<b>Nom : </b>'.$commande["client_nom"].'<br><b>Mail : </b><a href="mailto:'.$commande["client_mail"].'">'.$commande["client_mail"].'</a><br><b>Tel : </b><a href="tel:'.$commande["client_tel"].'">'.$commande["client_tel"].'</a>';   
    $arrayData = array( 
        date('d/m/Y', strtotime($commande["date"])), 
        htmlspecialchars($commande["content"]), 
        htmlspecialchars($commande["cout"]),
        htmlspecialchars($commande["remarques"]),
        htmlspecialchars($infosclient),
        htmlspecialchars($created)
    );

    array_push($data, $arrayData);
    endforeach; 
//var_dump($data);
$json = json_encode($data);
echo'{"data":'.$json.'}';

?>