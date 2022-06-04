<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="tratamiento-datos.php" method="post">
        <input type="radio" name="figura" value="circulo" checked>Circulo<br/>
        <input type="radio" name="figura" value="cuadrado">Cuadrado<br/>
        <input type="radio" name="figura" value="triangulo">Triangulo<br/>
        <br/>
        <label for="radio">Radio</label>
        <input type="number" id="radio" name="radio" />
        <br/>
        <label for="lado">Lado</label>
        <input type="number" id="lado" name="lado" />
        <br/>
        <label for="base">Base</label>
        <input type="number" id="base" name="base" />
        <br/>
        <label for="altura">Altura</label>
        <input type="number" id="altura" name="altura" />
        <br/>
        <input type="submit">

    </form>

    <?php
        session_start();
        if(isset($_SESSION['resultado'])){
            echo 'El resultado es ' . $_SESSION['resultado'];
            unset($_SESSION['resultado']);
        }

    
    ?>

</body>
</html>