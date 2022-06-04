<?php

    require 'conexion.php';
    session_start();

    $nombre = $_POST['nombre'];
    $horario = $_POST['horario'];
    $finicial = $_POST['finicial'];
    $ffin = $_POST['ffin'];
    $precio = $_POST['precio'];
    
    $sql = "insert into cursos values(null, '".$nombre."', '".$horario."', '".$finicial."', '".$ffin."', ".$precio.")";

    if(mysqli_query($conexion, $sql)){
        $_SESSION['curso_insertado']="El curso se ha insertado correctamente";
        header("Location: index.php");
    }else{
        $_SESSION['curso_no_insertado']="El curso no se ha insertado correctamente";
        header("Location: form-aniadir-curso.php");
    }


?>