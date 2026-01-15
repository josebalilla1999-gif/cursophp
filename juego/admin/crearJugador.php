<?php
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Jugador</title>
    <style>
        #formulario{
            margin: 20px;
            padding: 10px;
            background-color: rgba(0,0,0,0.5);
            line-height: 1.5rem;
        }

        #formulario label{
            border: 2px solid red;
        }

        #formulario label[for=terminos]{
            border: none;
        }

        #formulario input[type=text], input[type=email], input[type=password]{
            width: 400px;
        }
    </style>
</head>
<body>
    <form id="formulario" action="creacionCorrecta.php" method="POST">
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
        <label for="nick">Nick:
            <input type="text" id="nick" name="nick" placeholder="Introduce tu nick">
        </label><br>
        <label for="fechaNac">Fecha de nacimiento:
            <input type="date" id="fechaNac" name="fechaNac">
        </label><br>
        <input type="submit" value="Enviar datos">
    </form>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'correo'): ?>
        <p style="color:red;">❌ Correo fallido. Inténtalo de nuevo.</p>
    <?php endif; ?>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'nick'): ?>
        <p style="color:red;">❌ Nick fallido. Inténtalo de nuevo.</p>
    <?php endif; ?>
</body>
</html>