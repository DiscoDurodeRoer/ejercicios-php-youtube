<?php

    require_once 'conexion.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login VALUES(";
    $sql .= "'" . $username . "', '" . $passwordHash . "')";


    if($conexion->query($sql)){
        $_SESSION['resultado']=true;
    } else {
        $_SESSION['resultado']=false;
    }

    header("Location: index.php");

?>