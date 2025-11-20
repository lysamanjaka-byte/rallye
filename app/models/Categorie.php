<?php
namespace App\Models;

use PDO;

class Categorie {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM categorie ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categorie WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO categorie (nom_categorie) VALUES (?)");
        return $stmt->execute([$data['nom_categorie']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE categorie SET nom_categorie = ? WHERE id = ?");
        return $stmt->execute([$data['nom_categorie'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM categorie WHERE id = ?");
        return $stmt->execute([$id]);
    }
}