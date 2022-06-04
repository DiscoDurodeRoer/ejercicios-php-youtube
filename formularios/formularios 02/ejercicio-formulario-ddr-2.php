<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>

    <form method="post" action="tratamiento-datos.php">
        <label for="num1">Inserta el numero 1</label>
        <input type="number" id="num1" name="num1" />

        <label for="num1">Inserta el numero 2</label>
        <input type="number" id="num2" name="num2" />

        <input type="submit" name="enviar" value="Sumar" />

    </form>

    <p>
        <?php 
            session_start();
            if (isset($_SESSION['resultado'])) {
                echo $_SESSION['resultado'];
                session_destroy();
            }
        ?>
    </p>

</body>

</html>