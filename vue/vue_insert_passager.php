
<h3>Ajout/Modification d'un client</h3>
<form method="post">
	<table>
		<tr>
			<td>Nom du client</td>
			<td><input type="text" name="nom" value="<?= ($leClient!=null) ? $leClient['nom'] : ''  ?>">
		</td>
		</tr>
		<tr>
			<td>Prénom du client</td>
			<td><input type="text" name="prenom" value="<?= ($leClient!=null) ? $leClient['prenom'] : ''  ?>"></td>
		</tr>
		<tr>
			<td>Adresse du client</td>
			<td><input type="text" name="adresse" value="<?= ($leClient!=null) ? $leClient['adresse'] : ''  ?>"></td>
		</tr>
		<tr>
			<td>Email du client</td>
			<td><input type="text" name="email" value="<?= ($leClient!=null) ? $leClient['email'] : ''  ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" 
				<?= ($leClient!=null) ? ' name="Modifier" value="Modifier" ' : '
				name="Valider" value="Valider"' ?>

				>
				<input type="reset" name="Annuler" value="Annuler">
			</td>
		</tr>
		<?= ($leClient!=null) ? '<input type="hidden" name="idpassager" value="'.$leClient['idpassager'].'">':''?>
	</table> 