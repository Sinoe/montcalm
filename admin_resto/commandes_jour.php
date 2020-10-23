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
?>
<?php 
    include_once("../includes/functions.php");
     $montcalm = new Montcalm();
    // $user = new Users();
    //$id_admin = $Admin->getUser($login)['id_admin'];
 ?>
<?php $page = 'commandes'; $pageTitle = '<i class="material-icons">shopping_cart</i> Commandes'; 
    $commandes = $montcalm->getTodayCommandes(); 
?>
<?php include('includes/header.php'); ?> 

    <div class="row">
        <h3>Commandes du jour</h3>
        <a href="commandes.php" class="btn">Voir toutes les commandes</a>
    <div id="tabs-all">
            <table id="commandes" class="striped parttable table2excel responsive-table striped bordered highlight" data-tableName="Test Table 1">
                <thead class="highlight small">
                    <tr>
                        <td><b>Date de récupération</b></td>
                        <td><b>Détail</b></td>
                        <td><b>Total</b></td>
                        <td><b>Remarques</b></td>
                        <td><b>Infos client</b></td>
                        <td><b>Date de création</b></td>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    
                    foreach($commandes as $commande) :

                        ?>  
                        <tr>   
                            <td <?php if( date_parse(date('Y-m-d')) < date_parse($commande["date"]) ){
                                    echo ' class="tom" ';
                                } else if(date_parse(date('Y-m-d')) == date_parse($commande["date"]) ) {
                                    echo ' class="tod" ';
                                }   else {
                                    echo ' class="pass" ';
                                }
                                ?>  
                            >   
                                <?php echo date('d/m/Y', strtotime($commande["date"])); ?>
                            </td> 
                            <td><?php echo $commande["content"]; ?></td>
                            <td><?php echo $commande["cout"]; ?></td>
                            <td><?php echo $commande["remarques"]; ?></td>
                            <td><b>Nom : </b><?php echo $commande["client_nom"]; ?><br><b>Mail : </b><a href="mailto:<?php echo $commande["client_mail"]; ?>"><?php echo $commande["client_mail"]; ?></a><br><b>Tel : </b><a href="tel:<?php echo $commande["client_tel"]; ?>"><?php echo $commande["client_tel"]; ?></a></td>
                            
                            <td><?php echo $commande["created_at"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="clear">


</div>
    </div>      
     

<?php include('includes/footer.php'); ?>   