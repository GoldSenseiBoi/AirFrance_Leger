<?php

require_once 'Modele.class.php';

class ControleurPrincipal {
    private $volModel;
    private $aeroportModel;
    private $passagerModel;
    private $reservationModel;
    private $avionModel;

    public function __construct() {
        $this->volModel = new VolModel();
        $this->aeroportModel = new AeroportModel();
        $this->passagerModel = new PassagerModel();
        $this->reservationModel = new ReservationModel();
        $this->avionModel = new AvionModel();
    }

    public function afficherTousVols() {
        $vols = $this->volModel->getAllFlights();
        // Afficher les vols
        foreach ($vols as $vol) {
            echo "Vol numéro : " . $vol['NumeroVol'] . "<br>";
        }
    }

    public function afficherTousAeroports() {
        $aeroports = $this->aeroportModel->getAllAirports();
        // Afficher les aéroports
        foreach ($aeroports as $aeroport) {
            echo "Aéroport : " . $aeroport['Nom'] . " - Localisation : " . $aeroport['Localisation'] . "<br>";
        }
    }

    public function afficherTousPassagers() {
        $passagers = $this->passagerModel->getAllPassengers();
        // Afficher les passagers
        foreach ($passagers as $passager) {
            echo "Passager : " . $passager['Prenom'] . " " . $passager['Nom'] . " - Numéro de passeport : " . $passager['NumPasseport'] . "<br>";
        }
    }

    public function afficherToutesReservations() {
        $reservations = $this->reservationModel->getAllReservations();
        // Afficher les réservations
        foreach ($reservations as $reservation) {
            echo "Réservation : ID " . $reservation['ID_Reservation'] . " - ID Passager : " . $reservation['ID_Passager'] . " - ID Vol : " . $reservation['ID_Vol'] . "<br>";
        }
    }

    public function afficherTousAvions() {
        $avions = $this->avionModel->getAllPlanes();
        // Afficher les avions
        foreach ($avions as $avion) {
            echo "Avion : " . $avion['Modele'] . " - Nombre de places : " . $avion['NombrePlaces'] . "<br>";
        }
    }
}
?>