<h2>Gestion des aéroports</h2>

<?php
	require_once("vue/vue_insert_aeroport.php");
	if (isset($_POST['Valider'])){
		$unControleur->insertAeroport($_POST);
	}
	$lesAeroports= $unControleur->selectAllAeroports ();
	require_once("vue/vue_select_aeroport.php");
?>
