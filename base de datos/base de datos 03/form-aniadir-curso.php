<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Añadir curso</title>
</head>
<body>

    <h1>Añadir curso</h1>

    <?php
        session_start();
        if(isset($_SESSION['curso_no_insertado'])){
            echo '<p>'.$_SESSION['curso_no_insertado'].'</p>';
            unset($_SESSION['curso_no_insertado']);
        }
    ?>

    <form action="aniadir-curso.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="horario">Horario</label>
        <input type="text" name="horario" id="horario" required>

        <label for="finicial">Fecha inicial</label>
        <input type="date" name="finicial" id="finicial" required>

        <label for="ffin">Fecha fin</label>
        <input type="date" name="ffin" id="ffin" required>

        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" required>

        <input type="submit" name="enviar" value="Enviar">

    </form>
    
</body>
</html>