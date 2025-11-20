<?php
Flight::register('db', 'PDO', array(
    'pgsql:host=localhost;port=5432;dbname=rallye_rojo', // nom de ta base de données
    'postgres',        // ton utilisateur PostgreSQL
    'postgres'       // ton mot de passe
), function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});