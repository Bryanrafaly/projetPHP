<?php
require_once __DIR__ . "/../models/Diplome.php";
require_once __DIR__ . "/../models/Eleve.php";

class DiplomesController {
    private $diplomeModel;
    private $eleveModel;

    public function __construct() {
        global $conn;
        $this->diplomeModel = new Diplome($conn);
        $this->eleveModel = new Eleve($conn);
    }

    public function index() {
        $filters = [
            'type' => $_GET['type'] ?? '',
            'annee' => $_GET['annee'] ?? '',
            'q' => $_GET['q'] ?? ''
        ];

        $diplomes = $this->diplomeModel->getAll($filters);

        include __DIR__ . "/../views/diplomes/index.php";
    }

    public function add() {
        $eleves = $this->eleveModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['fichier']['name'] ?? null;
            if ($file) {
                move_uploaded_file($_FILES['fichier']['tmp_name'], "uploads/$file");
            }

            $data = $_POST;
            $data['fichier'] = $file;

            $this->diplomeModel->add($data);
            header("Location: index.php?module=diplomes");
            exit;
        }

        include __DIR__ . "/../views/diplomes/add.php";
    }

    public function edit() {
        $id = intval($_GET['id']);
        $diplome = $this->diplomeModel->getById($id);
        $eleves = $this->eleveModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['fichier']['name'] ?? $diplome['fichier'];
            if (!empty($_FILES['fichier']['tmp_name'])) {
                move_uploaded_file($_FILES['fichier']['tmp_name'], "uploads/$file");
            }

            $data = $_POST;
            $data['fichier'] = $file;

            $this->diplomeModel->update($id, $data);
            header("Location: index.php?module=diplomes");
            exit;
        }

        include __DIR__ . "/../views/diplomes/edit.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->diplomeModel->delete($id);
        header("Location: index.php?module=diplomes");
        exit;
    }
}
