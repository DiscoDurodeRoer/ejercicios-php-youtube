<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejemplo PDO</title>
</head>
<body>

    <?php
        require "conexion.php";

        $sql = "SELECT * FROM pokemon";
        $resultados = $conexion->query($sql);
        $resultados->execute();

        while($fila = $resultados->fetch(PDO::FETCH_OBJ)){
            echo $fila->nombre."<br/>";
        }

    ?>


</body>
</html>