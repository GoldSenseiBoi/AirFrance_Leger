<h3>Liste des produits</h3>
<form method="post">
	<p>Filtrer par : </p><input type="text" name="filtrer">
	<input type="submit" name="filtrer" value=filtrer>
</form>
<br>
<table border="1">
	<tr>
		<td>Id produit</td>
		<td>Désignation produit</td>
		<td>Prix d'achat produit</td>
		<td>Date d'achat produit</td>
		<td>Catégorie produit</td>
		<td>Client propriétaire du produit</td>
	</tr>
	<?php
	if (isset($lesProduits)){
		foreach ($lesProduits as $unProduit) {
			echo "<tr>";
			echo "<td>".$unProduit['idproduit']."</td>";
			echo "<td>".$unProduit['designation']."</td>";
			echo "<td>".$unProduit['prixAchat']."</td>";
			echo "<td>".$unProduit['dateAchat']."</td>";
			echo "<td>".$unProduit['categorie']."</td>";
			echo "<td>".$unProduit['idclient']."</td>";
		}
	}
	?>
</table>