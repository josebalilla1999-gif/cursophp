<?php
$cantidad1 = random_int(0, 10);
$cantidad2 = random_int(0, 10);
$resultado = $cantidad1 + $cantidad2;
$dios = "Axel Blaze";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
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
            <input type="email" name="email" required>
        </label><br>

        <label>Contraseña:
            <input type="password" name="contrasena" required>
        </label><br>

        <p>¿Cuánto es <?= $cantidad1 ?> + <?= $cantidad2 ?>?
            <input type="number" name="resultado_admin" min="0" max="20" required>
        </p>
        <input type="hidden" name="resultado_correcto" value="<?= $resultado ?>">
        <p>¿Quien es nuestro indiscutible dios todopoderoso que reina sobre todas las cosas 
            y es adorado y venerado por todo ser viviente en este insignificante planeta lleno 
            de especies minusculas a excepcion de nuestra majestad divina y suprema?
            <input type="text" name="dios_admin" required>
        </p>
        <input type="hidden" name="dios_correcto" value="<?= $dios ?>">
        <input type="submit" value="Enviar">

    </form>

</body>

</html>