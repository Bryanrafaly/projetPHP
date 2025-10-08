<?php
class Diplome {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO diplomes (eleve_id, type, annee, fichier)
            VALUES (:eleve_id, :type, :annee, :fichier)
        ");
        $stmt->execute([
            ':eleve_id' => $data['eleve_id'],
            ':type' => $data['type'],
            ':annee' => $data['annee'],
            ':fichier' => $data['fichier'] ?? null
        ]);
    }

    public function getAll($filters = []) {
        $sql = "
            SELECT d.*, e.nom AS eleve_nom, e.prenom AS eleve_prenom
            FROM diplomes d
            JOIN eleves e ON d.eleve_id = e.id
            WHERE 1=1
        ";
        $params = [];

        if (!empty($filters['type'])) {
            $sql .= " AND d.type = :type";
            $params[':type'] = $filters['type'];
        }

        if (!empty($filters['annee'])) {
            $sql .= " AND d.annee = :annee";
            $params[':annee'] = $filters['annee'];
        }

        if (!empty($filters['q'])) {
            $sql .= " AND (LOWER(e.nom) LIKE :q OR LOWER(e.prenom) LIKE :q)";
            $params[':q'] = '%'.strtolower($filters['q']).'%';
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM diplomes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE diplomes SET eleve_id = :eleve_id, type = :type, annee = :annee, fichier = :fichier
            WHERE id = :id
        ");
        $stmt->execute([
            ':eleve_id' => $data['eleve_id'],
            ':type' => $data['type'],
            ':annee' => $data['annee'],
            ':fichier' => $data['fichier'] ?? null,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM diplomes WHERE id = ?");
        $stmt->execute([$id]);
    }
}
