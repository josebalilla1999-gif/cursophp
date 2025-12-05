<?php
    declare(strict_types=1);
    $recursos = "static/";
    $carpeta = "templates/";
    $mensaje = '';
    $extPermitidas = ['jpg', 'png', 'jpeg', 'doc', 'docx', 'pdf', 'txt', 'xlsx'];
    if(!is_dir($carpeta)){
        $mensaje = "El directorio no existe";
        mkdir($carpeta, 0755, true);
        exit();
    }else{
        $mensaje = "El directorio existe y esta disponible para su uso";
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])){
        $nombre = basename($_FILES['archivo']['name']);
        $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
        if(in_array($ext, $extPermitidas)){
            move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta.$nombre);
            $mensaje = 'Archivo permitido y subido';
        }else{
            $mensaje = 'Archivo no permitido';
        }
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
        <section id="subida">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <label for="archivo">Selecciona un archivo: 
                    <input type="file" id="archivo" name="archivo" accept="<?php
                            foreach($extPermitidas as $ext){
                                echo '.' . $ext . ',';
                            }
                        ?>application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                </label>
                <button>Subir archivo</button>
            </form>
        </section>
        <p><?= $mensaje ?></p>
        <table id="documentos">
            <thead>
                <tr>
                    <th>Nombre del archivo</th>
                    <th>Tamaño</th>
                    <th>Ultima modificacion</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($archivos as $archivo){
                    echo '<tr>';
                    echo '<td><img src="static/img/file.svg">' . $archivo. '</td>';
                    echo '<td>' . @filesize($carpeta.$archivo) .' bytes</td>';
                    echo '<td>'. date('d-m-Y H:i:s', filemtime($carpeta.$archivo)+3600) .'</td>';
                    echo '<td><a href="'. $carpeta.$archivo . '" download>Descargar fichero</a></td>';
                    echo '</tr>';
                }
            ?></tbody>
        </table>

    </main>
    <footer>
        <p>Hecho por er Chemita, con su gracia y su arte. Ole!</p>
    </footer>
    <script src="<?= $recursos?>js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>