<?php

    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    define("HOST_DB", "localhost");
    define("USER_DB", "root");
    define("PASS_DB", "");
    define("NAME_DB", "pokemondb");

    try{
        $conexion = new PDO(
            "mysql:host=".constant("HOST_DB").";dbname=".constant("NAME_DB"), 
            constant("USER_DB"), 
            constant("PASS_DB"),
            $opciones
        );
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage(). "<br/>";
        exit;
    }

?>