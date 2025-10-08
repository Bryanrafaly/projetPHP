<?php
class Conseil {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO conseils (titre, date_conseil, description, classe_id)
            VALUES (:titre, :date_conseil, :description, :classe_id)
        ");
        $stmt->execute([
            ':titre' => $data['titre'],
            ':date_conseil' => $data['date_conseil'],
            ':description' => $data['description'],
            ':classe_id' => $data['classe_id'] ?: null
        ]);
    }

    public function getAll() {
        $stmt = $this->conn->query("
            SELECT c.*, cl.nom AS classe_nom
            FROM conseils c
            LEFT JOIN classes cl ON c.classe_id = cl.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM conseils WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE conseils SET
                titre = :titre,
                date_conseil = :date_conseil,
                description = :description,
                classe_id = :classe_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':titre' => $data['titre'],
            ':date_conseil' => $data['date_conseil'],
            ':description' => $data['description'],
            ':classe_id' => $data['classe_id'] ?: null,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM conseils WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function search($query) {
        $terms = explode(' ', trim($query));
        $sql = "
            SELECT c.*, cl.nom AS classe_nom
            FROM conseils c
            LEFT JOIN classes cl ON c.classe_id = cl.id
            WHERE 1=1
        ";
        $params = [];

        foreach ($terms as $i => $term) {
            $sql .= " AND (
                LOWER(c.titre) LIKE :q$i OR
                LOWER(c.description) LIKE :q$i OR
                LOWER(cl.nom) LIKE :q$i
            )";
            $params[":q$i"] = '%' . strtolower($term) . '%';
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
