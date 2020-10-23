<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<?php $page ="index"; $pageTitle = "Connexion"; ?>
<?php include('includes/header.php'); ?>     
        
        
        <?php if(isset($_GET['error']) && $_GET['error'] == '1'): ?>
            <p>Les accès saisis ne corespondent pas, essayez de vous connecter à nouveau</p>
        <?php elseif(isset($_GET['error']) && $_GET['error'] == '2'): ?>
            <p>Veuillez vous connecter pour accéder au contenu</p>
        <?php endif; ?>
       <!--  <form action="connect.php" method="POST">
            <div class="input-field col s6">
                <label for="login">Login</label>
                <input type="text" name="login" id="login">
            </div>
            <div class="input-field col s6">
                <label for="pass">password</label>
                <input type="text" name="pass" id="pass">
            </div>
            <button  class="left waves-effect waves-light btn-large button download teal">Connexion</button>
            
            
            
        </form> -->
        <form action="connect.php" method="POST">
            <div class="row">
                <br><br><br>
                <div class="col s12 m6 offset-m3">
                    <div class="card" style="text-align: center;;">
                        <div class="card-content">
                            <h4 class="teal-text text-darken-2">Authentification</h4>
                            <div class="input-field ">
                                <label for="email">Login</label>
                                <input type="text" name="email" id="email">
                            </div>
                            <div class="input-field ">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password">
                            </div>
                        </div>
                        <div class="card-action">
                            <button  class=" waves-effect waves-light btn-large button teal">Connexion</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




<?php include('includes/footer.php'); ?>