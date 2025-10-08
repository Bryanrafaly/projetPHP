<?php
class Stage {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO stages (titre, entreprise, description, date_debut, date_fin, eleve_id)
            VALUES (:titre, :entreprise, :description, :date_debut, :date_fin, :eleve_id)
        ");
        $stmt->execute([
            ':titre' => $data['titre'],
            ':entreprise' => $data['entreprise'],
            ':description' => $data['description'],
            ':date_debut' => $data['date_debut'],
            ':date_fin' => $data['date_fin'],
            ':eleve_id' => $data['eleve_id'] ?: null
        ]);
    }

    public function getAll() {
        $stmt = $this->conn->query("
            SELECT s.*, e.nom AS eleve_nom, e.prenom AS eleve_prenom
            FROM stages s
            LEFT JOIN eleves e ON s.eleve_id = e.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM stages WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE stages SET
                titre = :titre,
                entreprise = :entreprise,
                description = :description,
                date_debut = :date_debut,
                date_fin = :date_fin,
                eleve_id = :eleve_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':titre' => $data['titre'],
            ':entreprise' => $data['entreprise'],
            ':description' => $data['description'],
            ':date_debut' => $data['date_debut'],
            ':date_fin' => $data['date_fin'],
            ':eleve_id' => $data['eleve_id'] ?: null,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM stages WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function search($query) {
        $terms = explode(' ', trim($query));
        $sql = "
            SELECT s.*, e.nom AS eleve_nom, e.prenom AS eleve_prenom
            FROM stages s
            LEFT JOIN eleves e ON s.eleve_id = e.id
            WHERE 1=1
        ";
        $params = [];

        foreach ($terms as $i => $term) {
            $sql .= " AND (
                LOWER(s.titre) LIKE :q$i OR
                LOWER(s.entreprise) LIKE :q$i OR
                LOWER(s.description) LIKE :q$i OR
                LOWER(e.nom) LIKE :q$i OR
                LOWER(e.prenom) LIKE :q$i
            )";
            $params[":q$i"] = '%' . strtolower($term) . '%';
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
