<?php

    require 'conexion.php';
    session_start();

    $nombre = $_POST['nombre'];
    $horario = $_POST['horario'];
    $finicial = $_POST['finicial'];
    $ffin = $_POST['ffin'];
    $precio = $_POST['precio'];
    
    $errores = '';

    $sql = "select * from cursos where trim(upper(nombre)) = trim(upper('".$nombre."'))";
    $resultado = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($resultado);

    if($filas > 0){
        $errores .= '- El curso con ese nombre existe. <br/>';
    }

    if($finicial > $ffin){
        $errores .= '- La fecha inicial no puede ser mayor que la de fin. <br/>';
    }

    if(is_numeric($precio)){
        if($precio < 0){
            $errores .= '- El precio debe ser positivo. <br/>';
        }
    }else{
        $errores .= '- El precio debe ser un número. <br/>';
    }


    if(empty($errores)){
        $sql = "insert into cursos values(null, '".$nombre."', '".$horario."', '".$finicial."', '".$ffin."', ".$precio.")";

        if(mysqli_query($conexion, $sql)){
            $_SESSION['curso_insertado']="El curso se ha insertado correctamente";
            header("Location: index.php");
        }else{
            $_SESSION['curso_no_insertado']= mysqli_error($conexion);
            header("Location: form-aniadir-curso.php");
        }
    
    }else{
        $_SESSION['curso_no_insertado']= $errores;
        header("Location: form-aniadir-curso.php");
    }

   

?>