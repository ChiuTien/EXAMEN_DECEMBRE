CREATE DATABASE Uber;
USE Uber;
CREATE TABLE Carburant(
    id INT PRIMARY KEY AUTO_INCREMENT,
    val VARCHAR(50),
    prix DOUBLE
);
CREATE TABLE Livreur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50)
);
CREATE TABLE Vehicule(
    id INT PRIMARY KEY AUTO_INCREMENT,
    matricule VARCHAR(50), 
    idCarburant INT
);
CREATE TABLE TableYear(
    id INT PRIMARY KEY AUTO_INCREMENT,
    val INT
);
CREATE TABLE TableMonth(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idYear INT,
    val VARCHAR(20)
);
CREATE TABLE TableDay(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idMonth INT,
    jour DATE
);
CREATE TABLE Binome(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idLivreur INT,
    idVehicule INT
);
CREATE TABLE Entrepot(
    id INT PRIMARY KEY AUTO_INCREMENT,
    adresse VARCHAR(100)
);
CREATE TABLE Destination(
    id INT PRIMARY KEY AUTO_INCREMENT,
    adresse VARCHAR(100)
);
CREATE TABLE ZoneLivraison(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idEntrepot INT,
    idDestination INT,
    distance DOUBLE
);
CREATE TABLE Statut(
    id INT PRIMARY KEY AUTO_INCREMENT,
    val VARCHAR(50) 
);
CREATE TABLE TableDepense(
    id INT PRIMARY KEY AUTO_INCREMENT,
    salChauffeur DOUBLE,
    depCarburant DOUBLE,
    depEntretien DOUBLE
);
CREATE TABLE RapportLivraison(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idLivraison INT,
    idDepense INT,
    recette DOUBLE,
    difference DOUBLE
);
CREATE TABLE Livraison(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idBinome INT,
    idDay INT,
    idZone INT,
    idColis INT,
    depVoiture DOUBLE
);
CREATE TABLE StatutLivraison(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idLivraison INT,
    idStatut INT,
    debut DATETIME,
    fin DATETIME
);
CREATE TABLE Colis(
    id INT PRIMARY KEY AUTO_INCREMENT,
    val VARCHAR(100),
    img VARCHAR(100),
    poids DOUBLE
);
CREATE TABLE Equivalence(
    id INT PRIMARY KEY AUTO_INCREMENT,
    pMin DOUBLE,
    pMax DOUBLE,
    prix DOUBLE
);

ALTER TABLE Livraison DROP COLUMN depVoiture;