<?php
require "conexion.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <?php

    session_start();
    if (isset($_SESSION['curso_correcto'])) {
        echo '<p>' . $_SESSION['curso_correcto'] . '</p>';
        unset($_SESSION['curso_correcto']);
    }

    if (isset($_SESSION['cursos_borrados'])) {
        echo '<p>' . $_SESSION['cursos_borrados'] . '</p>';
        unset($_SESSION['cursos_borrados']);
    }

    if (isset($_SESSION['cursos_no_borrados'])) {
        echo '<p>' . $_SESSION['cursos_no_borrados'] . '</p>';
        unset($_SESSION['cursos_no_borrados']);
    }

    if (isset($_SESSION['alumno_correcto'])) {
        echo $_SESSION['alumno_correcto'];
        unset($_SESSION['alumno_correcto']);
    }


    $sql = "select * from cursos";

    $resultados = mysqli_query($conexion, $sql);

    $num_filas = mysqli_num_rows($resultados);

    if ($num_filas === 0) {

        ?>

        <p>No hay cursos disponibles</p>

    <?php

    } else {
        ?>

        <button><a href="form-curso.php">Añadir nuevo curso</a></button>
        <button><a href="form-alumno.php">Añadir nuevo alumno</a></button>
        <form action="borrar-cursos.php" method="post">

            <table>
                <tr>
                    <th></th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Precio</th>
                </tr>
                <?php
                    while ($fila = mysqli_fetch_assoc($resultados)) {
                        echo "<tr>";

                        echo "<td><input type='checkbox' name='selec_curso[]' value='" . $fila['codigo'] . "' /></td>";
                        echo "<td>" . $fila['codigo'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['horario'] . "</td>";
                        echo "<td>" . $fila['fecha_inicio'] . "</td>";
                        echo "<td>" . $fila['fecha_fin'] . "</td>";
                        echo "<td>" . $fila['precio'] . "</td>";
                        echo "<td><a href='form-curso.php?idcurso=" . $fila['codigo'] . "'>Editar</a></td>";
                        echo "<td><a href='borrar-cursos.php?idcurso=" . $fila['codigo'] . "'>Borrar</a></td>";

                        echo "</tr>";
                    }
                    ?>

            </table>
            <input type="submit" value="Borrar cursos seleccionados" />
        </form>

    <?php
    }
    ?>



</body>

</html>