<?php 
    require_once "conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BD1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $resultado = $conexion->query("select * from pokemon");

        while($row = mysqli_fetch_array($resultado)){
            echo $row["nombre"]."<br/>";
        }

    ?>


</body>
</html>