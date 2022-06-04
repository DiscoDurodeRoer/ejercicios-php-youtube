<?php

    require_once 'conexion.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * ";
    $sql .= "FROM login ";
    $sql .= "WHERE username = '". $username ."'";

    $resultados = $conexion->query($sql);

    $fila = mysqli_fetch_assoc($resultados);

    $passwordHash = $fila['password'];

    if(password_verify($password, $passwordHash)){
        $_SESSION['logueado'] = true;
        header("Location: logged-area.php");
    }else{
        $_SESSION['logueado'] = false;
        header("Location: index.php");
    }

?>