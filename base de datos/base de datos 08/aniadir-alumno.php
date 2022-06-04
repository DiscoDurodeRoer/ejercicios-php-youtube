<?php

    session_start();
    require_once "conexion.php";

    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alumnos VALUES(null, '$nombre', '$fecha', '$curso')";

    if(mysqli_query($conexion, $sql)){
        $_SESSION['alumno_correcto'] = 'El alumno se ha añadido correctamente';
        header("Location: index.php");
    }else{
        $_SESSION['alumno_no_correcto'] = 'El alumno no se ha añadido correctamente';
        header("Location: form-alumno.php");
    }



?>