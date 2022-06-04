<?php

    $fichero = fopen("datos.txt", "w");

    fputs($fichero, "Linea 1 \n");
    fputs($fichero, "Linea 2 \n");
    fputs($fichero, "Linea 3 \n");
    fputs($fichero, "Linea 4");

    fclose($fichero);

    echo "Se ha escrito el fichero correctamente.";

?>