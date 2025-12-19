-- 1. CARBURANT
INSERT INTO Carburant (val, prix) VALUES
('Essence SP-95', 1.85),
('Essence SP-98', 1.95),
('Diesel B7', 1.65),
('Diesel B10', 1.60),
('E85', 0.85),
('Electrique', 0.15);

-- 2. LIVREUR
INSERT INTO Livreur (nom) VALUES
('Jean Dupont'),
('Marie Martin'),
('Pierre Durand'),
('Sophie Bernard'),
('Thomas Petit'),
('Julie Moreau'),
('Michel Laurent'),
('Isabelle Simon'),
('David Lefebvre'),
('Catherine Roux');

-- 3. VÉHICULE
INSERT INTO Vehicule (matricule, idCarburant) VALUES
('AB-123-CD', 1),
('EF-456-GH', 3),
('IJ-789-KL', 2),
('MN-012-OP', 4),
('QR-345-ST', 5),
('UV-678-WX', 3),
('YZ-901-BC', 1),
('DE-234-FG', 6),
('HI-567-JK', 3),
('LM-890-NO', 2);

-- 4. ANNÉES
INSERT INTO TableYear (val) VALUES
(2023),
(2024),
(2025);

-- 5. MOIS
INSERT INTO TableMonth (idYear, val) VALUES
(1, 'Janvier'), (1, 'Février'), (1, 'Mars'), (1, 'Avril'), (1, 'Mai'), (1, 'Juin'),
(1, 'Juillet'), (1, 'Août'), (1, 'Septembre'), (1, 'Octobre'), (1, 'Novembre'), (1, 'Décembre'),
(2, 'Janvier'), (2, 'Février'), (2, 'Mars'), (2, 'Avril'), (2, 'Mai'), (2, 'Juin'),
(2, 'Juillet'), (2, 'Août'), (2, 'Septembre'), (2, 'Octobre'), (2, 'Novembre'), (2, 'Décembre'),
(3, 'Janvier'), (3, 'Février'), (3, 'Mars'), (3, 'Avril'), (3, 'Mai'), (3, 'Juin');

-- 6. JOURS (exemple pour 10 jours)
INSERT INTO TableDay (idMonth, jour) VALUES
(1, '2023-01-15'), (1, '2023-01-16'),
(2, '2023-02-20'), (2, '2023-02-21'),
(3, '2023-03-10'), (3, '2023-03-11'),
(13, '2024-01-05'), (13, '2024-01-06'),
(14, '2024-02-14'), (14, '2024-02-15');

-- 7. BINÔME (Livreur + Véhicule)
INSERT INTO Binome (idLivreur, idVehicule) VALUES
(1, 1),  -- Jean avec véhicule 1
(2, 3),  -- Marie avec véhicule 3
(3, 2),  -- Pierre avec véhicule 2
(4, 5),  -- Sophie avec véhicule 5
(5, 4),  -- Thomas avec véhicule 4
(6, 6),  -- Julie avec véhicule 6
(7, 7),  -- Michel avec véhicule 7
(8, 8),  -- Isabelle avec véhicule 8
(9, 9),  -- David avec véhicule 9
(10, 10); -- Catherine avec véhicule 10

-- 8. ENTREPÔTS
INSERT INTO Entrepot (adresse) VALUES
('123 Rue de Paris, 75001 Paris'),
('456 Avenue des Champs-Élysées, 75008 Paris'),
('789 Boulevard Saint-Germain, 75006 Paris'),
('101 Rue de Rivoli, 75004 Paris'),
('202 Rue de la Pompe, 75116 Paris');

-- 9. DESTINATIONS
INSERT INTO Destination (adresse) VALUES
('15 Avenue Montaigne, 75008 Paris'),
('22 Rue du Faubourg Saint-Honoré, 75008 Paris'),
('37 Quai d''Orsay, 75007 Paris'),
('48 Rue de Varenne, 75007 Paris'),
('59 Rue de Sèvres, 75006 Paris'),
('66 Rue du Cherche-Midi, 75006 Paris'),
('77 Avenue de la Bourdonnais, 75007 Paris'),
('88 Rue de la Faisanderie, 75116 Paris');

-- 10. ZONES DE LIVRAISON
INSERT INTO ZoneLivraison (idEntrepot, idDestination, distance) VALUES
(1, 1, 3.5), (1, 2, 4.2), (1, 3, 2.8),
(2, 4, 5.1), (2, 5, 3.7), (2, 6, 6.2),
(3, 7, 4.5), (3, 8, 7.3), (3, 1, 8.1),
(4, 2, 2.3), (4, 3, 3.9), (4, 4, 5.4),
(5, 5, 4.8), (5, 6, 6.7), (5, 7, 3.2);

-- 11. STATUTS
INSERT INTO Statut (val) VALUES
('En préparation'),
('Chargé dans le véhicule'),
('En route'),
('En livraison'),
('Livré'),
('Retour entrepôt'),
('Annulé'),
('Problème signalé');

