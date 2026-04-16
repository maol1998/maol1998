<?php
session_start();

require_once '../app/controllers/SexoController.php';
require_once '../app/controllers/PersonaController.php';
require_once '../app/controllers/DireccionController.php';
require_once '../app/controllers/TelefonoController.php';
require_once '../app/controllers/EstadoCivilController.php';

$requestUri = $_SERVER["REQUEST_URI"];
$basePath = '/eysphp/public/';
// Remover el prefijo basePath
$route = str_replace($basePath, '', $requestUri);
$route = strtok($route, '?'); // Quitar parámetros GET

switch ($route) {
    // --- Módulo Sexo ---
    case '':
    case 'sexo':
    case 'sexo/index':
        $controller = new SexoController();
        $controller->index();
        break;
    case 'sexo/edit':
        $controller = new SexoController();
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'sexo/eliminar':
        $controller = new SexoController();
        if (isset($_GET['id'])) {
            $controller->eliminar($_GET['id']);
        } else {
            echo "Error: Falta el ID para eliminar.";
        }
        break;
    case 'sexo/delete':
        $controller = new SexoController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->delete();
        }
        break;
    case 'sexo/update':
        $controller = new SexoController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        }
        break;

    // --- Módulo Persona ---
    case 'persona':
    case 'persona/index':
        $controller = new PersonaController();
        $controller->index();
        break;
    case 'persona/edit':
        $controller = new PersonaController();
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'persona/eliminar':
        $controller = new PersonaController();
        if (isset($_GET['id'])) {
            $controller->eliminar($_GET['id']);
        } else {
            echo "Error: Falta el ID para eliminar.";
        }
        break;
    case 'persona/delete':
        $controller = new PersonaController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->delete();
        }
        break;
    case 'persona/update':
        $controller = new PersonaController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        }
        break;

    // --- Módulo Dirección ---
    case 'direccion':
    case 'direccion/index':
        $controller = new DireccionController();
        $controller->index();
        break;
    case 'direccion/edit':
        $controller = new DireccionController();
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'direccion/eliminar':
        $controller = new DireccionController();
        if (isset($_GET['id'])) {
            $controller->eliminar($_GET['id']);
        } else {
            echo "Error: Falta el ID para eliminar.";
        }
        break;
    case 'direccion/delete':
        $controller = new DireccionController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->delete();
        }
        break;
    case 'direccion/update':
        $controller = new DireccionController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        }
        break;

    // --- Módulo Teléfono ---
    case 'telefono':
    case 'telefono/index':
        $controller = new TelefonoController();
        $controller->index();
        break;
    case 'telefono/edit':
        $controller = new TelefonoController();
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'telefono/eliminar':
        $controller = new TelefonoController();
        if (isset($_GET['id'])) {
            $controller->eliminar($_GET['id']);
        } else {
            echo "Error: Falta el ID para eliminar.";
        }
        break;
    case 'telefono/delete':
        $controller = new TelefonoController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->delete();
        }
        break;
    case 'telefono/update':
        $controller = new TelefonoController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        }
        break;

    // --- Módulo Estado Civil ---
    case 'estadocivil':
    case 'estadocivil/index':
        $controller = new EstadoCivilController();
        $controller->index();
        break;
    case 'estadocivil/edit':
        $controller = new EstadoCivilController();
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'estadocivil/eliminar':
        $controller = new EstadoCivilController();
        if (isset($_GET['id'])) {
            $controller->eliminar($_GET['id']);
        } else {
            echo "Error: Falta el ID para eliminar.";
        }
        break;
    case 'estadocivil/delete':
        $controller = new EstadoCivilController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->delete();
        }
        break;
    case 'estadocivil/update':
        $controller = new EstadoCivilController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        }
        break;

    default:
        echo "Error 404: Página no encontrada.";
        break;
}
