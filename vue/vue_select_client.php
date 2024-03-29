<h3>Liste des clients</h3>
<form method="post">
	<p>Filtrer par : </p><input type="text" name="filtre">
	<input type="submit" name="filtrer" value="filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td>Id Client</td>
		<td>Nom Client</td>
		<td>Prénom Client</td>
		<td>Adresse Client</td>
		<td>Email Client</td>
		<td>Opération</td>
	</tr>
	<?php
	if (isset($lesClients)){
		foreach ($lesClients as $unClient) {
			echo "<tr>";
			echo "<td>".$unClient['idclient']."</td>";
			echo "<td>".$unClient['nom']."</td>";
			echo "<td>".$unClient['prenom']."</td>";
			echo "<td>".$unClient['adresse']."</td>";
			echo "<td>".$unClient['email']."</td>";
			if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
				echo "<td>";
				echo "<a href='index.php?page=2&action=sup&idclient=".$unClient['idclient']."'><img src='image/supprimer.png' height='30' width='30'></a>";
				echo "<a href='index.php?page=2&action=edit&idclient=".$unClient['idclient']."'><img src='image/editer.png' height='30' width='30'></a>";
				echo "<a href='index.php?page=2&action=voir&idclient=".$unClient['idclient']."'><img src='image/voire.png' height='30' width='30'></a>";
				echo "/<td>";
				echo "/<tr>";
			}
		}
	}
	?>
</table>