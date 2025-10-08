<?php
class Enseignant {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO enseignants (nom, prenom, email, telephone, matiere)
            VALUES (:nom, :prenom, :email, :telephone, :matiere)
        ");
        $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':email' => $data['email'],
            ':telephone' => $data['telephone'],
            ':matiere' => $data['matiere']
        ]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM enseignants");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM enseignants WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE enseignants SET
                nom = :nom,
                prenom = :prenom,
                email = :email,
                telephone = :telephone,
                matiere = :matiere
            WHERE id = :id
        ");
        $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':email' => $data['email'],
            ':telephone' => $data['telephone'],
            ':matiere' => $data['matiere'],
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM enseignants WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function search($query) {
        $terms = explode(' ', trim($query));
        $sql = "SELECT * FROM enseignants WHERE 1=1";
        $params = [];

        foreach ($terms as $i => $term) {
            $sql .= " AND (LOWER(nom) LIKE :q$i OR LOWER(prenom) LIKE :q$i OR LOWER(email) LIKE :q$i OR telephone LIKE :q$i OR LOWER(matiere) LIKE :q$i)";
            $params[":q$i"] = '%' . strtolower($term) . '%';
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
