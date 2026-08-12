<?php

class Profesional extends Individuo {
   
    // Atributos originales
    private $profesion;
    private $gradoAcademico;
    
    // Nuevos atributos agregados según el requerimiento
    private $idProfesional;
    private $sueldo;
    private $activo;

    public function __construct() {
        // Llama al constructor de Individuo si es necesario
        parent::__construct(); 
    }

    // --- MÉTODOS GETTER ---

    public function getProfesion() {
        return $this->profesion;
    }

    public function getGradoAcademico() {
        return $this->gradoAcademico;
    }

    public function getIdProfesional() {
        return $this->idProfesional;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function getActivo() {
        return $this->activo;
    }

    // --- MÉTODOS SETTER ---

    public function setProfesion($profesion): void {
        $this->profesion = $profesion;
    }

    public function setGradoAcademico($gradoAcademico): void {
        $this->gradoAcademico = $gradoAcademico;
    }

    public function setIdProfesional($idProfesional): void {
        $this->idProfesional = $idProfesional;
    }

    public function setSueldo($sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function setActivo($activo): void {
        $this->activo = $activo;
    }

    public function mostrarDatos() {
        return "ID Individuo: " . $this->getId() . "<br>" . 
               "Nombres: " . $this->getNombres() . "<br>" . 
               "Apellidos: " . $this->getApellidos() . "<br>" . 
               "Edad: " . $this->getEdad() . "<br>" . 
               "Sexo: " . $this->getSexo() . "<br>" . 
               "ID Profesional: " . $this->idProfesional . "<br>" .
               "Profesion: " . $this->profesion . "<br>" . 
               "Grado Academico: " . $this->gradoAcademico . "<br>" .
               "Sueldo: " . $this->sueldo . "<br>" .
               "Estado Activo: " . ($this->activo ? 'Sí' : 'No');
    }
}