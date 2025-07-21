CREATE DATABASE IF NOT EXISTS ecoride;
USE ecoride;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
   
);

CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50),
    modele VARCHAR(50),
    immatriculation VARCHAR(20) UNIQUE,
    places INT,
    conducteur_id INT,
    FOREIGN KEY (conducteur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
);

CREATE TABLE trajets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville_depart VARCHAR(100) NOT NULL,
    ville_arrivee VARCHAR(100) NOT NULL,
    date_trajet DATE NOT NULL,
    heure_trajet TIME NOT NULL,
    nb_places INT NOT NULL,
    prix DECIMAL(6,2) NOT NULL,
    conducteur_id INT,
    FOREIGN KEY (conducteur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    trajet_id INT,
    nb_passagers INT NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE,
    FOREIGN KEY (trajet_id) REFERENCES trajets(id) ON DELETE CASCADE
);
