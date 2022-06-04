<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    
    <?php
        session_start();
        if(isset($_SESSION['resultado'])){
            if($_SESSION['resultado']){
                ?>
                    <p>Usuario creado</p>
                <?php
            }else{
                ?>
                    <p>Hubo un problema al crear el usuario</p>
                <?php
            }
            unset($_SESSION['resultado']);
        }

    ?>

    <form action="crear-usuario.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Crear usuario">
    </form>

</body>
</html>