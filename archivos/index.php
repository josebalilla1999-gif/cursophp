<?php
    declare(strict_types=1);
    $recursos = "static/";
    $carpeta = "templates/";
    if(!is_dir($carpeta)){
        $mensaje = "El directorio no existe";
        exit();
    }else{
        $mensaje = "El directorio existe y esta disponible para su uso";
    }
    $archivos = array_diff(scandir($carpeta), ['.','..']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
    <link rel="stylesheet" href="<?= $recursos?>css/reset.css">
    <link rel="stylesheet" href="<?= $recursos?>css/a11y-dark.min.css">
    <link rel="stylesheet" href="<?= $recursos?>css/estilos.css">
</head>

<body>
    <header>
        <h1>Gestor de archivos</h1>
    </header>
    <main>
        <p><?= $mensaje ?></p>
        <table>
            <tr>
                <th>Nombre del archivo</th>
                <th>Tamaño</th>
                <th>Ultima modificacion</th>
                <th>Descargar</th>
            </tr>
        <?php
            foreach($archivos as $archivo){
                echo '<tr>';
                echo '<td>' . $archivo. '</td>';
                echo '<td>' . @filesize($carpeta.$archivo) .'</td>';
                echo '<td>'. date('d-m-Y H:i:s', filemtime($carpeta.$archivo)+3600) .'</td>';
                echo '<td><a href="'. $carpeta.$archivo . '" download>Descargar fichero</a></td>';
                echo '</tr>';
            }
        ?>
        </table>

    </main>
    <footer>
        <p>Hecho por er Chemita, con su gracia y su arte. Ole!</p>
    </footer>
    <script src="<?= $recursos?>js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>