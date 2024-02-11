<?php

require "../core/DataBaseSingleton.php";
require "../app/models/DTO/DeportistaDTO.php";

class DeportistaDAO
{

    private $db;

    public function __construct()
    {
        $this->db = DataBaseSingleton::getInstance();
    }

    public function obtenerDeportistas()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM deportista";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;
    }
    public function obtenerActividadesMismoDeportista($id)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM deportista JOIN actividades ON deportista.id = actividades.id_deportista WHERE actividades.id_deportista = $id";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $deportistasDTO = array();

        for ($i = 0; $i < count($result); $i++) {
            $fila = $result[$i];
            $deportistaDTO = new DeportistaDTO(

                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['edad'],
                $fila['id_actividad'],
                $fila['tipo'],
                $fila['fecha']
            );
            $deportistasDTO[] = $deportistaDTO;
        }

        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $deportistasDTO;
    }
    public function obtenerActividadesPorId($tipo, $id)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM $tipo JOIN deportista ON deportista.id = $id.id_deportista WHERE deportista.id = $id";;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $deportistasDTO = array();

        for ($i = 0; $i < count($result); $i++) {
            $fila = $result[$i];
            $deportistaDTO = new DeportistaDTO(

                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['edad'],
                $fila['id_actividad'],
                $fila['tipo'],
                $fila['fecha']
            );
            $deportistasDTO[] = $deportistaDTO;
        }
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $deportistasDTO;
    }

    public function crearDeportista($valores)
    {
        $connection = $this->db->getConnection();
        $query = "INSERT INTO deportista(id, nombre, apellidos, edad) VALUES('$valores[0]', $valores[1], $valores[2], $valores[3])";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;
    }
    public function modificarDeportista($id, $campo, $valor)
    {
        $connection = $this->db->getConnection();
        $query = "UPDATE deportista SET '$campo' = '$valor' WHERE id = '$id'";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;
    }
    public function eliminarDeportista($id)
    {
        $connection = $this->db->getConnection();
        $query = "DELETE FROM deportista WHERE id = $id";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;;
    }
}
