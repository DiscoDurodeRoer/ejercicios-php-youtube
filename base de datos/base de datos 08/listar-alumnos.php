<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    
    <?php
    
        if(!isset($_GET['idcurso'])){
            header("Location: index.php");
        }else{

            $idcurso = $_GET['idcurso'];

            require_once "conexion.php";

            $sql = "SELECT nombre from cursos where codigo = " . $idcurso;

            $resultado = mysqli_query($conexion, $sql);

            $curso = mysqli_fetch_assoc($resultado);

            $nombre_curso = $curso['nombre'];

            ?>


            <h1>El nombre del curso es <?php echo $nombre_curso; ?></h1>

            <?php
            
            $sql = "SELECT * from alumnos where id_curso = " . $idcurso;

            $resultado = mysqli_query($conexion, $sql);

            if(mysqli_num_rows($resultado) === 0){
                echo "No hay alumnos en este curso";
            }else{

                ?>

                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha inscripcion</th>
                        </tr>
                        <tr>
                            <?php
                            while($fila = mysqli_fetch_assoc($resultado)){
                                ?>
                                <tr>
                                    <td><?php echo $fila['id'] ?></td>
                                    <td><?php echo $fila['nombre'] ?></td>
                                    <td><?php echo $fila['fecha_inscripcion'] ?></td>
                                </tr>
                                <?php
                            }

                            
                            ?>
                        </tr>
                    </table>



                <?php

            }
            

        }
    
    ?>



</body>
</html>