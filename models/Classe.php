<?php
class Classe {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM classes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM classes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getEleves($classe_id) {
        $stmt = $this->conn->prepare("
            SELECT e.id, e.nom, e.prenom, e.date_naissance 
            FROM eleves e 
            WHERE e.classe_id = ?
        ");
        $stmt->execute([$classe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
