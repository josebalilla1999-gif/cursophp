<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form id="formulario" action="correcto.php" method="POST">
        <label for="nick">Nick:
            <input type="text" id="nick" name="nick" placeholder="Introduce tu nick">
        </label><br>
        <label for="fechaNac">Fecha de nacimiento:
            <input type="date" id="fechaNac" name="fechaNac">
        </label><br>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>