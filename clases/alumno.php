<?php
class Alumno {
    private $id;
    private $nombreCompleto;
    private $rut;
    private $codigoCurso;
    private $fechaAlta;
    private $rol;

    public function __construct($id, $nombreCompleto, $rut, $codigoCurso, $fechaAlta) {
        $this->id = $id;
        $this->nombreCompleto = $nombreCompleto;
        $this->rut = $rut;
        $this->codigoCurso = $codigoCurso;
        $this->fechaAlta = $fechaAlta;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getCodigoCurso() {
        return $this->codigoCurso;
    }

    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    public function getRol() {
        return $this->rol;
    }
}
