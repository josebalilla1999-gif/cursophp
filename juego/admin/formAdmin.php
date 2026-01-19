<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Admin</title>
    <link rel="stylesheet" href="../static/css/styles.css">
</head>
<body>
    <form id="formulario" action="correcto.php" method="POST">
        <label for="nombre">Nombre:
            <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre" required>
        </label><br>
        <label for="apellidos">Apellidos:
            <input type="text" id="apellidos" name="apellidos" placeholder="Introduce tu apellido o tus apellidos" required>
        </label><br>
        <label for="email">Email:
            <input type="email" id="email" name="email" placeholder="Introduce tu correo electronico" required>
        </label><br>
        <label for="contrasena">Contrasena:
            <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu contrasena" required>
        </label><br>
        <label for="rol">Rol:
            <select id="rol" name="rol">
                <option value="null" selected disabled>--Selecciona un rol--</option>
                <option value="admin">Administrador</option>
                <option value="mod">Moderador</option>
                <option value="editor">Editor</option>
                <option value="god">Dios supremo</option>
                <option value="kitten">Gatito indefenso</option>
                <option value="loki">Maestro de la comedia</option>
            </select>
        </label><br>
        <input type="submit" value="Enviar datos">
    </form>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'correo'): ?>
        <p style="color:red;">❌ Correo fallido. Inténtalo de nuevo.</p>
    <?php endif; ?>
</body>
</html>