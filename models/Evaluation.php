<?php
class Evaluation {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO evaluations (eleve_id, matiere, note, date_eval)
            VALUES (:eleve_id, :matiere, :note, :date_eval)
        ");
        $stmt->execute([
            ':eleve_id' => $data['eleve_id'],
            ':matiere' => $data['matiere'],
            ':note' => $data['note'],
            ':date_eval' => $data['date_eval']
        ]);
    }

    public function getAll($filters = []) {
        $sql = "
            SELECT e.*, el.nom AS eleve_nom, el.prenom AS eleve_prenom
            FROM evaluations e
            JOIN eleves el ON e.eleve_id = el.id
            WHERE 1=1
        ";
        $params = [];

        if (!empty($filters['classe_id'])) {
            $sql .= " AND el.classe_id = :classe_id";
            $params[':classe_id'] = $filters['classe_id'];
        }

        if (!empty($filters['matiere'])) {
            $sql .= " AND e.matiere = :matiere";
            $params[':matiere'] = $filters['matiere'];
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM evaluations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE evaluations SET eleve_id = :eleve_id, matiere = :matiere, note = :note, date_eval = :date_eval
            WHERE id = :id
        ");
        $stmt->execute([
            ':eleve_id' => $data['eleve_id'],
            ':matiere' => $data['matiere'],
            ':note' => $data['note'],
            ':date_eval' => $data['date_eval'],
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM evaluations WHERE id = ?");
        $stmt->execute([$id]);
    }
}
