<h2>Gestion des vols</h2>

<?php
	$lesAeroports= $unControleur->selectAllAeroports (); //Permet d'avoir les aéroports dans le menu déroulant de insert
	$lesAvions= $unControleur->selectAllAvions (); //Permet d'avoir les avions dans le menu déroulant de insert
	require_once("vue/vue_insert_vols.php");
	if (isset($_POST['Valider'])){
		$unControleur->insertVol($_POST);
	}
	$lesVols= $unControleur->selectAllVol ();
	require_once("vue/vue_select_vols.php");
?>
