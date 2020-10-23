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
<?php $page = 'home'; $pageTitle = '<i class="material-icons">menu_book</i> Menu'; 
    $menu_items = $montcalm->getPlats(); 
?>
<?php include('includes/header.php'); ?> 

    <div class="row" style="margin-top:20px;">
        <a href="#modal-item-create" class="btn modal-trigger">AJouter un plat</a>
        <div id="modal-item-create" class="modal">
            <?php include("includes/partials/form_item--add.php"); ?>
        </div>
    </div>
    <div class="row">
        <h3>Liste des plats du Menu</h3>
    <div id="tabs-all">
            <table id="plats" class="striped parttable table2excel responsive-table striped bordered highlight" data-tableName="Test Table 1">
                <thead class="highlight small">
                    <tr>
                        <td></td>
                        <td><b>Nom</b></td>
                        <td><b>Prix</b></td>
                        <td><b>ordre</b></td>
                        <td><b>Date de création</b></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    
                    foreach($menu_items as $menu_item) :

                        ?>  
                        <tr>    
                            <td><a class="modal-trigger modifier" href="#modal-item-<?php echo $menu_item['id']; ?>"><i class="material-icons">edit</i> Modifier</a></td>
                            <td><?php echo $menu_item["nom"]; ?></td>
                            <td><?php echo $menu_item["prix"]; ?></td>
                            <td><?php echo $menu_item["ordering"]; ?></td>
                            <td><?php echo $menu_item["created_at"]; ?></td>
                            <td><a  class="item-delete" href="#" data-itemid="<?php echo $menu_item['id']; ?>"><i class="material-icons">delete_forever</i> supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="clear">
<?php foreach ($menu_items as $menu_item) : ?>
    <div id="modal-item-<?php echo $menu_item['id']; ?>" class="modal">
        <?php include('includes/partials/form_item.php'); ?>
    </div>
<?php endforeach; ?>

<!-- Modal Structure -->
    <div id="modal-item-delete" class="modal">
        <div class="modal-content">
            <h4><i class="material-icons">delete_forever</i> Suppression de plats</h4>
            <p>Êtes-vous certain de vouloir supprimer ce plat ?</p>
        </div>
        <div class="modal-footer">
            <a class="waves-effect btn-flat delete-item-link" href="item_delete.php?item="><i class="material-icons">delete_forever</i> Oui supprimer</a>
            <a href="#!" class="modal-action modal-close waves-effect btn-flat">Non annuler</a>
        </div>
    </div>

</div>
    </div>      
     

<?php include('includes/footer.php'); ?>   