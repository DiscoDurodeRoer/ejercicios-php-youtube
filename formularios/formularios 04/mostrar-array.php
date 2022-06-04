<?php

    session_start();

    $valor = str_replace(",", "",$_POST['valor']);

    if(!empty($_POST['valores'])){
        $valores = explode(",", $_POST['valores']);
    }else{
        $valores = array();
    }

    array_push($valores, $valor);

    $_SESSION['data'] = $valores;

    for ($i=0; $i < count($valores); $i++) { 
        echo $valores[$i]."<br/>";
    }

?>

<a href="index.php">Volver</a>