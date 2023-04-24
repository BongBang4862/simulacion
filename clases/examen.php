<?php
class Examen {
    private $id;
    private $titulo;

    public function __construct($id, $titulo) {
        $this->id = $id;
        $this->titulo = $titulo;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
}
