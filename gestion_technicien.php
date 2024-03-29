<h2>Gestion des technicien</h2>
<?php
	require_once("vue/vue_insert_technicien.php");
	if (isset($_POST['Valider'])){
		$unControleur->insertTechnicien($_POST);
	}
	$lesTechniciens= $unControleur->selectAllTechnicien ();
	require_once("vue/vue_select_technicien.php");
?>