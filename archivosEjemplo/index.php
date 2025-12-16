<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php ?></title>
</head>

<body>
    <header>
        <h1><?php ?></h1>
    </header>
    <main><?php
            require_once 'inc/autentificacion.php';
            $aut = new autentificar();

            $mensaje = "";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuario  = trim($_POST['usuario'] ?? '');
                $contrasena  = trim($_POST['contrasena'] ?? '');
                if ($aut->login($usuario, $contrasena)) {
                    include 'inc/archivos.php';
                }else{
                include 'inc/form.php';
                }
            } 
            else{
                include 'inc/form.php';
            
        }




            ?></main>
    <footer>
        <p id="mensaje" class="error"><?php echo $mensaje ?></p>
    </footer>
</body>

</html>