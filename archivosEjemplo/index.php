<?php
require_once 'inc/App.php';
$app = new App();
$clase_css = 'login';
if ($app->esta_logueado()) {
    $clase_css = 'archivo';
}
?>
    <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuario  = trim($_POST['usuario'] ?? '');
                $contrasena  = trim($_POST['contrasena'] ?? '');
                if ($app->login($usuario, $contrasena)) {
                    $app->pintarCabecera('Archivo', $clase_css);
                    include 'inc/archivos.php';
                } else {
                    $app->pintarCabecera('Login', 'login');
                    include 'inc/form.php';
                }
            } else {
                include 'inc/form.php';
            }


            $app->pintarPie();

            ?>