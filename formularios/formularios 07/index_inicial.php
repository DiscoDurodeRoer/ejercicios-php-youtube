<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios 5</title>
</head>

<body>

    <form method="post">

        <label for="dni">DNI</label>
        <input type="text" id="dni" name="dni" required />
        <br/><br/>
        
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required />
        <br/><br/>

        <label for="apellido1">Apellido 1</label>
        <input type="text" id="apellido1" name="apellido1" required />
        <br/><br/>

        <label for="apellido2">Apellido 2</label>
        <input type="text" id="apellido2" name="apellido2" required />
        <br/><br/>

        <button type="submit" name="insertar">Insertar</button>
        <button type="submit" name="mostrar">Mostrar</button>
        <button type="submit" name="vaciar">Vaciar</button>
        <button type="submit" name="volcar">Volcar</button>

    </form>

</body>

</html>