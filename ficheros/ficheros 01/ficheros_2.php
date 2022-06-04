<?php

    $fichero = fopen("datos.txt", "r");

    while(!feof($fichero)){
        $linea = fgets($fichero);
        echo $linea . "<br/>";
    }

    fclose($fichero);

?>