<?php

require_once '../config/database.php';

class VolModel {
    private $bdd;

    

    public function __construct() {
        $this->bdd = ConnexionBD::getInstance();
    }

    public function getAllFlights() {
        $requete = $this->bdd->prepare("SELECT * FROM vols");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

class AeroportModel {
    private $bdd;

    public function __construct() {
        $this->bdd = ConnexionBD::getInstance();
    }

    public function getAllAirports() {
        $requete = $this->bdd->prepare("SELECT * FROM aeroports");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

class PassagerModel {
    private $bdd;

    public function __construct() {
        $this->bdd = ConnexionBD::getInstance();
    }

    public function getAllPassengers() {
        $requete = $this->bdd->prepare("SELECT * FROM passagers INNER JOIN personne ON passagers.ID_Personne = personne.ID_Personne");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

class ReservationModel {
    private $bdd;

    public function __construct() {
        $this->bdd = ConnexionBD::getInstance();
    }

    public function getAllReservations() {
        $requete = $this->bdd->prepare("SELECT * FROM reservations");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

class AvionModel {
    private $bdd;

    public function __construct() {
        $this->bdd = ConnexionBD::getInstance();
    }

    public function getAllPlanes() {
        $requete = $this->bdd->prepare("SELECT * FROM avions");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>









































































//ok tu peux le faire pour moi je te fais une mise en  situation : Supposons que nous travaillons sur un système de gestion de vols pour une compagnie aérienne. Dans ce système, nous devons gérer les vols, les aéroports, les passagers, les réservations et les avions.