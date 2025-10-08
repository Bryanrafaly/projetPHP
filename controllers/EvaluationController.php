<?php
require_once __DIR__ . "/../models/Evaluation.php";
require_once __DIR__ . "/../models/Eleve.php";
require_once __DIR__ . "/../models/Classe.php";

class EvaluationController {
    private $evaluationModel;
    private $eleveModel;
    private $classeModel;

    public function __construct() {
        global $conn;
        $this->evaluationModel = new Evaluation($conn);
        $this->eleveModel = new Eleve($conn);
        $this->classeModel = new Classe($conn);
    }

    public function index() {
        $filters = [
            'classe_id' => $_GET['classe_id'] ?? '',
            'matiere' => $_GET['matiere'] ?? ''
        ];
        $evaluations = $this->evaluationModel->getAll($filters);
        $classes = $this->classeModel->getAll();

        include __DIR__ . "/../views/evaluations/index.php";
    }

    public function add() {
        $eleves = $this->eleveModel->getAll();
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->evaluationModel->add($data);
            header("Location: index.php?module=evaluation");
            exit;
        }

        include __DIR__ . "/../views/evaluations/add.php";
    }

    public function edit() {
        $id = intval($_GET['id']);
        $evaluation = $this->evaluationModel->getById($id);
        $eleves = $this->eleveModel->getAll();
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->evaluationModel->update($id, $data);
            header("Location: index.php?module=evaluation");
            exit;
        }

        include __DIR__ . "/../views/evaluations/edit.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->evaluationModel->delete($id);
        header("Location: index.php?module=evaluation");
        exit;
    }
}
