<?php

class CarreraEntity
{
    private $id;
    private $tipo;
    private $fecha;
    private $distancia_km;
    private $duracion_min;

    public function __construct($id, $tipo, $fecha, $distancia_km, $duracion_min)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->distancia_km = $distancia_km;
        $this->duracion_min = $duracion_min;
    }
}
