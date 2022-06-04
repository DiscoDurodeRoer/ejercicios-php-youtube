<?php

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];

    $array = array("nombre" => $nombre, "apellidos" => $apellidos, "edad" => $edad);

    if(file_exists("personas.json")){
        $contenido = file_get_contents("personas.json");
        $data = json_decode($contenido);
        array_push($data, $array);
        file_put_contents("personas.json", json_encode($data));
    }else{
        $data = array();
        array_push($data, $array);
        $f = fopen("personas.json", "w");
        fwrite($f, json_encode($data));
        fclose($f);
    }

    header("Location: index.php");


?>