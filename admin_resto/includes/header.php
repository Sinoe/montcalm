    <?php $status = ""; ?>
    <?php if( ( isset($_SESSION['ADM_CONNECTED']) && !empty($_SESSION['ADM_CONNECTED']) ) && ( isset($_SESSION['ADM_LOGIN']) && !empty($_SESSION['ADM_LOGIN']) ) ){
        $login = $_SESSION['ADM_LOGIN']; 
        $role = $_SESSION['ADM_ROLE']; ?>
            <?php $status = 'connecte'; ?>
            <!-- <p>status = connecté => <?php echo $login; ?> | Role => <?php echo $role; ?></p> -->
    <?php } else { ?>
             <!-- <p>status = déconnecté</p> -->
    <?php } ?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <style>
            .tabs{
                height: auto;
                white-space: normal;
            }
            .tab a{
                transition: 0.2s;
            }
            .tabs .tab a:hover, .tabs .tab a.active{
                background: #f7f7f7;
            }
            .indicator{
                display: none;
            }
        </style>
    </head>
    <body class="admin_pages <?php if($page == "classement"){ echo 'classement';} ?>">
        <header>
            <nav class="top-nav">
                <div class="container admin">
                    <div class="row">
                        <h2 class="page-title"><?php echo $pageTitle; ?></h2>
                    </div>
                </div>
            </nav>
            <div class="container"><a href="#" data-target="nav-mobile" class="button-collapse top-nav full hide-on-large-only sidenav-trigger"><i class="material-icons">menu</i></a></div>

            <ul id="nav-mobile" class="sidenav sidenav-fixed">
                
                    <li class="logo">
                        <a id="logo-container" href="/" class="brand-logo">
                        <img src="../img/logo_montcalm_black.svg" style="fill:#000;" alt=""></a>
                    </li>
                    <li class="divider"><div class="divider"></div></li>
                <?php if($status == 'connecte') {?>
                    <li class="">
                            <a href="#"><i class="material-icons left">perm_identity</i><?php echo $login; ?></a>
                    </li>
                    <li><a href="disconnect.php"><i class="material-icons left">cancel</i>Déconnexion</a>
                        
                    </li>
                    <li <?php if($page == "home"){ echo 'class="active"';} ?>><a href="plats.php"><i class="material-icons">menu_book</i> Menu</a></li>
                    <li <?php if($page == "commandes"){ echo 'class="active"';} ?>><a href="commandes.php"><i class="material-icons">shopping_cart</i> Commandes</a></li>
                    
                <?php } ?>
            </ul>
        </header>
    <main>
        <div class="container admin">
            <div class="row">
