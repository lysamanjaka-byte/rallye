<?php
namespace App\Models;

use PDO;

class Equipage {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM equipage ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM equipage WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO equipage (id_pilote, id_copilote, id_categorie) VALUES (?, ?, ?)");
        return $stmt->execute([$data['id_pilote'], $data['id_copilote'], $data['id_categorie']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE equipage SET id_pilote = ?, id_copilote = ?, id_categorie = ? WHERE id = ?");
        return $stmt->execute([$data['id_pilote'], $data['id_copilote'], $data['id_categorie'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM equipage WHERE id = ?");
        return $stmt->execute([$id]);
    }
}