<h3>Liste des technicien</h3>
<form method="post">
	<p>Filtrer par : </p><input type="text" name="filtrer">
	<input type="submit" name="filtrer" value=filtrer>
</form>
<br>
<table border="1">
	<tr>
		<td>Id technicien</td>
		<td>Nom technicien</td>
		<td>Prénom technicien</td>
		<td>Spécialité technicien</td>
		<td>Date d'embauche technicien</td>
	</tr>
	<?php
	if (isset($lesTechniciens)){
		foreach ($lesTechniciens as $unTechnicien) {
			echo "<tr>";
			echo "<td>".$unTechnicien['idtechnicien']."</td>";
			echo "<td>".$unTechnicien['nom']."</td>";
			echo "<td>".$unTechnicien['prenom']."</td>";
			echo "<td>".$unTechnicien['specialite']."</td>";
			echo "<td>".$unTechnicien['dateEmbauche']."</td></tr>";
		}
	}
	?>
</table>