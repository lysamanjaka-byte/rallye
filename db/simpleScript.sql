\c postgres;
DROP DATABASE IF EXISTS rallye_rojo;
CREATE DATABASE rallye_rojo;
\c rallye_rojo;

-- ============================
-- Suppression préalable
-- ============================
DROP TABLE IF EXISTS epreuves_equipage CASCADE;
DROP TABLE IF EXISTS equipage CASCADE;
DROP TABLE IF EXISTS participant CASCADE;
DROP TABLE IF EXISTS categorie CASCADE;
DROP TABLE IF EXISTS epreuves_speciales CASCADE;

-- ============================
-- Création des tables
-- ============================

CREATE TABLE participant (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE categorie (
    id SERIAL PRIMARY KEY,
    nom_categorie VARCHAR(50) NOT NULL
);

CREATE TABLE equipage (
    id SERIAL PRIMARY KEY,
    id_pilote INT NOT NULL REFERENCES participant(id) ON DELETE CASCADE,
    id_copilote INT NOT NULL REFERENCES participant(id) ON DELETE CASCADE,
    id_categorie INT NOT NULL REFERENCES categorie(id) ON DELETE CASCADE,
    CHECK (id_pilote <> id_copilote)
);

CREATE TABLE epreuves_speciales (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    distance NUMERIC(10,2)
);

CREATE TABLE epreuves_equipage (
    id SERIAL PRIMARY KEY,
    id_equipage INT NOT NULL REFERENCES equipage(id) ON DELETE CASCADE,
    id_epreuve INT NOT NULL REFERENCES epreuves_speciales(id) ON DELETE CASCADE,
    temps NUMERIC(10,2)
);
