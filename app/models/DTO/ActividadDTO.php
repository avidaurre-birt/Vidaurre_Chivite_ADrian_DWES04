<?php

class ActividadDTO implements JsonSerializable
{
    private $id;
    private $tipo;
    private $fecha;
    private $distancia_km;
    private $duracion_min;
    private $id_deportista;


    public function __construct($id, $tipo, $fecha, $distancia_km, $duracion_min, $id_deportista)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->distancia_km = $distancia_km;
        $this->duracion_min = $duracion_min;
        $this->id_deportista = $id_deportista;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of distancia
     */
    public function getDistanciaKm()
    {
        return $this->distancia_km;
    }

    /**
     * Get the value of duracion
     */
    public function getDuracionMin()
    {
        return $this->duracion_min;
    }
    /**
     * Get the value of id_deportista
     */
    public function getIdDeportista()
    {
        return $this->id_deportista;
    }
}
