<?php
require_once __DIR__ . "/../models/Enseignant.php";

class EnseignantsController {
    private $enseignantModel;

    public function __construct() {
        global $conn;
        $this->enseignantModel = new Enseignant($conn);
    }

    public function index() {
        $q = $_GET['q'] ?? '';
        if (!empty($q)) {
            $enseignants = $this->enseignantModel->search($q);
        } else {
            $enseignants = $this->enseignantModel->getAll();
        }

        include __DIR__ . "/../views/enseignants/index.php";
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->enseignantModel->add($_POST);
            header("Location: index.php?module=enseignants");
            exit;
        }
        include __DIR__ . "/../views/enseignants/add.php";
    }

    public function edit() {
        $id = intval($_GET['id']);
        $enseignant = $this->enseignantModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->enseignantModel->update($id, $_POST);
            header("Location: index.php?module=enseignants");
            exit;
        }

        include __DIR__ . "/../views/enseignants/edit.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->enseignantModel->delete($id);
        header("Location: index.php?module=enseignants");
        exit;
    }
}
