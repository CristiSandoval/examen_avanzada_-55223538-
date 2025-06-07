<?php
class Empleado {
    private $conn;
    private $table = "empleados";

    public $id;
    public $nombre;
    public $salario_base;
    public $comision_pct;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function registrar() {
        $query = "INSERT INTO " . $this->table . " (nombre, salario_base, comision_pct) VALUES (:nombre, :salario_base, :comision_pct)";
        $stmt = $this->conn->prepare($query);

        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->salario_base = htmlspecialchars(strip_tags($this->salario_base));
        $this->comision_pct = htmlspecialchars(strip_tags($this->comision_pct));

        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':salario_base', $this->salario_base);
        $stmt->bindParam(':comision_pct', $this->comision_pct);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}