<?php
	class Modele {
		private $unPDO;
		public function __construct(){
			try {
				$url="mysql:host=localhost;dbname=airfrance";
				$user="root";
				$mdp="";
				$this->unPDO= new PDO ($url, $user, $mdp);
			}
			catch(PDOException $exp){
				echo "Erreur de connexion: ".$exp->getMessage();
			}
		}

		public function updateProfil($email, $prenom, $mdp = null) {
			$sql = "UPDATE admin SET Prenom = :prenom, Email = :email";
			if ($mdp != null) {
				$sql .= ", MotDePasse = :mdp";
			}
			$sql .= " WHERE Email = :email_actuel";
	
			$params = array(
				":prenom" => $prenom,
				":email" => $email,
				":email_actuel" => $_SESSION['email']
			);
	
			if ($mdp != null) {
				$params[":mdp"] = password_hash($mdp, PASSWORD_BCRYPT);
			}
	
			$stmt = $this->unPDO->prepare($sql);
			$stmt->execute($params);
	
			// Mettre à jour les informations de session
			$_SESSION['prenom'] = $prenom;
			$_SESSION['email'] = $email;
		}

		public function getUserByEmail($email) {
			$sql = "SELECT * FROM admin WHERE Email = :email";
			$stmt = $this->unPDO->prepare($sql);
			$stmt->execute(array(':email' => $email));
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function insertPassagers($tab) {
			if ($this->unPDO != null) {
				try {
					$this->unPDO->beginTransaction();
	
					// Insertion dans la table personne
					$requetePersonne = "INSERT INTO personne (Nom, Prenom, Email, Telephone) VALUES (:Nom, :Prenom, :Email, :Telephone)";
					$insertPersonne = $this->unPDO->prepare($requetePersonne);
					$insertPersonne->execute(array(
						":Nom" => $tab['Nom'],
						":Prenom" => $tab['Prenom'],
						":Email" => $tab['Email'],
						":Telephone" => $tab['Telephone']
					));
	
					$idPersonne = $this->unPDO->lastInsertId();
	
					// Insertion dans la table passagers
					$requetePassager = "INSERT INTO passagers (ID_Personne, NumPasseport) VALUES (:ID_Personne, :NumPasseport)";
					$insertPassager = $this->unPDO->prepare($requetePassager);
					$insertPassager->execute(array(
						":ID_Personne" => $idPersonne,
						":NumPasseport" => $tab['NumPasseport']
					));
	
					$this->unPDO->commit();
				} catch (PDOException $e) {
					$this->unPDO->rollBack();
					echo "Erreur : " . $e->getMessage();
				}
			}
		}
	
		public function selectAllPassagers(){
			$requete = "SELECT * FROM vue_passagers";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll();
		}
	
		public function selectLikePassager($filtre){
			$requete = "SELECT * FROM vue_passagers WHERE NumPasseport LIKE :filtre OR Nom LIKE :filtre OR Prenom LIKE :filtre OR Telephone LIKE :filtre OR Email LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll();
		}
	
		public function deletePassager($idPassager){
			$requete = "CALL DeletePassager(:passagerID)";
			$donnees = array(":passagerID" => $idPassager);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}
	
	
	public function selectWherePassager($idPassager){
        try {
            $requete = "SELECT * FROM vue_passagers WHERE ID_Passager = :idPassager";
            $donnees = array(":idPassager" => $idPassager);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            return $select->fetch();
        } catch (PDOException $e) {
            // Log l'erreur plutôt que de l'afficher à l'écran
            error_log("Erreur : " . $e->getMessage());
            // Rediriger ou afficher un message d'erreur convivial pour l'utilisateur
            die("Une erreur est survenue lors de la récupération des données.");
        }
    }
	
		public function updatePassager($tab) {
			if ($this->unPDO != null) {
				try {
					$this->unPDO->beginTransaction();
	
					// Mise à jour dans la table personne
					$requetePersonne = "UPDATE personne SET Nom = :Nom, Prenom = :Prenom, Email = :Email, Telephone = :Telephone WHERE ID_Personne = (SELECT ID_Personne FROM passagers WHERE ID_Passager = :ID_Passager)";
					$updatePersonne = $this->unPDO->prepare($requetePersonne);
					$updatePersonne->execute(array(
						":Nom" => $tab['Nom'],
						":Prenom" => $tab['Prenom'],
						":Email" => $tab['Email'],
						":Telephone" => $tab['Telephone'],
						":ID_Passager" => $tab['ID_Passager']
					));
	
					// Mise à jour dans la table passagers
					$requetePassager = "UPDATE passagers SET NumPasseport = :NumPasseport WHERE ID_Passager = :ID_Passager";
					$updatePassager = $this->unPDO->prepare($requetePassager);
					$updatePassager->execute(array(
						":NumPasseport" => $tab['NumPasseport'],
						":ID_Passager" => $tab['ID_Passager']
					));
	
					$this->unPDO->commit();
				} catch (PDOException $e) {
					$this->unPDO->rollBack();
					echo "Erreur : " . $e->getMessage();
				}
			}
		}
		public function insertAeroport($tab){
			$requete = "INSERT INTO aeroports (Nom, Localisation) VALUES (:nom, :localisation)";
			$donnees = array(
				":nom" => $tab['Nom'],
				":localisation" => $tab['Localisation']
			);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	
		public function selectAllAeroports(){
			$requete = "SELECT * FROM aeroports";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll();
		}
	
		public function selectLikeAeroport($filtre){
			$requete = "SELECT * FROM aeroports WHERE Nom LIKE :filtre OR Localisation LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll();
		}
	
		public function deleteAeroport($idAeroport){
			$requete = "CALL DeleteAeroport(:idAeroport)";
			$donnees = array(":idAeroport" => $idAeroport);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}
		
	
		public function selectWhereAeroport($idAeroport){
			$requete = "SELECT * FROM aeroports WHERE ID_Aeroport = :idAeroport";
			$donnees = array(":idAeroport" => $idAeroport);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch();
		}
	
		public function updateAeroport($tab){
			$requete = "UPDATE aeroports SET Nom = :nom, Localisation = :localisation WHERE ID_Aeroport = :idAeroport";
			$donnees = array(
				":idAeroport" => $tab['ID_Aeroport'],
				":nom" => $tab['Nom'],
				":localisation" => $tab['Localisation']
			);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}
		public function insertAvion($tab){
			$requete = "INSERT INTO avions (Modele, NombrePlaces) VALUES (:modele, :nombrePlaces)";
			$donnees = array(
				":modele" => $tab['Modele'],
				":nombrePlaces" => $tab['NombrePlaces']
			);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	
		public function selectAllAvions(){
			$requete = "SELECT * FROM avions";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll();
		}
	
		public function selectLikeAvion($filtre){
			$requete = "SELECT * FROM avions WHERE Modele LIKE :filtre OR NombrePlaces LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll();
		}
	
		public function deleteAvion($idAvion){
			$requete = "CALL DeleteAvion(:idAvion)";
			$donnees = array(":idAvion" => $idAvion);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}
		
		
	
		public function selectWhereAvion($idAvion){
			$requete = "SELECT * FROM avions WHERE ID_Avion = :idAvion";
			$donnees = array(":idAvion" => $idAvion);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch();
		}
	
		public function updateAvion($tab){
			$requete = "UPDATE avions SET Modele = :modele, NombrePlaces = :nombrePlaces WHERE ID_Avion = :idAvion";
			$donnees = array(
				":idAvion" => $tab['ID_Avion'],
				":modele" => $tab['Modele'],
				":nombrePlaces" => $tab['NombrePlaces']
			);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}
		public function insertMembresEquipage($tab) {
			$requete = "CALL InsertMembreEquipage(:Nom, :Prenom, :Role, :DateEmbauche, :ID_Vol)";
			$stmt = $this->unPDO->prepare($requete);
			$stmt->execute([
				':Nom' => $tab['Nom'],
				':Prenom' => $tab['Prenom'],
				':Role' => $tab['Role'],
				':DateEmbauche' => $tab['DateEmbauche'],
				':ID_Vol' => $tab['ID_Vol']
			]);
		}		
	
		public function selectAllMembresEquipage($order = 'DESC') {
			$requete = "SELECT me.ID_MembreEquipage, me.ID_Personne, p.Nom, p.Prenom, me.Role, me.DateEmbauche, me.ID_Vol 
						FROM membresequipage me 
						JOIN personne p ON me.ID_Personne = p.ID_Personne 
						ORDER BY me.DateEmbauche $order";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function selectLikeMembresEquipage($champ, $filtre) {
			$requete = "SELECT me.ID_MembreEquipage, me.ID_Personne, p.Nom, p.Prenom, me.Role, me.DateEmbauche, me.ID_Vol 
						FROM membresequipage me 
						JOIN personne p ON me.ID_Personne = p.ID_Personne 
						WHERE $champ LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function deleteMembreEquipage($idMembreEquipage) {
			$requete = "DELETE FROM membresequipage WHERE ID_MembreEquipage = :idMembreEquipage";
			$donnees = array(":idMembreEquipage" => $idMembreEquipage);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}
		
		public function selectWhereMembreEquipage($idMembreEquipage) {
			$requete = "SELECT me.ID_MembreEquipage, me.ID_Personne, p.Nom, p.Prenom, me.Role, me.DateEmbauche, me.ID_Vol 
						FROM membresequipage me 
						JOIN personne p ON me.ID_Personne = p.ID_Personne
						WHERE me.ID_MembreEquipage = :idMembreEquipage";
			$donnees = array(":idMembreEquipage" => $idMembreEquipage);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch();
		}
	
		public function updateMembreEquipage($tab) {
			$requete = "UPDATE membresequipage SET ID_Personne = :idPersonne, Role = :role, DateEmbauche = :dateEmbauche, ID_Vol = :idVol 
						WHERE ID_MembreEquipage = :idMembreEquipage";
			$donnees = array(
				":idMembreEquipage" => $tab['ID_MembreEquipage'],
				":idPersonne" => $tab['ID_Personne'],
				":role" => $tab['Role'],
				":dateEmbauche" => $tab['DateEmbauche'],
				":idVol" => $tab['ID_Vol']
			);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		
			// Mise à jour des champs Nom et Prenom dans la table personne
			$requetePersonne = "UPDATE personne SET Nom = :nom, Prenom = :prenom WHERE ID_Personne = :idPersonne";
			$donneesPersonne = array(
				":nom" => $tab['Nom'],
				":prenom" => $tab['Prenom'],
				":idPersonne" => $tab['ID_Personne']
			);
			$updatePersonne = $this->unPDO->prepare($requetePersonne);
			$updatePersonne->execute($donneesPersonne);
		}
		
		
	
		public function selectAllReservations($order = 'DESC'){
			$requete = "SELECT * FROM vue_reservations ORDER BY DateReservation $order";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
		public function selectLikeReservation($champ, $filtre){
			$requete = "SELECT * FROM vue_reservations WHERE $champ LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function deleteReservation($idReservation){
			$requete = "DELETE FROM reservations WHERE ID_Reservation = :idReservation";
			$donnees = array(":idReservation" => $idReservation);
			$delete = $this->unPDO->prepare($requete);
			$delete->execute($donnees);
		}
	
		public function selectWhereReservation($idReservation){
			$requete = "SELECT * FROM reservations WHERE ID_Reservation = :idReservation";
			$donnees = array(":idReservation" => $idReservation);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch(PDO::FETCH_ASSOC);
		}
	
		
		public function insertVol($tab){
			$requete = "INSERT INTO vols (NumeroVol, DateDepart, HeureDepart, AeroportDepart, DateArrivee, HeureArrivee, AeroportArrivee, Avion) VALUES (:numeroVol, :dateDepart, :heureDepart, :aeroportDepart, :dateArrivee, :heureArrivee, :aeroportArrivee, :avion)";
			$donnees = array(
				":numeroVol" => $tab['NumeroVol'],
				":dateDepart" => $tab['DateDepart'],
				":heureDepart" => $tab['HeureDepart'],
				":aeroportDepart" => $tab['AeroportDepart'],
				":dateArrivee" => $tab['DateArrivee'],
				":heureArrivee" => $tab['HeureArrivee'],
				":aeroportArrivee" => $tab['AeroportArrivee'],
				":avion" => $tab['Avion']
			);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	
		public function selectAllVols($order = 'DESC'){
			$requete = "SELECT * FROM vue_vols ORDER BY DateDepart $order";
			$select = $this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function selectLikeVols($champ, $filtre){
			$requete = "SELECT * FROM vue_vols WHERE $champ LIKE :filtre";
			$donnees = array(":filtre" => "%".$filtre."%");
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetchAll(PDO::FETCH_ASSOC);
		}
	
		public function deleteVol($idVol){
			$requete = "CALL DeleteVol(:idVol)";
    		$donnees = array(":idVol" => $idVol);
    		$delete = $this->unPDO->prepare($requete);
    		$delete->execute($donnees);
		}
	
		public function selectWhereVol($idVol){
			$requete = "SELECT * FROM vols WHERE ID_Vol = :idVol";
			$donnees = array(":idVol" => $idVol);
			$select = $this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch();
		}
	
		public function updateVol($tab){
			$requete = "UPDATE vols SET NumeroVol = :numeroVol, DateDepart = :dateDepart, HeureDepart = :heureDepart, AeroportDepart = :aeroportDepart, DateArrivee = :dateArrivee, HeureArrivee = :heureArrivee, AeroportArrivee = :aeroportArrivee, Avion = :avion WHERE ID_Vol = :idVol";
			$donnees = array(
				":idVol" => $tab['ID_Vol'],
				":numeroVol" => $tab['NumeroVol'],
				":dateDepart" => $tab['DateDepart'],
				":heureDepart" => $tab['HeureDepart'],
				":aeroportDepart" => $tab['AeroportDepart'],
				":dateArrivee" => $tab['DateArrivee'],
				":heureArrivee" => $tab['HeureArrivee'],
				":aeroportArrivee" => $tab['AeroportArrivee'],
				":avion" => $tab['Avion']
			);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}
		public function count($table){
			$requete="select count(*) as nb from ".$table;
			$select=$this->unPDO->prepare($requete);
			$select->execute();
			return $select->fetch();
		}
		public function verifConnexion($email, $mdp){
			$requete="select * from admin where Email=:email and MotDePasse=:mdp ";
			$donnees=array(":email"=>$email, ":mdp"=>$mdp);
			$select=$this->unPDO->prepare($requete);
			$select->execute($donnees);
			return $select->fetch();
		}

		public function getVolDateDepart($idVol) {
			$sql = "SELECT DateDepart FROM vols WHERE ID_Vol = :idVol";
			$stmt = $this->unPDO->prepare($sql);
			$stmt->execute(array(':idVol' => $idVol));
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $result['DateDepart'];
		}
	
		// Méthode pour insérer une réservation
		public function insertReservation($tab) {
			$requete = "INSERT INTO reservations (ID_Passager, ID_Vol, DateReservation, SiegeAttribue) VALUES (:idPassager, :idVol, :dateReservation, :siegeAttribue)";
			$donnees = array(
				":idPassager" => $tab['ID_Passager'],
				":idVol" => $tab['ID_Vol'],
				":dateReservation" => $tab['DateReservation'],
				":siegeAttribue" => $tab['SiegeAttribue']
			);
			$insert = $this->unPDO->prepare($requete);
			$insert->execute($donnees);
		}
	
		public function updateReservation($tab) {
			$requete = "UPDATE reservations SET ID_Passager = :idPassager, ID_Vol = :idVol, DateReservation = :dateReservation, SiegeAttribue = :siegeAttribue WHERE ID_Reservation = :idReservation";
			$donnees = array(
				":idReservation" => $tab['ID_Reservation'],
				":idPassager" => $tab['ID_Passager'],
				":idVol" => $tab['ID_Vol'],
				":dateReservation" => $tab['DateReservation'],
				":siegeAttribue" => $tab['SiegeAttribue']
			);
			$update = $this->unPDO->prepare($requete);
			$update->execute($donnees);
		}
        
	}
?>