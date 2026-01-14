<?php
$cantidad1 = random_int(0, 10);
$cantidad2 = random_int(0, 10);
$resultado = $cantidad1 + $cantidad2;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        #formulario {
            margin: 20px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #formulario label {
            border: 2px solid red;
        }

        #formulario input[type=text],
        #formulario input[type=email],
        #formulario input[type=password] {
            width: 400px;
        }
    </style>
</head>

<body>

    <form id="formulario" action="logincorrecto.php" method="POST">

        <label>Email:
            <input type="email" id="email" name="email" required>
        </label><br>

        <label>Contraseña:
            <input type="password" id="contrasena" name="contrasena" required>
        </label><br>

        <p>¿Cuánto es <?= $cantidad1 ?> + <?= $cantidad2 ?>?
            <input type="number" name="resultado_usuario" min="0" max="20" required>
        </p>

        <input type="hidden" name="resultado_correcto" value="<?= $resultado ?>">

        <input type="submit" value="Enviar">

    </form>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'login'): ?>
        <p style="color:red;">❌ Login fallido. Inténtalo de nuevo.</p>
    <?php endif; ?>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'captcha'): ?>
        <p style="color:red;">❌ Captcha fallido. Inténtalo de nuevo.</p>
    <?php endif; ?>
</body>

</html>