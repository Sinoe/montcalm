<div class="modal-content">
	<h4><i class="material-icons">local_pizza</i> Modifier un plat</h4>
    <form class="updateItem" id="fom-item-<?php echo $menu_item['id']; ?>" action="ajax/updateItemFromAdmin.php" method="post">
	    <input type="hidden" name="item_id" value="<?php echo $menu_item['id']; ?>">
        <div class="line_form input-field">
	        <label for="nom">Nom*</label>
	        <input name="nom" type="text" value="<?php echo $menu_item['nom']; ?>">
	    </div>
	    <div class="line_form input-field">
	        <label for="prix">Prix*</label>
	        <input name="prix" type="number" value="<?php echo $menu_item['prix']; ?>">
	    </div>
	    <div class="line_form input-field">
	        <label for="ordering">Ordre</label>
	        <input name="ordering" type="number"  value="<?php echo $menu_item['ordering']; ?>">
	    </div>
		<div class="text-center">
	        <input type="submit" class="btn inscription_form_sub" value="Modifier">
	    </div>
	</form>
</div>