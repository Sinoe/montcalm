<?php 
  date_default_timezone_set('Europe/Paris'); 
  setlocale(LC_TIME, 'fr_FR','fra');
  include_once("includes/functions.php");
  $montcalm = new Montcalm();
?>
<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  
  <title>Restaurant Montcalm - 21 rue Montcalm 75018 Paris</title>
  <meta name="description" content="Restaurant Montcalm Paris - Produits frais et finement travailés et sélection de vin nature et traditionnel au 21 rue Montcalm 75018 Paris">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- <link rel="stylesheet" href="css/normalize.css">
   -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="tailwind/build/tailwind.css">
  <link rel="stylesheet" href="css/main.css">
  
  
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#014d49">
  <meta name="msapplication-TileColor" content="#014d49">
  <meta name="theme-color" content="#014d49">

  <meta property="og:url"                content="https://www.restaurant-montcalm.fr/" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="Restaurant Montcalm Paris" />
  <meta property="og:description"        content="Restaurant Montcalm - Produits frais et finement travailés et sélection de vin nature et traditionnel au 21 rue Montcalm 75018 Paris" />
  <meta property="og:image"              content="https://www.restaurant-montcalm.fr/img/share_montcalm.png" />
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

<meta name="google-site-verification" content="V-bYVTwNL10fPWSq0qEZlG94ruepfqS1_pHGeaPRwvY" />
</head>

