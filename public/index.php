<?php

require '../core/Router.php';
require '../app/controllers/Actividad.php';
require '../app/controllers/codigos.php';
require '../app/models/DAO/ActividadDAO.php';


$actividadDAO = new ActividadDAO();

?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../app/views/estilo.css" />
</head>

<body>
    <main>
        <section class="cont">
            <h1>Registro de actividades</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>TIPO</th>
                    <th>FECHA</th>
                    <th>DEPORTISTA</th>
                    <th>INFO</th>
                    <th>ELIMINAR</th>
                </tr>
                <?php
                $actividades = $actividadDAO->obtenerActividades();
                foreach ($actividades as $actividad) {
                ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" methog="GET">
                        <tr>
                            <td> <?php echo $actividad['id']; ?> </td>
                            <td> <?php echo $actividad['tipo']; ?> </td>
                            <td> <?php echo $actividad['fecha']; ?> </td>
                            <td> <?php echo $actividad['id_deportista']; ?> </td>
                            <td><a href="actividad.php?id=<?php echo $actividad['id']; ?>&tipo=<?php echo $actividad['tipo']; ?>">Detalles</a>
                            </td>

                            <td> <button type="submit" name="eliminar" value=<?php echo  $actividad['id']; ?>>Eliminar</button> </td>
                        </tr>
                    </form>


                    }
                <?php
                }
                ?>
            </table>
        </section>
        <section>
            <section class="form">
                <h3>Busqueda por tipo de Actividad</h3>
                <form action="actividades.php" method="GET">
                    <button type="submit" name="tipo" value="carrera">Carreras</button>
                </form>
                <form action="actividades.php" method="GET">
                    <button type="submit" name="tipo" value="caminata">Caminatas</button>
                </form>
            </section>
            <!-- <section class="cont">
                <h3>Busqueda por Deportista</h3>
                <form action="actividades.php" method="GET">
                    <button type="submit" name="tipo" value="carrera">Carreras</button>
                </form>
                <form action="actividades.php" method="GET">
                    <button type="submit" name="tipo" value="caminata">Caminatas</button>
                </form>
            </section> -->
            <section class="form">
                <h2>CREA O MODIFICA UNA ACTIVIDAD</h2>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="GET">


                    <label for="ID">ID</label>
                    <input type="text" name="id"><br>
                    <label for="Tipo">Tipo</label>
                    <input type="text" name="tipo"><br>
                    <label for="Fecha">Fecha</label>
                    <input type="text" name="fecha"><br>

                    <label for="IdDeportista">IdDeportista</label>
                    <input type="text" name="deportista">

                    <br><br>
                    <button type="submit" name="crear">Crear</button>
                    <button type="submit" name="modificar">Modificar</button>
                </form>
            </section>

        </section>
    </main>
</body>

</html>

<?php

if (isset($_GET['eliminar'])) {
    $actividadDAO->eliminarActividad($_GET['eliminar']);
}

if (isset($_GET['modificar'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];
    $fecha = $_GET['fecha'];
    $deportista = $_GET['deportista'];
    $valores = array($tipo, $fecha, $deportista);
    $actividadDAO->modificarActividad($id, $valores);
}
if (isset($_GET['crear'])) {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];
    $fecha = $_GET['fecha'];
    $deportista = $_GET['deportista'];
    $valores = array($tipo, $fecha, $deportista);
    $actividadDAO->crearActividad($id, $valores);
}
