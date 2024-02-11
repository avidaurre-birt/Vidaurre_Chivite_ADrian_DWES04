<?php

class DeportistaDTO implements JsonSerializable
{
    private $id;
    private $nombre;
    private $apellidos;
    private $edad;
    private $id_actividad;
    private $tipo;
    private $fecha;


    public function __construct($id, $nombre, $apellidos, $edad, $id_actividad, $tipo, $fecha)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->id_actividad = $id_actividad;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }


    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Get the value of id_actividad
     */
    public function getIdActividad()
    {
        return $this->id_actividad;
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
}