<body class="">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header>
    <nav class="flex items-center justify-between flex-wrap bg-montcalm p-6 fixed w-full">
      <a href="#section-1" class="home-link flex items-center flex-shrink-0 text-white mr-6">
          <img src="img/logo_m.svg" alt="Logo Montaclm" class="logo_m">
          <img src="img/small_logo_txt.svg" alt="Logo Montaclm" class="logo_txt" >
          <span class="font-semibold text-xl tracking-tight hide" style="display:none;">MONTCALM</span>
      </a>
      <div class="block lg:hidden">
        <button class="open-menu flex items-center hamburger--collapse float-right" type="button"  data-iteration="1">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <!-- <button class="open-menu flex items-center px-3 py-2 border rounded border-white text-white hover:text-white hover:border-white float-right" data-iteration="1">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button> -->
        <div class="float-right">
          <!-- <a href="#" class="open-resa inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mr-4 lg:mt-0">Réserver</a> -->
          <a href="#" class="open-cmd inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:bg-white mr-4 lg:mt-0  hover:text-montcalm transition duration-300">Commandez à emporter</a>
        </div>
      </div>
      <div id="mobile-nav" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div id="menu_nav" class="text-sm lg:flex-grow">
          <ul>
            <li><a href="#section-2" class="block mt-4 lg:inline-block text-white lg:mt-0 hover:text-white mr-4">
              La carte
            </a></li>
            <li><a href="#section-3" class="block mt-4 lg:inline-block text-white lg:mt-0 hover:text-white mr-4">
              Les vins
            </a></li>
            <li><a href="#section-4" class="block mt-4 lg:inline-block text-white lg:mt-0 hover:text-white mr-4">
              Ils parlent de nous
            </a></li>
            <li><a href="#section-5" class="block mt-4 lg:inline-block text-white lg:mt-0 hover:text-white">
              Contact
            </a></li>
          </ul>
        </div>
        <div class="hidden lg:block">
          <!-- <a href="#" class="open-resa inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Réserver</a> -->
          <a href="#" class="open-cmd inline-block text-sm px-4 py-2 leading-none border rounded text-white  border-white hover:border-transparent hover:text-montcalm hover:bg-white mt-4 lg:mt-0 transition duration-300">Commandez à emporter</a>
        </div>
      </div>
    </nav>
  </header>
  <div id="section-1" class="flex height-container h-screen min-h-600">
    <div class="w-full h-screen min-h-600 py-12 self-center flex-1 bg-center	bg-fixed bg-cover back_home" >
      <div class="text-center h-full min-h-640 content-wrap home-txt-center" >
        <div class="relative">
          <div class="absolute center-content text-center absolute-home">
            <img src="img/logo-montcalm.svg" class="object-center main_logo" alt="Logo Montcalm">
            <div class="content_text" >
              <h1 class="text-white hide" style="display:none;">Restaurant Montcalm Paris 75018</h1>
              <p class="text-white mt-4 text-lg"><b>Le restaurant continue à vous servir pendant le couvre feu.<br> Comme d'habitude le midi,<br>et le soir pour dîner sur place ou via la vente à emporter de 18h30 à 21h00</b>.</p>
              <p class="text-white mt-4">Nous vous accueillons <br>du mardi au samedi <br>de 12h00 à 14h30 <br>puis de 18h30 à 21h00<br>au 21 rue Montcalm 75018 Paris</p>
            </div>
            <a href="#" class="open-cmd inline-block text-base px-4 py-2 leading-none border rounded text-white bg-montcalm border-white hover:border-transparent hover:text-montcalm hover:border-montcalm hover:bg-white mt-4 lg:mt-0 transition duration-300 ">Commandez à emporter</a>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
  <div id="section-2" class="flex flex-wrap height-container">
    <div class="w-full md:w-1/2 md:h-screen min-h-400 bg-center bg-cover back_carte">
    </div>
    <div class="w-full md:w-1/2 pt-12 self-center flex-1 center">
      <div class="content-wrap">
        <h1>La carte <!--<span class="text-xl date"> du 04 au 08 mai</span>--></h1>
        <p class="mt-4">Produits frais et finement travailés.</p>
        <!-- <h2  class="text-xl mt-4">Entrées</h2>
        <ul class="menu_list">
          <li class="clearfix"><span class="descr">tartare de Maigre - concomnre - citron confit </span><span class="price">7*</span></li>
          <li class="clearfix"><span class="descr">velouté de pois cassés, persil </span><span class="price">10</span></li>
          <li class="clearfix"><span class="descr">foie gras - lentille - bouillon</span><span class="price">11</span></li>
        </ul>
        <h2 class="text-xl mt-4">Plats</h2>
        <ul class="menu_list">
          <li class="clearfix"><span class="descr">bonites - risotto d'orge - asperges </span><span class="price">20</span></li>
          <li class="clearfix"><span class="descr">canard - chou blanc - girotte - foie gras </span><span class="price">20</span></li>
          <li class="clearfix"><span class="descr">échine de porc - pdt darphin - jus</span><span class="price">15*</span></li>
        </ul>
        <h2  class="text-xl mt-4">Desserts</h2>
        <ul class="menu_list">
          <li class="clearfix"><span class="descr">clémentine - orange - financier</span><span class="price">8*</span></li>
        </ul>
        <h2  class="text-xl mt-4">Formule</h2>
        <ul class="menu_list">
          <li class="clearfix"><span class="descr">entrée plat ou plat dessert (signalé par une étoile) </span><span class="price">15</span></li>
        </ul> -->
        <ul class="menu_list mt-8">
        <?php $menu_items = $montcalm->getPlats(); 
              foreach($menu_items as $menu_item) :?>
                <li class="clearfix mb-4"><span class="descr"><?php echo $menu_item['nom']; ?></span><span class="price"><?php echo $menu_item['prix']; ?></span></li>
              <?php endforeach; ?>

        </ul>
        <p class="mt-4"><a href="#" class="open-cmd inline-block text-base px-4 py-2 leading-none border rounded text-white bg-montcalm border-white hover:border-transparent hover:text-montcalm hover:border-montcalm hover:bg-white mt-4 lg:mt-0 transition duration-300">Commandez à emporter</a><p>

      </div>
    </div>
  </div>
  <div id="section-3" class="flex md:flex-row-reverse flex-wrap height-container">
    <div class="w-full md:w-1/2 md:h-screen min-h-400 bg-center	 bg-cover back_vin">
    </div>
    <div class="w-full md:w-1/2 pt-12 self-center flex-1 center">
      <div class="content-wrap">
        <h1>Les Vins</h1>
        <p class="mt-4">La sélection de vin nature et traditionnel est toujours accessible même à emporter, demandez à Guillaume en venant chercher vos commandes, ou passez nous voir tous les jours aux heures d'ouverture.</p>
        <!-- <p class="mt-4"><a class="text-montcalm mt-4" href="#">Voir la carte des vins - TO DO PDF</a></p> -->
      </div>
      
    </div>
    
  </div>
  <div id="section-4" class="flex flex-wrap height-container">
    <div class="w-full md:w-1/2 md:h-screen min-h-400 bg-right-top bg-cover back_ref"></div>
    <div class="w-full md:w-1/2 py-12 self-center flex-1 center">
      <div class="content-wrap">
        <h1>Ils parlent de nous</h1>
        <p class="mt-4">Retrouvez ce qu'ils en disent :</p>
        <ul class="mt-4">
          <li><a class="text-montcalm" target="_blank" href="https://restaurant.michelin.fr/3615756/montcalm-paris-18">Guide Michelin 2020 (guide culinaire)</a></li>
          <li><a class="text-montcalm" target="_blank" href="http://restos-sur-le-grill.fr/2018/11/montcalm-paris-18-avis-de-tempete-de-saveurs.html">Restos sur le Grill (blog culinaire)</a></li>
          <li><a class="text-montcalm" target="_blank" href="https://sortir.telerama.fr/paris/lieux/restos/montcalm,27967.php">Télérama Sortir (magazine)</a></li>
          <li><a class="text-montcalm" target="_blank" href="https://www.lexpress.fr/styles/saveurs/restaurant/paris-18e-le-neobistrot-montcalm-l-heureux-hasard_1735450.html">L'express style (magazine)</a></li>
          <li><a class="text-montcalm" target="_blank" href="http://www.fere.fr/montcalm/">fe.re (blog culinaire)</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="section-5" class="flex md:flex-row-reverse flex-wrap height-container">
    <div class="w-full md:w-1/2 md:h-screen min-h-400 bg-gray-600">
    <div class="map-responsive w-full h-full">
      <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=restaurant%20montcalm%20paris&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    </div>
    <div class="w-full md:w-1/2 py-12 self-center flex-1 center">
      <div class="content-wrap">
        <h1>Nous contacter</h1>
        <p class="mt-4">Le restaurant vous acueille du <b>mardi au samedi</b> de <b>12h00 à 14h30</b> puis de <b>18h30 à 21h00</b></p>
        <p class="mt-4">Pour toute demande vous pouvez nous appeler ou nous envoyer un mail en utilisant les liens ci-dessous :</p>
        <p>Télephone : <a class="text-montcalm" href="tel:0142587135">01 42 58 71 35</a><br>
        Mail : <a class="text-montcalm" href="mailto:willguillaume.resto@gmail.com">willguillaume.resto@gmail.com</a><br>
        Adresse : <a class="text-montcalm" target="_blank" href="https://www.google.com/maps/place/Restaurant+Montcalm/@48.8928278,2.3370904,15z/data=!4m2!3m1!1s0x0:0x39e35a77cea6b69e?sa=X&ved=2ahUKEwjsh5i8zqDlAhUPx4UKHRCJBJ8Q_BIwCnoECAsQCA">21 Rue Montcalm, 75018 Paris</a></p>
      </div>
    </div>
    
  </div>
  <div id="footer" class="flex">
    <div class="w-full">
      <p class="m-4 text-gray-800 text-sm">&copy; Montcalm 2015 - 2020</p>
    </div>
  </div>
  <!-- <div id="reservation">
    <div class="reservation_container">
      <a href="#" class="text-right" id="close_reservation">X</a>
      <form id="reservation_form" action="#">
        <fieldset id="form-vue-1" class="form-vue">
          <p class="form-info mt-4 mb-4">Informations de la réservation&nbsp;:</p>
          <div class="input-field">
            <p class="form-label">Horaire</p>
            <select name="horaire" id="">
              <option value="">Sélectionner une heure</option>
              <option value="12h00">Déjeuner - 12h00</option>
              <option value="12h30">Déjeuner - 12h30</option>
              <option value="13h00">Déjeuner - 13h00</option>
              <option value="13h30">Déjeuner - 13h30</option>
              <option value="20h00">Dîner - 20h00</option>
              <option value="20h30">Dîner - 20h30</option>
              <option value="21h00">Dîner - 21h00</option>
              <option value="21h30">Dîner - 21h30</option>
            </select>
          </div>
          <div class="input-field">
            <p class="form-label">Nombre de convives</p>
            <select name="convives" id="">
              <option value="Nombre de convives">Sélectionner le nombre de convives </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="input-field">
              <div class="form-label">Date</div>
              <input type="hidden" name="date" id="date_pick" placeholder="Choisissez une date" />
          </div>
          <a href="#" id="next" class="btn">Continuer</a>
        </fieldset>
        <fieldset id="form-vue-2" class="form-vue">
          <div class="reservation_infos">
            <span class="form-info">Informations de réservation&nbsp;:</span><br>
            Le {date}<br>
            à {horaire}<br>
            pour {nombre}</p>
            <p><a href="#" id="previous" ><< Modifier les informations</a></p>
          </div>

          <p class="form-info mt-4 mb-4">Vos coordonnées :</p>
          <div class="input-field">
            <p class="form-label">Votre nom</p>
            <input type="text" name="nom" placeholder="Nom">
          </div>
          <div class="input-field">
            <p class="form-label">Votre prénom</p>
            <input type="text" name="prenom" placeholder="Prénom">
          </div>
          <div class="input-field">
            <p class="form-label">Votre numéro de télephone</p>
            <input type="text" name="tel" placeholder="N° de télephone">
          </div>
          <div class="input-field">
            <p class="form-label">Votre adresse e-mail</p>
            <input type="text" name="email" placeholder="adresse email">
          </div>
          <div class="input-field">
            <input type="submit" value="Valider la réservation">
          </div>
        </fieldset>
      </form>
    </div>
    
  </div> -->
  <div id="commande">
      <div class="close"></div>
      <div class="container">
        <h2 class="text-center">Commande à emporter</h2>
        <p class="form-info">Comment ça se passe ?</p>
        <ul>
          <li><span class="number">1</span> Vous choisissez ce que vous souhaitez dîner.</li>
          <li><span class="number">2</span> Vous sélectionnez le jour de récupération, vous pouvez passer commande pour le jour même <b>du mardi au samedi avant 19h00</b> ou pour le lendemain du mardi au vendredi.</li>
          <li><span class="number">3</span> Vous renseignez vos coordonnées pour qu'on puisse vous contacter si besoin.</li>
          <li><span class="number">4</span> On prépare la commande dans la journée et vous venez la récupérer au restaurant le jour sélectionné entre 18h30 et 21h00.</li>
          <li><span class="number">5</span> Le paiement se fait sur place au moment de la récupération de votre commande.</li>
          <li><span class="number">6</span> Et voilà, bon appétit!</li>
        </ul>

        <div class="sep"></div>
        <div style="display:none;">
        <?php
            /*
              Lundi => OK pour Mardi
              Mardi => Ok mardi av16 / OK Mercredi
              Mercredi => Ok Mercredi av16 / OK Jeudi
              Jeudi => Ok Jeudi av16 / OK Vendredi
              Vendredi => Ok Vendredi av16 / OK Samedi
              Samedi => Ok Samedi av16
              Dimanche => Closed
                = Samedi ap16 + dimanche => Message Close
            */

            $today = true;
            $tomorrow = true;
            setlocale(LC_TIME, 'fr_FR.utf8','fra');
            $dayNum = Date('N');
            $hour = Date('H');

            //TEST 
            /*$hour = 15;
            $dayNum = 7;*/
            //echo Date('N');
            
            echo $dayNum.' NUM<br>';
            echo $hour.' HEURE<br>';
            echo date("Y-m-d H:m:s").'<br>';


            if($dayNum == 1 || $dayNum == 7){
              $today = false;
              echo 'DAY 1 ou DAY 7 & today false <br>';
            }
            if($dayNum == 1 || $dayNum == 6 || $dayNum == 7){
              $tomorrow = false;
              echo 'DAY 6 ou DAY 7 & tomorrow false <br>';
            }
            if($dayNum > 1 && $dayNum < 7){
              echo 'DAY 2 / 3 / 4 / 5 / 6 <br>';
              if($hour > 19){
                 echo 'HOUR sup 16 & today false <br>';
                $today = false;
              }
            }
        ?>
        </div>
        <?php if( !$today && !$tomorrow ){ ?>
          <p class="text-center my-8">Les commandes à emporter sont actuellement indisponibles.<br>Elles sont possibles du mardi au samedi avant 18h00 pour le jour même <br>ou pour le lendemain du mardi au vendredi.</p>
        <?php } else { ?>
          <form id="commandeForm" action="ajaxCmd.php">
            <div id="cmd_plats" class="section-form">
                <p class="form-info relative point-title"><span class="number">1</span> La commande</p>
                <div class="line_input menu_item_input flex line_head">
                  <div class="increment"></div>
                  <div class="item_name"></div>
                  <div class="prix">Prix unitaire</div>
                  <div class="sous-total">Sous-total</div>
                </div>
              <?php foreach($menu_items as $menu_item) :?>              
                <div class="line_input menu_item_input flex" id="item_<?php echo $menu_item['id']; ?>">
                  <div class="increment flex">
                    <div class="increment_button button">-</div>
                    <input type="number" autocomplete="off" style="width: 25px;text-align: center; margin: 0px;" class="itemQty" id="item[<?php echo $menu_item['id']; ?>][qty]" min="0" value="0" name="item[<?php echo $menu_item['id']; ?>][qty]" data-price="<?php echo $menu_item['prix']; ?>" /><div class="increment_button button">+</div>
                  </div>
                  <div class="item_name"><?php echo $menu_item['nom']; ?></div>
                  <div class="prix"><span class="item_price"><?php echo $menu_item['prix']; ?></span><span class="currency">€</span></div>
                  <div class="sous-total"><span class="line_total">0</span><span class="currency">€</span></div>
                </div>
              <?php endforeach; ?>
            </div>
            <div id="cmd_date" class="section-form">
              <div class="input-field">
                <div class="form-label form-info mb-4 relative point-title"><span class="number">2</span> Date de récupération</div>
                
                <?php if($today): ?>
                  <div>
                    <input type="radio" id="aujourd'hui" autocomplete="off" name="getDate" value="<?php echo date('Y-m-d');?>">
                    <label for="aujourd'hui">Aujourd'hui (<?php echo strftime("%A %d %B", strtotime("now")); ?>)</label>
                  </div>
                  <div style="display:none;">Today = <?php echo $today; ?></div>
                <?php endif; ?>
                <?php if($tomorrow): ?>
                  <div>
                    <input type="radio" id="demain" autocomplete="off" name="getDate" value="<?php echo date("Y-m-d", strtotime("+1 day"));?>">
                    <label for="demain">Demain (<?php echo strftime("%A %d %B", strtotime("+1 day"));?>)</label>
                  </div>
                 <?php endif; ?>
              </div>
            </div>
            <div id="cmd_infos" class="section-form">
              <p class="form-info mt-4 mb-4 relative point-title"><span class="number">3</span> Vos coordonnées</p>
                <div class="input-field">
                  <p class="form-label">Vos nom et prénom*</p>
                  <input type="text" name="nom" placeholder="Nom">
                </div>
                <div class="input-field">
                  <p class="form-label">Votre numéro de télephone*</p>
                  <input type="text" name="tel" placeholder="N° de télephone">
                </div>
                <div class="input-field">
                  <p class="form-label">Votre adresse e-mail*</p>
                  <input type="email" name="email" placeholder="adresse email">
                </div>
                <div class="input-field">
                  <p class="form-label">Un commentaire ou des allergies alimentaires&nbsp;?<br>Merci de nous les indiquer ci-dessous ⬇</p>
                  <textarea class="small_textarea"  name="remarques"></textarea>
                </div>
              </div>
            <div id="cmd_valid" class="flex">
              <div class="container">
                  <div class="clearfix">
                    <div class=" self-center cart-pannel float-left">
                      <div>Prix total de la commande&nbsp;: <span id="total-value">0</span><span class="currency">€</span></div>
                      <div>Nombre de plat&nbsp;: <span id="total-meel">0</span></div>
                    </div>
                    <div class="valid self-center float-right">
                      <input type="submit" value="valider" class="btn">
                    </div>               
                        
                  </div>
              </div>   
            </div>
          </form>
        <?php } ?>
      </div>
      
  
  </div>
  <div id="loader-container">
      <div id="loader"></div>
  </div>

  <div id="reponse">
      <div class="back_resp">
          <div class="modal_container">
                <div class="modal_head">
                  <div class="modal_head__title">
                    <h3 class="uppercase"></h3>
                  </div>
                  <div class="modal_close">
                  
                  </div>
                </div>
                <div class="modal_content">
                  <p class="mt-4"></p>
                </div>
          </div>
      </div>
  </div>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166276004-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166276004-1');
</script>
</body>

</html>
