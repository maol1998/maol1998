<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/Persona.php';

class PersonaController {
    private $persona;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->persona = new Persona($this->db);
    }

    public function index() {
        $personas = $this->persona->read();
        require_once '../app/views/persona/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->persona->nombre = $_POST['nombre'];
                if ($this->persona->create()) {
                    // Creado exitosamente
                } else {
                    echo "Error al crear la persona";
                }
            } else {
                echo "Faltan datos";
            }
        }
        die();
    }

    public function edit($id) {
        $this->persona->id = $id;
        $persona = $this->persona->readOne();

        if (!$persona) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/persona/edit.php';
    }

    public function eliminar($id) {
        $this->persona->id = $id;
        $persona = $this->persona->readOne();

        if (!$persona) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/persona/delete.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && isset($_POST['id'])) {
                $this->persona->nombre = $_POST['nombre'];
                $this->persona->id = $_POST['id'];
                if ($this->persona->update()) {
                    // Actualizado exitosamente
                } else {
                    echo "Error al actualizar la persona";
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
                $this->persona->id = $_POST['id'];
                if ($this->persona->delete()) {
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
