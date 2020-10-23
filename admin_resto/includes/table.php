<table id="<?php echo $tableName; ?>" class="parttable table2excel responsive-table striped bordered highlight" data-tableName="Test Table 1">
	<thead class="highlight small">
		<tr>
			<td></td>
			<td><b>Chef de secteur</b></td>
			<td><b>Code client</b></td>
			<td><b>Nom</b></td>
			<td><b>Prénom</b></td>
			<td><b>Fonction</b></td>
			<td><b>Conventions</b></td>
			<td><b>Email</b></td>
			<td><b>Téléphone</b></td>
			<td><b>Allergie</b></td>
			<td><b>Commentaires</b></td>
			<td><b>Date dernière action</b></td>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($participants as $row) : ?>



			<tr >
				<td><a href="modifier.php?id=<?php echo $row['id_participant']; ?>" class="modifier">modifier</a></td>
				<?php $cds = $user->GetCDSByID($row['id_cds']); ?>
				<td><?php echo $cds['prenom_cds'].' '.$cds['nom_cds'] ?></td>
				<td><?php echo $row['code_client']; ?></td>
				<td><?php echo $row['nom']; ?></td>
				<td><?php echo $row['prenom']; ?></td>
				<td><?php echo $row['fonction']; ?></td>

				<td><?php
					$convention = substr($row['convention'], 1);
					$convention = substr($convention, 0, -1);
					$array_convention=explode(",",$convention);
					foreach ($array_convention as $ville) :
						$lacle = searchForId($ville, $villes);
						$city =  $villes[$lacle]['proximite'];
						echo $city.' <br>';
					endforeach;
				?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['telephone']; ?></td>
				<td><?php echo $row['allergies']; ?></td>
				<td><?php echo $row['commentaires']; ?></td>
				<td><?php if( !is_null($row['modified']) ) {echo date('d/m/Y à H:i', strtotime($row['modified'])); } else {echo date('d/m/Y à H:i', strtotime($row['created']));} ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br>
<div class="clear">
	<button style="margin-right: 10px;" class="left waves-effect waves-light btn-large button download teal" data-filetype="csv"  data-table="#<?php echo $tableName; ?>" data-fileName="<?php echo $filename; ?>-<?php echo date('d-m-Y'); ?>">Télécharger au format .CSV</button>&nbsp;&nbsp; <button class="waves-effect waves-light left btn-large button download teal" data-filetype="excel" data-table="#<?php echo $tableName; ?>" data-fileName="<?php echo $filename; ?>-<?php echo date('d-m-Y'); ?>">Télécharger au format .XLS</button>
</div>
<br>
