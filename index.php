<?php

require_once 'flight/Flight.php';
// require 'flight/autoload.php';

//require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config/database.php';

use App\Controllers\ParticipantController;
use App\Controllers\CategorieController;
use App\Controllers\EquipageController;
use App\Controllers\EpreuveSpecialeController;
use App\Controllers\EpreuveEquipageController;

// Participants
Flight::route('GET /participants', [ParticipantController::class, 'getAll']);
Flight::route('GET /participants/@id', [ParticipantController::class, 'getById']);
Flight::route('POST /participants', [ParticipantController::class, 'create']);
Flight::route('PUT /participants/@id', [ParticipantController::class, 'update']);
Flight::route('DELETE /participants/@id', [ParticipantController::class, 'delete']);

// Categories
Flight::route('GET /categories', [CategorieController::class, 'getAll']);
Flight::route('GET /categories/@id', [CategorieController::class, 'getById']);
Flight::route('POST /categories', [CategorieController::class, 'create']);
Flight::route('PUT /categories/@id', [CategorieController::class, 'update']);
Flight::route('DELETE /categories/@id', [CategorieController::class, 'delete']);

// Equipages
Flight::route('GET /equipages', [EquipageController::class, 'getAll']);
Flight::route('GET /equipages/@id', [EquipageController::class, 'getById']);
Flight::route('POST /equipages', [EquipageController::class, 'create']);
Flight::route('PUT /equipages/@id', [EquipageController::class, 'update']);
Flight::route('DELETE /equipages/@id', [EquipageController::class, 'delete']);

// Epreuves spéciales
Flight::route('GET /epreuves', [EpreuveSpecialeController::class, 'getAll']);
Flight::route('GET /epreuves/@id', [EpreuveSpecialeController::class, 'getById']);
Flight::route('POST /epreuves', [EpreuveSpecialeController::class, 'create']);
Flight::route('PUT /epreuves/@id', [EpreuveSpecialeController::class, 'update']);
Flight::route('DELETE /epreuves/@id', [EpreuveSpecialeController::class, 'delete']);

// Epreuves / Equipages (participations)
Flight::route('GET /epreuves_equipage', [EpreuveEquipageController::class, 'getAll']);
Flight::route('GET /epreuves_equipage/@id', [EpreuveEquipageController::class, 'getById']);
Flight::route('POST /epreuves_equipage', [EpreuveEquipageController::class, 'create']);
Flight::route('PUT /epreuves_equipage/@id', [EpreuveEquipageController::class, 'update']);
Flight::route('DELETE /epreuves_equipage/@id', [EpreuveEquipageController::class, 'delete']);

Flight::start();