<?php
namespace App\Controllers;

use App\Models\Equipage;
use Flight;

class EquipageController {
    public static function getAll() {
        $model = new Equipage(Flight::db());
        Flight::json($model->getAll());
    }

    public static function getById($id) {
        $model = new Equipage(Flight::db());
        $item = $model->getById($id);
        if ($item) Flight::json($item); else Flight::json(['error'=>'Not found'], 404);
    }

    public static function create() {
        $data = Flight::request()->data->getData();
        $model = new Equipage(Flight::db());
        $model->create($data);
        Flight::json(['message'=>'Created'], 201);
    }

    public static function update($id) {
        $data = Flight::request()->data->getData();
        $model = new Equipage(Flight::db());
        $model->update($id, $data);
        Flight::json(['message'=>'Updated']);
    }

    public static function delete($id) {
        $model = new Equipage(Flight::db());
        $model->delete($id);
        Flight::json(['message'=>'Deleted']);
    }
}