<?php
class Pregunta {
    private $id;
    private $examenId;
    private $pregunta;

    public function __construct($id, $examenId, $pregunta) {
        $this->id = $id;
        $this->examenId = $examenId;
        $this->pregunta = $pregunta;
    }

    public function getId() {
        return $this->id;
    }

    public function getExamenId() {
        return $this->examenId;
    }

    public function getPregunta() {
        return $this->pregunta;
    }
}
