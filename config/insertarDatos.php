<?php
require_once 'config/conexion.php';

class Data {
    private $con;

    public function __construct() {
        $database = new Conexion();
        $this->con = $database->getConnection();
    }

    public function insertIndividuo($id, $nombres, $apellidos, $edad, $sexo) {
        $sql = "insert into individuo values(?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$id, $nombres, $apellidos, $edad, $sexo]);
        return $stmt;
    }

    public function listarIndividuo() {
        $sql = "select * from individuo";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function insertProfesional($id, $nombres, $apellidos, $edad, $sexo, $profesion, $gradoAcademico) {
        $sql = "insert into profesional values(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$id, $nombres, $apellidos, $edad, $sexo, $profesion, $gradoAcademico]);
        return $stmt;
    }

    public function listarProfesional() {
        $sql = "select * from profesional";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    // Para INDIVIDUO
public function buscarIndividuo($id) {
    $sql = "select * from individuo where idIndividuo = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}

public function updateIndividuo($id, $nombres, $apellidos, $edad, $sexo) {
    $sql = "update individuo set nombreIndividuo=?, apellidoIndividuo=?, edadIndividuo=?, sexoIndividuo=? where idIndividuo=?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$nombres, $apellidos, $edad, $sexo, $id]);
    return $stmt;
}

public function deleteIndividuo($id) {
    $sql = "delete from individuo where idIndividuo=?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}

// Para PROFESIONAL
public function buscarProfesional($id) {
    $sql = "select * from profesional where idProfesional = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}

public function updateProfesional($id, $nombres, $apellidos, $edad, $sexo, $profesion, $gradoAcademico) {
    $sql = "update profesional set nombreProfesional=?, apellidoProfesional=?, edadProfesional=?, sexo=?, profesion=?, gradoAcademico=? where idProfesional=?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$nombres, $apellidos, $edad, $sexo, $profesion, $gradoAcademico, $id]);
    return $stmt;
}

public function deleteProfesional($id) {
    $sql = "delete from profesional where idProfesional=?";
    $stmt = $this->con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt;
}
}