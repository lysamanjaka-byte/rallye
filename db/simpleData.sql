-- Participants
INSERT INTO participant (nom) VALUES
('Jean Rakoto'),
('Paul Andrianina'),
('Hery Rabe'),
('Lova Randria');

-- Catégories
INSERT INTO categorie (nom_categorie) VALUES
('R5'),
('M11'),
('GT3'),
('Rally2');

-- Équipages
-- Jean (pilote) & Paul (copilote) -> R5
-- Hery (pilote) & Lova (copilote) -> M11
INSERT INTO equipage (id_pilote, id_copilote, id_categorie) VALUES
(1, 2, 1),
(3, 4, 2);

-- Épreuves spéciales
INSERT INTO epreuves_speciales (nom, distance) VALUES
('Andohalo - Anosy', 12.5),
('Ivato - Talatamaty', 18.2),
('Ambatolampy - Antsirabe', 25.0),
('Antsirabe - Ambositra', 30.8);

-- Participation aux épreuves
-- Équipage 1 a fait 1 épreuve
INSERT INTO epreuves_equipage (id_equipage, id_epreuve, temps) VALUES
(1, 1, 15.37);

-- Équipage 2 a fait 2 épreuves
INSERT INTO epreuves_equipage (id_equipage, id_epreuve, temps) VALUES
(2, 2, 21.58),
(2, 3, 35.12);

-- Vérification
SELECT * FROM participant;
SELECT * FROM equipage;
SELECT * FROM epreuves_speciales;
SELECT * FROM epreuves_equipage;
