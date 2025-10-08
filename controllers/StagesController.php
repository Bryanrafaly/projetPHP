<?php
require_once __DIR__ . "/../models/Stage.php";
require_once __DIR__ . "/../models/Eleve.php";

class StagesController {
    private $stageModel;
    private $eleveModel;

    public function __construct() {
        global $conn;
        $this->stageModel = new Stage($conn);
        $this->eleveModel = new Eleve($conn);
    }

    public function index() {
        $q = $_GET['q'] ?? '';
        if (!empty($q)) {
            $stages = $this->stageModel->search($q);
        } else {
            $stages = $this->stageModel->getAll();
        }

        include __DIR__ . "/../views/stages/index.php";
    }

    public function add() {
        $eleves = $this->eleveModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->stageModel->add($_POST);
            header("Location: index.php?module=stages");
            exit;
        }

        include __DIR__ . "/../views/stages/add.php";
    }

    public function edit() {
        $id = intval($_GET['id']);
        $stage = $this->stageModel->getById($id);
        $eleves = $this->eleveModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->stageModel->update($id, $_POST);
            header("Location: index.php?module=stages");
            exit;
        }

        include __DIR__ . "/../views/stages/edit.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->stageModel->delete($id);
        header("Location: index.php?module=stages");
        exit;
    }
}
