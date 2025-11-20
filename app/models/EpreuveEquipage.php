<?php
namespace App\Models;

use PDO;

class EpreuveEquipage {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM epreuves_equipage ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM epreuves_equipage WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO epreuves_equipage (id_equipage, id_epreuve, temps) VALUES (?, ?, ?)");
        return $stmt->execute([$data['id_equipage'], $data['id_epreuve'], $data['temps']]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE epreuves_equipage SET id_equipage = ?, id_epreuve = ?, temps = ? WHERE id = ?");
        return $stmt->execute([$data['id_equipage'], $data['id_epreuve'], $data['temps'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM epreuves_equipage WHERE id = ?");
        return $stmt->execute([$id]);
    }
}