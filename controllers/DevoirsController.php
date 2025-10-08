<?php
require_once __DIR__ . "/../models/Devoir.php";
require_once __DIR__ . "/../models/Classe.php";
require_once __DIR__ . "/../models/Eleve.php";

class DevoirsController {
    private $devoirModel;
    private $classeModel;
    private $eleveModel;

    public function __construct() {
        global $conn;
        $this->devoirModel = new Devoir($conn);
        $this->classeModel = new Classe($conn);
        $this->eleveModel = new Eleve($conn);
    }

    public function index() {
        $devoirs = $this->devoirModel->getAll();
        include __DIR__ . "/../views/devoirs/index.php";
    }

    public function add() {
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $devoir_id = $this->devoirModel->add($_POST);

            foreach($_POST['notes'] as $eleve_id => $note) {
                $this->devoirModel->addNote([
                    ':devoir_id' => $devoir_id,
                    ':eleve_id' => $eleve_id,
                    ':note' => $note
                ]);
            }

            header("Location: index.php?module=devoirs");
            exit;
        }

        include __DIR__ . "/../views/devoirs/add.php";
    }

    public function delete() {
        $id = intval($_GET['id']);
        $this->devoirModel->delete($id);
        header("Location: index.php?module=devoirs");
        exit;
    }
}
