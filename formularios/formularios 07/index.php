<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios 7</title>
</head>

<body>

    <?php
    session_start();

    if (!isset($_SESSION['alumnos'])) {
        $_SESSION['alumnos'] = array();
    }

    if (isset($_POST['insertar'])) {

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];

        if (empty($dni) || empty($nombre) || empty($apellido1) || empty($apellido2)) {
            echo "Rellena todos los valores";
        } else {

            $alumno = array(
                "dni" => $dni,
                "nombre" => $nombre,
                "apellido1" => $apellido1,
                "apellido2" => $apellido2
            );

            if (isset($_SESSION['alumnos'][$dni])) {
                echo "Se ha modificado el alumno con DNI: " . $dni;
            } else {
                echo "Se ha insertado el nuevo alumno";
            }

            $_SESSION['alumnos'][$dni] = $alumno;

            print_r($_SESSION['alumnos']);
        }
    }else if (isset($_POST['vaciar'])){

        if(!isset($_POST['dnis'])){
            echo "No hay alumnos seleccionados";
        }else{

            $dnis = $_POST['dnis'];
            print_r($dnis);

            foreach ($_SESSION['alumnos'] as $key => $value) {
                
                if(in_array($key, $dnis)){
                    unset($_SESSION['alumnos'][$key]);
                }

            }

            echo "Alumnos borrados";

        }

    }


    ?>


    <form method="post">

        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" />
        <br /><br />

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" />
        <br /><br />

        <label for="apellido1">Apellido 1</label>
        <input type="text" id="apellido1" name="apellido1" />
        <br /><br />

        <label for="apellido2">Apellido 2</label>
        <input type="text" id="apellido2" name="apellido2" />
        <br /><br />

        <button type="submit" name="insertar">Insertar</button>
        <button type="submit" name="mostrar">Mostrar</button>
        <button type="submit" name="vaciar">Vaciar</button>
        <button type="submit" name="volcar">Volcar</button>

        <?php

        if (isset($_POST['mostrar'])) {

            if (count($_SESSION['alumnos']) === 0) {
                echo "<p>No hay alumnos</p>";
            } else {


                echo "<table border=1>";
                echo "<tr>";
                echo "<th></th>";
                echo "<th>DNI</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "</tr>";

                foreach ($_SESSION['alumnos'] as $key => $value) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name="dnis[]" value="<?php echo $key; ?>"></td>
                        <td><?php echo $value['dni']; ?></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['apellido1']; ?></td>
                        <td><?php echo $value['apellido2']; ?></td>
                    </tr>
        <?php
                }

                echo "</table>";
            }
        }

        ?>


    </form>

</body>

</html>