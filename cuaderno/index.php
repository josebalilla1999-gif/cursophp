<?php
require 'inc/datos.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuaderno PHP</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/a11y-dark.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header>
        <h1></h1>
        <nav>
            <ul>
                <?php foreach ($tematicas as $clave => $tema): ?>
                    <li><a href="?tema=<?= $clave ?>"><?= $tema["menu"] ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        $eltema = $_GET['tema'] ?? null;
        if (!$eltema || !isset($tematicas[$eltema])) {
            ?>
            <h2>Inicio</h2>
            <p>Puedes elegir una opcion del menu para comenzar a aprender</p>
        <?php
        } else {
            ?>
            <h2><?= $tematicas[$eltema]['titulo'] ?></h2>
            <p><?= $tematicas[$eltema]['descripcion'] ?></p>
            <?php
            $archivo = 'inc/' . $tematicas[$eltema]['slug'] . '.php';
            if (file_exists($archivo)) {
                include_once $archivo;
            } else {
                echo '<h3 style="text-align: center; font-size: 2rem;">No me seas un ansias, espera a que tengamos el contenido listo.</h3>';
            }
        }
        ?>
    </main>
    <footer>
        <p>Hecho por er Chemita, con su gracia y su arte. Ole!</p>
    </footer>
    <script src="js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>