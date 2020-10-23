<div class="modal-content">
	<h4><i class="material-icons">person_add</i> Ajouter un participant</h4>
	<form id="addUserForm" action="addUserFromRun.php" method="post">
		<input type="hidden" name="session_id" value="<?php echo $sessionInfo['id']; ?>" />

		<div class="line_form input-field">
	        <span class="labelselect" for="session">Session*</span>
	        <select name="session" disabled id="">
	        	<option selected="selected" value="<?php echo $sessionInfo['id']; ?>"><?php echo $sessionInfo['nom_societe']." ".$sessionInfo['ville']; ?></option>
	        </select>
	    </div>
	    <div class="line_form input-field">
	        <label for="nom">Nom*</label>
	        <input name="nom" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="prenom">Prénom*</label>
	        <input name="prenom" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="email">Email*</label>
	        <input name="email" type="email">
	    </div>
	    <div class="line_form input-field">
	        <label for="pseudo">Pseudo*</label>
	        <input name="pseudo" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="telephone">Télephone*</label>
	        <input name="telephone" type="tel" pattern="[0-9]{10}">
	    </div>
	    <div class="line_form input-field">
	        <label for="societe">Société*</label>
	        <input name="societe" type="text">
	    </div>
	    <div class="line_form input-field">
	        <label for="fonction">Fonction*</label>
	        <input name="fonction" type="text">
	    </div>
	    <div class="message-return"></div>
		<div class="line_form text-center">
	        <input type="submit" class="btn inscription_form_sub" value="Ajouter">
	    </div>
	</form>
</div>