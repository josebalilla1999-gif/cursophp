<?php
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <form id="formulario" action="registro.php" method="POST">
        <label for="nombre">Nombre:
            <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre">
        </label><br>
        <label for="apellidos">Apellidos:
            <input type="text" id="apellidos" name="apellidos" placeholder="Introduce tu apellido o tus apellidos">
        </label><br>
        <label for="email">Email:
            <input type="email" id="email" name="email" placeholder="Introduce tu correo electronico">
        </label><br>
        <label for="contrasena">Contrasena:
            <input type="password" id="contrasena" name="contrasena" placeholder="Introduce tu contrasena">
        </label><br>
        <label for="terminos">
            <input type="checkbox" id="terminos" name="terminos">Acepta los terminos y condiciones
        </label><br>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>