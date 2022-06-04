<?php
    require "funciones.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $array = [
            [1, "Madrid"],
            [2, "Nueva York"],
            [3, "Londres"],
            [4, "Barcelona"]
        ];

        crearSelectOpciones($array);

        crearSelectAnios(1900,2000);
    ?>
</body>
</html>