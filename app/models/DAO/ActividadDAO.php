<?php

require "../core/DataBaseSingleton.php";
require "../app/models/DTO/ActividadDTO.php";

class ActividadDAO
{

    private $db;

    public function __construct()
    {
        $this->db = DataBaseSingleton::getInstance();
    }

    public function obtenerActividades()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM actividades";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;
    }
    public function obtenerActividadesMismoTipo($tipo)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM $tipo";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $actividadesDTO = array();

        for ($i = 0; $i < count($result); $i++) {
            $fila = $result[$i];
            $actividadDTO = new ActividadDTO(

                $fila['id'],
                $fila['tipo'],
                $fila['fecha'],
                $fila['distancia_km'],
                $fila['duracion_min'],
                $fila['id_deportista'],
            );
            $actividadesDTO[] = $actividadDTO;
        }

        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $actividadesDTO;
    }
    public function obtenerActividadesPorId($tipo, $id)
    {

        $connection = $this->db->getConnection();
        $query = "SELECT * FROM $tipo WHERE id = $id";;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $actividadesDTO = array();

        for ($i = 0; $i < count($result); $i++) {
            $fila = $result[$i];
            $actividadDTO = new ActividadDTO(

                $fila['id'],
                $fila['tipo'],
                $fila['fecha'],
                $fila['distancia_km'],
                $fila['duracion_min'],
                $fila['id_deportista'],
            );
            $actividadesDTO[] = $actividadDTO;
        }

        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $actividadesDTO;
    }

    public function crearActividad($id, $valores)
    {
        $connection = $this->db->getConnection();
        $query = "INSERT INTO actividades(id, tipo, fecha) VALUES($id, '$valores[0]', '$valores[1]')";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // if (!$result) {
        //     echo 'Hubo un error en la conexión con la base de datos.';
        //     exit;
        // }
        return; // $result;
    }
    public function modificarActividad($id, $valor)
    {
        $connection = $this->db->getConnection();
        $query = "UPDATE actividades SET tipo = '$valor[0]', fecha = '$valor[1]', id_deportista = $valor[2] WHERE id = '$id'";

        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;
    }
    public function eliminarActividad($id)
    {
        $connection = $this->db->getConnection();
        $query = "DELETE FROM actividades WHERE id = $id";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            echo 'Hubo un error en la conexión con la base de datos.';
            exit;
        }
        return $result;;
    }
}
