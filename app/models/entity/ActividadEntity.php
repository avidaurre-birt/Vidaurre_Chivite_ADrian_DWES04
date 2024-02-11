<?php

class ActividadEntity
{
    private $id;
    private $tipo;
    private $fecha;


    public function __construct($id, $tipo, $fecha)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
    }
}
