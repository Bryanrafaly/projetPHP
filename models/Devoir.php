<?php
class Devoir {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO devoirs (classe_id, titre, matiere, date_devoir)
            VALUES (:classe_id, :titre, :matiere, :date_devoir)
        ");
        $stmt->execute([
            ':classe_id' => $data['classe_id'],
            ':titre' => $data['titre'],
            ':matiere' => $data['matiere'],
            ':date_devoir' => $data['date_devoir']
        ]);
        return $this->conn->lastInsertId();
    }

    public function addNote($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO notes_devoirs (devoir_id, eleve_id, note)
            VALUES (:devoir_id, :eleve_id, :note)
        ");
        $stmt->execute($data);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT d.*, c.nom AS classe_nom FROM devoirs d JOIN classes c ON d.classe_id=c.id ORDER BY d.date_devoir DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotes($devoir_id) {
        $stmt = $this->conn->prepare("
            SELECT n.*, e.nom, e.prenom
            FROM notes_devoirs n
            JOIN eleves e ON n.eleve_id = e.id
            WHERE n.devoir_id = ?
        ");
        $stmt->execute([$devoir_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM devoirs WHERE id = ?");
        $stmt->execute([$id]);
    }
}
