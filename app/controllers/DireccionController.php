<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/Direccion.php';

class DireccionController {
    private $direccion;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->direccion = new Direccion($this->db);
    }

    public function index() {
        $direcciones = $this->direccion->read();
        require_once '../app/views/direccion/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->direccion->nombre = $_POST['nombre'];
                if ($this->direccion->create()) {
                    // Creado exitosamente
                } else {
                    echo "Error al crear la dirección";
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    public function edit($id) {
        $this->direccion->id = $id;
        $direccion = $this->direccion->readOne();

        if (!$direccion) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/direccion/edit.php';
    }

    public function eliminar($id) {
        $this->direccion->id = $id;
        $direccion = $this->direccion->readOne();

        if (!$direccion) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/direccion/delete.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && isset($_POST['id'])) {
                $this->direccion->nombre = $_POST['nombre'];
                $this->direccion->id = $_POST['id'];
                if ($this->direccion->update()) {
                    // Actualizado exitosamente
                } else {
                    echo "Error al actualizar la dirección";
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $this->direccion->id = $_POST['id'];
                if ($this->direccion->delete()) {
                    header('Location: index.php?msg=deleted');
                    exit;
                } else {
                    header('Location: index.php?msg=error');
                    exit;
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }
}
?>
