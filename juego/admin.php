<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form id="formulario" action="correcto.php" method="POST">
        <label for="rol">Rol:
            <select id="rol" name="rol">
                <option value="null" selected disabled>--Selecciona un rol--</option>
                <option value="admin" selected disabled>Administrador</option>
                <option value="mod" selected disabled>Moderador</option>
                <option value="god" selected disabled>Dios supremo</option>
            </select>
        </label><br>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>