<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir alumno</title>
</head>
<body>
    
    <h1>Añadir alumno</h1>

    <?php
        session_start();
        if(isset($_SESSION['alumno_no_correcto'])){
            echo $_SESSION['alumno_no_correcto'];
            unset($_SESSION['alumno_no_correcto']);
        }
    ?>

    <form action="aniadir-alumno.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" />
        
        <label for="fecha">Fecha inscripcion</label>
        <input type="text" name="fecha" id="fecha" />
        
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
            <?php
                $sql = "select * from cursos";

                require_once "conexion.php";

                $resultado = mysqli_query($conexion, $sql);

                while($fila = mysqli_fetch_assoc($resultado)){
                    ?>
                    <option value="<?php echo $fila['codigo'] ?>"><?php echo $fila['nombre'] ?></option>
                    <?php
                }

            
            ?>



        </select>
        
        <input type="submit" value="Añadir" />

    </form>


</body>
</html>