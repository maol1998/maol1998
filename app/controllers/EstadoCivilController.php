<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/EstadoCivil.php';

class EstadoCivilController {
    private $estadocivil;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->estadocivil = new EstadoCivil($this->db);
    }

    public function index() {
        $estadosciviles = $this->estadocivil->read();
        require_once '../app/views/estadocivil/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->estadocivil->nombre = $_POST['nombre'];
                if ($this->estadocivil->create()) {
                    // Creado exitosamente
                } else {
                    echo "Error al crear el estado civil";
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    public function edit($id) {
        $this->estadocivil->id = $id;
        $estadocivil = $this->estadocivil->readOne();

        if (!$estadocivil) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/estadocivil/edit.php';
    }

    public function eliminar($id) {
        $this->estadocivil->id = $id;
        $estadocivil = $this->estadocivil->readOne();

        if (!$estadocivil) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/estadocivil/delete.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && isset($_POST['id'])) {
                $this->estadocivil->nombre = $_POST['nombre'];
                $this->estadocivil->id = $_POST['id'];
                if ($this->estadocivil->update()) {
                    // Actualizado exitosamente
                } else {
                    echo "Error al actualizar el estado civil";
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
                $this->estadocivil->id = $_POST['id'];
                if ($this->estadocivil->delete()) {
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
