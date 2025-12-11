<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $usuario = trim($_POST["usuario"]);
        $contrasena = trim($_POST["contrasena"]);
        $usuarioValido = 'hellothere';
        $contrasenavalida = 'generalkenobi';
        $mensaje = '';
        if($usuario === $usuarioValido && $contrasena === $contrasenavalida){
            $_SESSION['usuario'] = $usuario;
            header('location:archivos.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de acceso</title>
    <!--<script defer src="validar.js"></script>-->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        form {
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        input {
            padding: 8px;
            border: 1px solid #aaa;
        }

        button {
            padding: 10px;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Acceso al sistema</h2>

    <!--<form id="form-login" action="procesar.php" method="POST">-->
    <form id="form-login" action="index.php" method="POST">
        <label>
            Usuario:
            <input type="text" name="usuario" id="usuario">
        </label>

        <label>
            Contraseña:
            <input type="password" name="contrasena" id="contrasena">
        </label>

        <button type="submit">Entrar</button>

        <p id="mensaje" class="error"></p>
    </form>

</body>

</html>