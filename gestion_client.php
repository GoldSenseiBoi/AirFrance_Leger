<h2>Gestion des Passagers</h2>

<?php
	if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
		$leClient=null;
		if(isset($_GET['action']) && isset($_GET['idclient'])){
			$idclient = $_GET['idclient'];
			$action= $_GET['action'];
			Switch($action){
				case "sup" : $unControleur->deleteClient($idclient); 
				break;
				case "edit" : 
				$leClient=$unControleur->selectWhereClient($idclient);
				break;
				case "voir" :
				$lesProduits=$unControleur->selectProduitClient($idclient);
				break;
			}
		}
		require_once("vue/vue_insert_client.php");
		if (isset($_POST['Valider'])){
			$unControleur->insertClient($_POST);
		}
		if (isset($_POST['Modifier'])){
			$unControleur->updateClient($_POST);
			header("Location: index.php?page=2");
		}
	}

	if (isset($_POST['filtrer'])){
		$filtre = $_POST['filtrer'];
		$lesClients=$unControleur->selectLikeClient($filtre);
		require_once("vue/vue_select_client.php");
	} else {
		$lesClients= $unControleur->selectAllClient ();
		require_once("vue/vue_select_client.php");
	}
	if (isset($lesProduits)){
		require_once("vue/vue_select_produit.php");
	}
	$nb=$unControleur->count("client")['nb'];
	echo "<br>Nombre de client(s): ".$nb;
?>