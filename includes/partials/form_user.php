<div class="modal-content">
	<h4><i class="material-icons">edit</i> Modification de participant</h4>
	<form class="updateUser" id="fom-user-<?php echo $userInfo['id']; ?>" action="updateUserFromAdmin.php" method="post">
		<input type="hidden" name="user_id" value="<?php echo $userInfo['id']; ?>">
		<input type="hidden" name="session_id" value="<?php echo $userInfo['session_id']; ?>" />

		<div class="line_form input-field">
	        <span class="labelselect" for="session">Session*</span>
	        <select name="session" <?php if($userInfo['session_id'] != ""){ echo " disabled "; } ?> id="">
	        	<?php foreach($sessions as $session) {?>
	        		<option <?php if($session['id'] == $userInfo['session_id']){echo 'selected="selected"';} ?> value="<?php echo $session['id']; ?>"><?php echo $session['nom_societe']." ".$session['ville']; ?></option>
	        	<?php } ?>
	        </select>
	    </div>
	    <div class="line_form input-field">
	        <label for="nom">Nom*</label>
	        <input name="nom" value="<?php if($userInfo){echo $userInfo['nom'];} ?>" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="prenom">Prénom*</label>
	        <input name="prenom" value="<?php echo $userInfo['prenom']; ?>" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="email">Email*</label>
	        <input name="email" value="<?php echo $userInfo['email']; ?>" type="email">
	    </div>
	    <div class="line_form input-field">
	        <label for="pseudo">Pseudo*</label>
	        <input name="pseudo" value="<?php echo $userInfo['pseudo']; ?>" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="telephone">Télephone*</label>
	        <input name="telephone" value="<?php echo $userInfo['telephone']; ?>" type="tel"  pattern="[0-9]{10}">
	    </div>
	    <div class="line_form input-field">
	        <label for="societe">Société*</label>
	        <input name="societe" value="<?php echo $userInfo['societe']; ?>" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="fonction">Fonction*</label>
	        <input name="fonction" value="<?php echo $userInfo['fonction']; ?>" type="text">
	    </div>
	    <div class="message-return"></div>
		<div class="line_form text-center">
	        <input type="submit" class="btn inscription_form_sub" value="Modifier">
	    </div>
	</form>
</div>