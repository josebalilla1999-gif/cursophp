<?php
require_once 'inc/App.php';
$app = new App();

?>

<?php


            $mensaje = "";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuario  = trim($_POST['usuario'] ?? '');
                $contrasena  = trim($_POST['contrasena'] ?? '');
                if ($app->login($usuario, $contrasena)) {
                    $app->pintarCabecera('Archivos', 'archivos');
                    include 'inc/archivos.php';
                } else {
                    $app->pintarCabecera('Login', 'login');
                    include 'inc/form.php';
                }
            } else {
                $app->pintarCabecera('Login', 'login');
                include 'inc/form.php';
            }



                $app->pintarPie();
            ?>
