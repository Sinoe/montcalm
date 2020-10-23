<?php 

    include_once("../functions.php");
    $user = new Users();
if(isset($_GET["session"]) && $_GET["session"] != ""){
        $session_id = $_GET["session"];
        $sessionInfo = $user->sessionInfo($session_id);
}
$data = array();
    $rang = 0;
    $lastchorno = "";
    $classement = $user->getClassementSession($session_id); ?>

    <?php foreach ($classement as $infoClassement) :

    if( $infoClassement['chrono'] > $lastchorno ) {
        $rang++;
      }

    $arrayData = array($rang, $infoClassement['pseudo'], $infoClassement['chrono']);

    array_push($data, $arrayData);

    $lastchorno = $infoClassement['chrono'];
    endforeach; 
//var_dump($data);
$json = json_encode($data);
echo'{"data":'.$json.'}';

?>