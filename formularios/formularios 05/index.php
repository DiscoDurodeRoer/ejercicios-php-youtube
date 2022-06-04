<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios 5</title>
</head>

<body>

    <?php
        session_start();

        if(!isset($_SESSION['alumnos'])){
            $_SESSION['alumnos'] = array();
        }

        if(isset($_POST['insertar'])){

            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];

            $alumno = array(
                "dni" => $dni,
                "nombre" => $nombre,
                "apellido1" => $apellido1,
                "apellido2" => $apellido2
            );

            if(isset($_SESSION['alumnos'][$dni])){
                echo "Se ha modificado el alumno con DNI: ". $dni;
            }else{
                echo "Se ha insertado el nuevo alumno";
            }

            $_SESSION['alumnos'][$dni] = $alumno;

            print_r($_SESSION['alumnos']);

        }

    
    ?>


    <form method="post">

        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" required />
        <br /><br />

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required />
        <br /><br />

        <label for="apellido1">Apellido 1</label>
        <input type="text" id="apellido1" name="apellido1" required />
        <br /><br />

        <label for="apellido2">Apellido 2</label>
        <input type="text" id="apellido2" name="apellido2" required />
        <br /><br />

        <button type="submit" name="insertar">Insertar</button>
        <button type="submit" name="mostrar">Mostrar</button>
        <button type="submit" name="vaciar">Vaciar</button>
        <button type="submit" name="volcar">Volcar</button>

    </form>

</body>

</html>