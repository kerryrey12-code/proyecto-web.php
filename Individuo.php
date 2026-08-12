<?php

class Individuo {
    
    private $id;
    private $nombres;
    private $apellidos;
    private $edad;
    private $sexo;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres): void {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad): void {
        $this->edad = $edad;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }

    public function __toString() {
        return "ID: " . $this->id . "<br>" . 
               "Nombres: " . $this->nombres . "<br>" . 
               "Apellidos: " . $this->apellidos . "<br>" . 
               "Edad: " . $this->edad . "<br>" . 
               "Sexo: " . $this->sexo;
    }
}