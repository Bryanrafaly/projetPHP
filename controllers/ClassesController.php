<?php
require_once __DIR__ . "/../models/Classe.php";
require_once __DIR__ . "/../models/Eleve.php";

class ClassesController{
    private $classeModel;
    private $eleveModel;

    public function __construct() {
        global $conn;
        $this->classeModel = new Classe($conn);
        $this->eleveModel = new Eleve($conn);
    }

    public function index() {
        $classes = $this->classeModel->getAll();
        $selectedClasse = null;
        $eleves = [];

        if (!empty($_GET['classe_id'])) {
            $classe_id = intval($_GET['classe_id']);
            $selectedClasse = $this->classeModel->getById($classe_id);

            $q = $_GET['q'] ?? '';
            if (!empty($q)) {
                $eleves = $this->eleveModel->searchInClasse($classe_id, $q);
            } else {
                $eleves = $this->eleveModel->getByClasse($classe_id);
            }
        }

        include __DIR__ . "/../views/classes/index.php";
    }

    public function addEleve() {
        $classes = $this->classeModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'date_naissance' => $_POST['date_naissance'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'classe_id' => $_POST['classe_id']
            ];

            $this->eleveModel->add($data);

            header("Location: index.php?module=classes&classe_id=" . $_POST['classe_id']);
            exit;
        }

        include __DIR__ . "/../views/classes/addEleve.php";
    }

    public function editEleve() {
        $classes = $this->classeModel->getAll();
        $id = intval($_GET['id']);
        $eleve = $this->eleveModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->eleveModel->update($id, [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'date_naissance' => $_POST['date_naissance'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'classe_id' => $_POST['classe_id']
            ]);

            header("Location: index.php?module=classes&classe_id=" . $_POST['classe_id']);
            exit;
        }

        include __DIR__ . "/../views/classes/editEleve.php";
    }

    public function deleteEleve() {
        $id = intval($_GET['id']);
        $classe_id = intval($_GET['classe_id'] ?? 0);

        $this->eleveModel->delete($id);

        header("Location: index.php?module=classes&classe_id=$classe_id");
        exit;
    }
}
