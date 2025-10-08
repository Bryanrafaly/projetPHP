<?php
require_once __DIR__ . "/../models/Conseil.php";
require_once __DIR__ . "/../models/Classe.php";

class ConseilController {
    private $conseilModel;
    private $classeModel;

    public function __construct() {
        global $conn;
        $this->conseilModel = new Conseil($conn);
        $this->classeModel = new Classe($conn);
    }

    public function index() {
        $q = $_GET['q'] ?? '';
        if (!empty($q)) {
            $conseils = $this->conseilModel->search($q);
        } else {
            $conseils = $this->conseilModel->getAll();
        }

        include __DIR__ . "/../views/conseil/index.php";
    }

    public function add() {
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->conseilModel->add($_POST);
            header("Location: index.php?module=conseil");
            exit;
        }

        include __DIR__ . "/../views/conseil/add.php";
    }

    public function edit() {
        $id = intval($_GET['id']);
        $conseil = $this->conseilModel->getById($id);
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->conseilModel->update($id, $_POST);
            header("Location: index.php?module=conseil");
            exit;
        }

        include __DIR__ . "/../views/conseil/edit.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->conseilModel->delete($id);
        header("Location: index.php?module=conseil");
        exit;
    }
}
