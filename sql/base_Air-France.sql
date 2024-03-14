-- Création de la base de données AirFrance
CREATE DATABASE IF NOT EXISTS AirFrance;


USE AirFrance;

-- Tables principales

CREATE TABLE Avion (
    ID_Avion INT AUTO_INCREMENT PRIMARY KEY,
    Modele VARCHAR(50) NOT NULL,
    Capacite INT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Aeroport (
    ID_Aeroport INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Ville VARCHAR(50) NOT NULL,
    Pays VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Destination (
    ID_Destination INT AUTO_INCREMENT PRIMARY KEY,
    Nom_ville VARCHAR(50) NOT NULL,
    Image VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Client (
    ID_Client INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Age INT NOT NULL,
    Nationalite VARCHAR(50) NOT NULL,
    Telephone VARCHAR(15) NOT NULL,
    Adresse VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Mot_de_passe VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Vol (
    ID_Vol INT AUTO_INCREMENT PRIMARY KEY,
    Numero_de_vol VARCHAR(10) NOT NULL,
    Date_depart DATETIME NOT NULL,
    Date_arrivee DATETIME NOT NULL,
    Aeroport_depart INT NOT NULL,
    Aeroport_arrivee INT NOT NULL,
    Avion_id INT NOT NULL,
    Nombre_de_places_disponibles INT NOT NULL,
    Compagnie_aerienne VARCHAR(50),
    Destination_depart INT,
    Destination_arrivee INT,
    FOREIGN KEY (Aeroport_depart) REFERENCES Aeroport(ID_Aeroport),
    FOREIGN KEY (Aeroport_arrivee) REFERENCES Aeroport(ID_Aeroport),
    FOREIGN KEY (Avion_id) REFERENCES Avion(ID_Avion),
    FOREIGN KEY (Destination_depart) REFERENCES Destination(ID_Destination),
    FOREIGN KEY (Destination_arrivee) REFERENCES Destination(ID_Destination)
) ENGINE=InnoDB;

CREATE TABLE Reservation (
    ID_Reservation INT AUTO_INCREMENT PRIMARY KEY,
    ID_Vol INT,
    ID_Client INT,
    Date_reservation DATETIME NOT NULL,
    FOREIGN KEY (ID_Vol) REFERENCES Vol(ID_Vol),
    FOREIGN KEY (ID_Client) REFERENCES Client(ID_Client)
) ENGINE=InnoDB;

CREATE TABLE Admin (
    ID_Admin INT AUTO_INCREMENT PRIMARY KEY,
    Nom_utilisateur VARCHAR(50) NOT NULL,
    Mot_de_passe VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Insertion dans la table Avion
INSERT INTO Avion (Modele, Capacite) VALUES
('Boeing 737', 150),
('Airbus A320', 180),
('Boeing 777', 350),
('Airbus A380', 500),
('Boeing 787', 250),
('Airbus A330', 300),
('Embraer E190', 100),
('Bombardier CRJ900', 90);

-- Insertion dans la table Destination
INSERT INTO Destination (Nom_ville, Image) VALUES
('Paris', 'images/paris.jpg'),
('New York', 'images/new_york.jpg'),
('London', 'images/london.jpg'),
('Tokyo', 'images/tokyo.jpg'),
('Sydney', 'images/sydney.jpg'),
('Rome', 'images/rome.jpg'),
('Dubai', 'images/dubai.jpg'),
('Los Angeles', 'images/los_angeles.jpg'),
('Moscow', 'images/moscow.jpg'),
('Beijing', 'images/beijing.jpg');

-- Insertion dans la table Aeroport
INSERT INTO Aeroport (Nom, Ville, Pays) VALUES
('Charles de Gaulle Airport', 'Paris', 'France'),
('John F. Kennedy International Airport', 'New York', 'USA'),
('Heathrow Airport', 'London', 'UK'),
('Narita International Airport', 'Tokyo', 'Japan'),
('Sydney Airport', 'Sydney', 'Australia'),
('Leonardo da Vinci–Fiumicino Airport', 'Rome', 'Italy'),
('Dubai International Airport', 'Dubai', 'UAE'),
('Los Angeles International Airport', 'Los Angeles', 'USA'),
('Sheremetyevo International Airport', 'Moscow', 'Russia'),
('Beijing Capital International Airport', 'Beijing', 'China');

-- Insertion dans la table Vol
INSERT INTO Vol (Numero_de_vol, Date_depart, Date_arrivee, Aeroport_depart, Aeroport_arrivee, Avion_id, Nombre_de_places_disponibles, Compagnie_aerienne, Destination_depart, Destination_arrivee)
VALUES
('AF101', '2024-03-10 08:00:00', '2024-03-10 10:30:00', 1, 2, 1, 150, 'Air France', 1, 2),
('AF102', '2024-03-11 10:00:00', '2024-03-11 15:30:00', 2, 3, 2, 180, 'Air France', 2, 3),
('AF103', '2024-03-12 12:00:00', '2024-03-12 17:30:00', 3, 4, 3, 350, 'Air France', 3, 4),
('AF104', '2024-03-13 14:00:00', '2024-03-13 19:30:00', 4, 5, 4, 500, 'Air France', 4, 5),
('AF105', '2024-03-14 16:00:00', '2024-03-14 21:30:00', 5, 6, 5, 250, 'Air France', 5, 6),
('AF106', '2024-03-15 18:00:00', '2024-03-15 23:30:00', 6, 7, 6, 300, 'Air France', 6, 7),
('AF107', '2024-03-16 20:00:00', '2024-03-16 01:30:00', 7, 8, 7, 100, 'Air France', 7, 8),
('AF108', '2024-03-17 22:00:00', '2024-03-17 03:30:00', 8, 9, 8, 90, 'Air France', 8, 9),
('AF109', '2024-03-18 08:00:00', '2024-03-18 10:30:00', 9, 10, 1, 150, 'Air France', 9, 10),
('AF110', '2024-03-19 10:00:00', '2024-03-19 15:30:00', 10, 1, 2, 180, 'Air France', 10, 1);

