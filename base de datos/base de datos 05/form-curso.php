<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Añadir curso</title>
</head>

<body>


    <?php
    session_start();
    if (isset($_SESSION['curso_no_correcto'])) {
        echo '<p>' . $_SESSION['curso_no_correcto'] . '</p>';
        unset($_SESSION['curso_no_correcto']);
    }

    if (isset($_GET['idcurso'])) {
        require 'conexion.php';
        $id = $_GET['idcurso'];
        $sql = "select * from cursos where codigo = " . $id;
        $resultado = mysqli_query($conexion, $sql);

        $curso = mysqli_fetch_assoc($resultado);
    }

    ?>


    <h1>
        <?php
            if(isset($curso)){
                echo 'Editar curso';
            }else{
                echo 'Añadir curso';
            }
        ?>
    </h1>

    <form action="registro-curso.php" method="post">

        <input type="hidden" name="codigo" value="<?php if(isset($curso)){ echo $curso['codigo']; } ?>">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required value="<?php if(isset($curso)){ echo $curso['nombre']; } ?>">

        <label for="horario">Horario</label>
        <input type="text" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]-([01]?[0-9]|2[0-3]):[0-5][0-9]" name="horario" id="horario" required value="<?php if(isset($curso)){ echo $curso['horario']; } ?>">

        <label for="finicial">Fecha inicial</label>
        <input type="date" name="finicial" id="finicial" required value="<?php if(isset($curso)){ echo $curso['fecha_inicial']; } ?>">

        <label for="ffin">Fecha fin</label>
        <input type="date" name="ffin" id="ffin" required value="<?php if(isset($curso)){ echo $curso['fecha_fin']; } ?>">

        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" required value="<?php if(isset($curso)){ echo $curso['precio']; } ?>">

        <input type="submit" name="enviar" value="Enviar">

    </form>

</body>

</html>