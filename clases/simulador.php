<?php
class Simulador {
    private $id;
    private $nombreSimulador;
    private $detalle;
    private $color;

    public function __construct($id, $nombreSimulador, $detalle, $color) {
        $this->id = $id;
        $this->nombreSimulador = $nombreSimulador;
        $this->detalle = $detalle;
        $this->color = $color;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombreSimulador() {
        return $this->nombreSimulador;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function getColor() {
        return $this->color;
    }
}
