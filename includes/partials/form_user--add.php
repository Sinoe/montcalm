<div class="modal-content">
	<h4><i class="material-icons">person_add</i> Ajouter un participant</h4>
	<form action="" id="addUserForm">
		<div class="line_form input-field">
	        <span class="labelselect" for="session">Session*</span>
	        <select name="session_id" id="">
	        	<?php foreach($sessions as $session) {?>
	        	<option  value="<?php echo $session['id']; ?>"><?php echo $session['nom_societe']." ".$session['ville']; ?></option>
	        	<?php } ?>
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
		<div class="text-center">
	        <input type="submit" class="btn inscription_form_sub" value="Modifier">
	    </div>
	</form>
</div>