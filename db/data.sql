-- ============================
-- Données de test
-- ============================

-- Participants
INSERT INTO participant (nom) VALUES
('Jean Rakoto'),
('Paul Andrianina'),
('Hery Rabe'),
('Lova Randria');

-- Postes
INSERT INTO poste (type_poste) VALUES ('Pilote'), ('Copilote');

-- Attribution postes
INSERT INTO pilote_poste VALUES
(1, 1), -- Jean : pilote
(2, 2), -- Paul : copilote
(3, 1), -- Hery : pilote
(4, 2); -- Lova : copilote

-- Catégories
INSERT INTO categorie (nom_categorie) VALUES
('R5'),
('M11'),
('GT3'),
('Rally2');

-- Équipages
INSERT INTO equipage VALUES
(1, 2, 1), -- Jean & Paul -> R5
(3, 4, 2); -- Hery & Lova -> M11

-- Épreuves spéciales
INSERT INTO epreuves_speciales (nom, distance) VALUES
('Andohalo - Anosy', 12.5),
('Ivato - Talatamaty', 18.2),
('Ambatolampy - Antsirabe', 25.0),
('Antsirabe - Ambositra', 30.8);

-- Épreuves terminées par les équipages
-- Équipage 1 (Jean & Paul) a participé à 1 course
INSERT INTO epreuves_equipage VALUES
(1, 2, 1, 15.37); -- Épreuve 1

-- Équipage 2 (Hery & Lova) a participé à 2 courses
INSERT INTO epreuves_equipage VALUES
(3, 4, 2, 21.58),
(3, 4, 3, 35.12);