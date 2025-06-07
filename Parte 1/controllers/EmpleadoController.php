<?php
require_once __DIR__ . '/../models/Empleado.php';
require_once __DIR__ . '/../config/Database.php';

class EmpleadoController {
    private $db;
    private $empleado;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->empleado = new Empleado($this->db);
    }

    public function listar() {
        $stmt = $this->empleado->listar();
        $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/empleados_list.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->empleado->nombre = $_POST['nombre'] ?? '';
            $this->empleado->salario_base = $_POST['salario_base'] ?? 0;
            $this->empleado->comision_pct = $_POST['comision_pct'] ?? 0;

            if ($this->empleado->registrar()) {
                header('Location: index.php?action=listar');
                exit();
            } else {
                $error = "Error al registrar empleado.";
            }
        }
        require_once __DIR__ . '/../views/empleado_form.php';
    }
}