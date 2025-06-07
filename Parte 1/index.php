<?php
require_once 'controllers/EmpleadoController.php';

$controller = new EmpleadoController();

$action = $_GET['action'] ?? 'listar';

switch($action) {
    case 'listar':
        $controller->listar();
        break;
    case 'registrar':
        $controller->registrar();
        break;
    default:
        echo "Página no encontrada.";
        break;
}