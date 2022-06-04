<?php

    session_start();
    require 'conexion.php';

    if(isset($_GET['idcurso'])){
        $sql = "delete from cursos where codigo = " . $_GET['idcurso'];
    }else if(isset($_POST['selec_curso'])){
        $sql = "delete from cursos where codigo in (" . join(",",$_POST['selec_curso']).")";
    }

    if(isset($sql)){
        if(mysqli_query($conexion, $sql)){
            $_SESSION['cursos_borrados']="Cursos/s borrado/s con exito";
            header("Location: index.php");
        }else{
            $_SESSION['cursos_no_borrados']="Hubo un problema al borrar: " . mysqli_error($conexion);
            header("Location: index.php");
        }
    }else{
        $_SESSION['cursos_no_borrados']="Debes seleccionar al menos un curso";
        header("Location: index.php");
    }

?>