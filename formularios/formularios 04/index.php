<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio Formularios 4</title>
</head>
<body>
    
   <?php
        session_start();
        if(!isset($_SESSION['data'])){
            $_SESSION['data'] = array();
        }
   ?>

    <form action="mostrar-array.php" method="post">

        <label for="valor">Valor</label><br/>
        <input type="text" name="valor" id="valor" />

        <input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']) ?>">

        <input type="submit" value="Añadir al array" />

    </form>

</body>
</html>