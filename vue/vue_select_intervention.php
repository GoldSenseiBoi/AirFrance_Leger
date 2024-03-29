<h3>Liste des interventions</h3>
<form method="post">
	<p>Filtrer par : </p><input type="text" name="filtrer">
	<input type="submit" name="filtrer" value=filtrer>
</form>
<br>
<table border="1">
	<tr>
		<td>Id intervention</td>
		<td>Description intervention</td>
		<td>Prix de l'intervention</td>
		<td>Produit concerné</td>
		<td>Technicien concerné</td>
	</tr>
	<?php
	if (isset($lesInterventions)){
		foreach ($lesInterventions as $unIntervention) {
			echo "<tr>";
			echo "<td>".$unIntervention['idinter']."</td>";
			echo "<td>".$unIntervention['description']."</td>";
			echo "<td>".$unIntervention['prixInter']."</td>";
			echo "<td>".$unIntervention['idproduit']."</td>";
			echo "<td>".$unIntervention['idtechnicien']."</td>";
		}
	}
	?>
</table>