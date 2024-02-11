<?php
require '../app/models/DAO/ActividadDAO.php';

$actividadDAO = new ActividadDAO();
$tipo = $_GET['tipo'];
$id = $_GET['id'];

if ($tipo == "Caminar") {
    $tipo = "caminata";
}

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
                <h2>Te mostramos la actividad con ID: <?php echo $id ?></h2>
            </section>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TIPO</th>
                    <th>FECHA</th>
                    <th>DISTANCIA</th>
                    <th>DURACION</th>
                    <th>DEPORISTA</th>
                </tr>
                <?php

                $actividades = $actividadDAO->obtenerActividadesPorId($tipo, $id);
                foreach ($actividades as $actividad) {
                ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" methog="GET">
                        <tr>
                            <td> <?php echo $actividad->getId(); ?> </td>
                            <td> <?php echo $actividad->getTipo(); ?> </td>
                            <td> <?php echo $actividad->getFecha(); ?> </td>
                            <td> <?php echo $actividad->getDistanciaKm(); ?> Km </td>
                            <td> <?php echo $actividad->getDuracionMin(); ?> min </td>
                            <td> <?php echo $actividad->getIdDeportista(); ?></td>
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

<?php