-- 12. COLIS
INSERT INTO Colis (val, img, poids) VALUES
('Smartphone iPhone 15', 'iphone15.jpg', 0.4),
('Ordinateur portable Dell', 'dell_laptop.jpg', 2.3),
('Livre "Le Petit Prince"', 'petit_prince.jpg', 0.3),
('Vêtements Zara', 'vetements.jpg', 1.2),
('Nourriture traiteur', 'traiteur.jpg', 3.5),
('Médicaments', 'medicaments.jpg', 0.8),
('Cosmétiques', 'cosmetiques.jpg', 0.9),
('Jouet Lego', 'lego.jpg', 1.7),
('Électronique gaming', 'gaming.jpg', 4.2),
('Documents importants', 'documents.jpg', 0.2);

-- 13. ÉQUIVALENCE POIDS/PRIX
INSERT INTO Equivalence (pMin, pMax, prix) VALUES
(0, 1, 5.99),     -- 0-1kg = 5.99€
(1.01, 3, 8.99),  -- 1-3kg = 8.99€
(3.01, 5, 12.99), -- 3-5kg = 12.99€
(5.01, 10, 19.99),-- 5-10kg = 19.99€
(10.01, 20, 29.99),-- 10-20kg = 29.99€
(20.01, 50, 49.99);-- 20-50kg = 49.99€

-- 14. TABLE DÉPENSES
INSERT INTO TableDepense (salChauffeur, depCarburant, depEntretien) VALUES
(120.50, 45.30, 25.00),
(118.75, 52.10, 18.50),
(125.00, 38.75, 32.25),
(115.25, 47.80, 22.75),
(122.00, 41.20, 28.30),
(119.50, 49.65, 19.80),
(124.25, 36.90, 35.40),
(117.75, 53.45, 16.95),
(121.00, 39.80, 30.20),
(116.50, 50.25, 21.60);

-- 15. LIVRAISONS
INSERT INTO Livraison (idBinome, idDay, idZone, idColis) VALUES
(1, 1, 1, 1),   -- Jean, 15/01/2023, Zone 1, iPhone
(2, 1, 2, 2),   -- Marie, 15/01/2023, Zone 2, Laptop
(3, 2, 3, 3),   -- Pierre, 16/01/2023, Zone 3, Livre
(4, 3, 4, 4),   -- Sophie, 20/02/2023, Zone 4, Vêtements
(5, 4, 5, 5),   -- Thomas, 21/02/2023, Zone 5, Nourriture
(6, 5, 6, 6),   -- Julie, 10/03/2023, Zone 6, Médicaments
(7, 6, 7, 7),   -- Michel, 11/03/2023, Zone 7, Cosmétiques
(8, 7, 8, 8),   -- Isabelle, 05/01/2024, Zone 8, Lego
(9, 8, 9, 9),   -- David, 06/01/2024, Zone 9, Gaming
(10, 9, 10, 10);-- Catherine, 14/02/2024, Zone 10, Documents

-- 16. STATUT LIVRAISON
INSERT INTO StatutLivraison (idLivraison, idStatut, debut, fin) VALUES
(1, 1, '2023-01-15 08:30:00', '2023-01-15 09:00:00'),
(1, 2, '2023-01-15 09:00:00', '2023-01-15 09:15:00'),
(1, 3, '2023-01-15 09:15:00', '2023-01-15 09:45:00'),
(1, 4, '2023-01-15 09:45:00', '2023-01-15 10:00:00'),
(1, 5, '2023-01-15 10:00:00', NULL),

(2, 1, '2023-01-15 09:00:00', '2023-01-15 09:30:00'),
(2, 2, '2023-01-15 09:30:00', '2023-01-15 09:45:00'),
(2, 3, '2023-01-15 09:45:00', '2023-01-15 10:15:00'),
(2, 4, '2023-01-15 10:15:00', '2023-01-15 10:30:00'),
(2, 5, '2023-01-15 10:30:00', NULL),

(3, 1, '2023-01-16 08:00:00', '2023-01-16 08:20:00'),
(3, 2, '2023-01-16 08:20:00', '2023-01-16 08:30:00'),
(3, 3, '2023-01-16 08:30:00', '2023-01-16 09:00:00'),
(3, 5, '2023-01-16 09:00:00', NULL); -- Livré directement

-- 17. RAPPORT LIVRAISON
INSERT INTO RapportLivraison (idLivraison, idDepense, recette, difference) VALUES
(1, 1, 8.99, 8.99 - (120.50 + 45.30 + 25.00)/10), -- Recette - (dépenses/10 livraisons)
(2, 2, 12.99, 12.99 - (118.75 + 52.10 + 18.50)/10),
(3, 3, 5.99, 5.99 - (125.00 + 38.75 + 32.25)/10),
(4, 4, 8.99, 8.99 - (115.25 + 47.80 + 22.75)/10),
(5, 5, 12.99, 12.99 - (122.00 + 41.20 + 28.30)/10),
(6, 6, 8.99, 8.99 - (119.50 + 49.65 + 19.80)/10),
(7, 7, 8.99, 8.99 - (124.25 + 36.90 + 35.40)/10),
(8, 8, 12.99, 12.99 - (117.75 + 53.45 + 16.95)/10),
(9, 9, 19.99, 19.99 - (121.00 + 39.80 + 30.20)/10),
(10, 10, 5.99, 5.99 - (116.50 + 50.25 + 21.60)/10);