<?php
class Eleve {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO eleves (nom, prenom, date_naissance, adresse, telephone, classe_id)
            VALUES (:nom, :prenom, :date_naissance, :adresse, :telephone, :classe_id)
        ");
        $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':date_naissance' => $data['date_naissance'],
            ':adresse' => $data['adresse'],
            ':telephone' => $data['telephone'],
            ':classe_id' => $data['classe_id']
        ]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM eleves");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM eleves WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByClasse($classe_id) {
        $stmt = $this->conn->prepare("SELECT * FROM eleves WHERE classe_id = ?");
        $stmt->execute([$classe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function update($id, $data) {
    $stmt = $this->conn->prepare("
        UPDATE eleves SET
            nom = :nom,
            prenom = :prenom,
            date_naissance = :date_naissance,
            adresse = :adresse,
            telephone = :telephone,
            classe_id = :classe_id
        WHERE id = :id
    ");
    $stmt->execute([
        ':nom' => $data['nom'],
        ':prenom' => $data['prenom'],
        ':date_naissance' => $data['date_naissance'],
        ':adresse' => $data['adresse'],
        ':telephone' => $data['telephone'],
        ':classe_id' => $data['classe_id'],
        ':id' => $id
    ]);
}

public function delete($id) {
    $stmt = $this->conn->prepare("DELETE FROM eleves WHERE id = ?");
    $stmt->execute([$id]);
}

public function searchInClasse($classe_id, $query) {
    $terms = explode(' ', trim($query));
    
    $sql = "SELECT * FROM eleves WHERE classe_id = :classe_id";
    $params = [':classe_id' => $classe_id];

    foreach ($terms as $i => $term) {
        $sql .= " AND (
            LOWER(nom) LIKE :q$i OR
            LOWER(prenom) LIKE :q$i OR
            LOWER(adresse) LIKE :q$i OR
            telephone LIKE :q$i
        )";
        $params[":q$i"] = '%' . strtolower($term) . '%';
    }

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
