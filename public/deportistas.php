<?php
require '../app/models/DAO/DeportistaDAO.php';

$deportistaDAO = new DeportistaDAO();
$Nombre = $_GET['tipo'];

?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../app/views/estilo.css" />
</head>

<body>
    <main>
        <section>
            <section>
                <h2>Te mostramos todos los deportistas</h2>
            </section>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>EDAD</th>
                    <th>ID ACTIVIDAD</th>
                </tr>
                <?php

                $actividades = $actividadDAO->obtenerActividadesMismoNombre($Nombre);
                foreach ($actividades as $actividad) {
                ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" methog="GET">
                        <tr>
                            <td> <?php echo $actividad->getId(); ?> </td>
                            <td> <?php echo $actividad->getNombre(); ?> </td>
                            <td> <?php echo $actividad->getApellido(); ?> </td>
                            <td> <?php echo $actividad->getEdad(); ?> Km </td>
                            <td> <?php echo $actividad->getIdActividad(); ?> min </td>
                            <td> <button type="submit" name="modificar" value=<?php echo  $actividad->getId();; ?>>Modificar</button> </td>
                            <td> <button type="submit" name="eliminar" value=<?php echo  $actividad->getId();; ?>>Eliminar</button> </td>
                        </tr>
                    </form>


                <?php
                }
                ?>
            </table>
        </section>
    </main>
</body>

</html>