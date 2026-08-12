<?php

class Conexion {

    private $con;
    private $db = "mysql:host=localhost;dbname=registro_db";
    private $user = "root";
    private $password = "";

    public function __construct() {
        
    }

    public function getConnection() {
        try {
            // Crear una instancia de PDO
            $this->con = new PDO($this->db, $this->user, $this->password);
            $this->con->exec("set names utf8");

            // Establecer el modo de errores a excepciones
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "Error de conexion " . $e->getMessage();
        }

        return $this->con;
    }
}