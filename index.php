<?php
require_once 'config/db.php';

$module = $_GET['module'] ?? 'classes';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($module) . "Controller";
$controllerFile = "controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Action '$action' non trouvée.";
    }
} else {
    echo "Module '$module' non trouvé.";
}
