\c postgres;
DROP DATABASE IF EXISTS rallye_rojo;
CREATE DATABASE rallye_rojo;
\c rallye_rojo;

-- ============================
-- Suppression préalable
-- ============================
DROP TABLE IF EXISTS epreuves_equipage CASCADE;
DROP TABLE IF EXISTS equipage_categorie CASCADE;
DROP TABLE IF EXISTS equipage CASCADE;
DROP TABLE IF EXISTS pilote_poste CASCADE;
DROP TABLE IF EXISTS participant CASCADE;
DROP TABLE IF EXISTS poste CASCADE;
DROP TABLE IF EXISTS categorie CASCADE;
DROP TABLE IF EXISTS epreuves_speciales CASCADE;

-- ============================
-- Création des tables
-- ============================

CREATE TABLE participant (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

-- CREATE TABLE poste (
--     id SERIAL PRIMARY KEY,
--     type_poste VARCHAR(50) NOT NULL
-- );

-- CREATE TABLE pilote_poste (
--     id_participant INT NOT NULL REFERENCES participant(id) ON DELETE CASCADE,
--     id_poste INT NOT NULL REFERENCES poste(id) ON DELETE CASCADE,
--     PRIMARY KEY (id_participant, id_poste)
-- );

CREATE TABLE categorie (
    id SERIAL PRIMARY KEY,
    nom_categorie VARCHAR(50) NOT NULL
);

CREATE TABLE equipage (
    id_pilote INT NOT NULL REFERENCES participant(id) ON DELETE CASCADE,
    id_copilote INT NOT NULL REFERENCES participant(id) ON DELETE CASCADE,
    id_categorie INT NOT NULL REFERENCES categorie(id) ON DELETE CASCADE,
    PRIMARY KEY (id_pilote, id_copilote)
);

CREATE TABLE epreuves_speciales (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    distance NUMERIC(10,2)
);

CREATE TABLE epreuves_equipage (
    id_pilote INT NOT NULL,
    id_copilote INT NOT NULL,
    id_epreuve INT NOT NULL REFERENCES epreuves_speciales(id) ON DELETE CASCADE,
    temps NUMERIC(10,2),
    PRIMARY KEY (id_pilote, id_copilote, id_epreuve),
    FOREIGN KEY (id_pilote, id_copilote) REFERENCES equipage(id_pilote, id_copilote) ON DELETE CASCADE
);