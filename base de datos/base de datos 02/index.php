<?php
    require "conexion.php";        
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <?php

        $sql = "select * from cursos";

        $resultados = mysqli_query($conexion, $sql);

        $num_filas = mysqli_num_rows($resultados);

        if($num_filas === 0){

            ?>
            
            <p>No hay cursos disponibles</p>

            <?php

        }else{
        ?>

        <button href="#">Añadir nuevo curso</button>
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Horario</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Precio</th>
            </tr>
            <?php
                while($fila = mysqli_fetch_assoc($resultados)){
                    echo "<tr>";

                    echo "<td>".$fila['codigo']."</td>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['horario']."</td>";
                    echo "<td>".$fila['fecha_inicio']."</td>";
                    echo "<td>".$fila['fecha_fin']."</td>";
                    echo "<td>".$fila['precio']."</td>";

                    echo "</tr>";
                }
            ?>

        </table>

        <?php
        }
        ?>
    


</body>
</html>