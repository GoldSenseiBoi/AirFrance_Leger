<h3>Ajout d'un produit</h3>
<form method="post">
	<table>
		<tr>
			<td>Désignation</td>
			<td><input type="text" name="desi"></td>
		</tr>
		<tr>
			<td>Prix d'achat</td>
			<td><input type="number" name="prixachat" min="0.01" step="0.01" ></td>
		</tr>
		<tr>
			<td>Date de l'achat</td>
			<td><input type="date" name="dateachat"></td>
		</tr>
		<tr>
			<td>Catégorie</td>
			<td>
				<select name="categorie">
					<option value="Téléphone">Téléphone</option>
					<option value="Informatique">Informatique</option>
					<option value="Télévision">Télévision</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Produit</td>
			<td>
				<select name="idclient">
					<?php
						foreach ($lesClients as $unClient) {
							echo "<option value='".$unClient['idclient']."'>";
							echo $unClient['nom'];
							echo "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="Valider" value="Valider">
				<input type="reset" name="Annuler" value="Annuler">
			</td>
		</tr>
	</table> 