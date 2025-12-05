<?php
    declare(strict_types=1);
    $recursos = "static/";
    $carpeta = "templates/";
    $mensaje = '';
    $extPermitidas = ['jpg' => '#9800beff', 
                        'png' => '#3f0037ff', 
                        'jpeg' => '#e270ffff', 
                        'doc' => '#0072beff', 
                        'docx' => '#0d00beff', 
                        'pdf' => '#ff0000ff', 
                        'txt' => '#000000ff', 
                        'xlsx' => '#00bebeff'];
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
        if(in_array($ext, array_keys($extPermitidas))){
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
        <table id="documentos">
            <thead>
                <tr>
                    <th colspan="2">Nombre del archivo</th>
                    <th>Tamaño</th>
                    <th>Ultima modificacion</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($archivos as $archivo){ 
                    $ext = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    $color = $extPermitidas[$ext];
                ?>
                    <tr>
                    <td><figure><img src="static/img/file.svg" alt="Extension del tipo<?= $ext; ?>"><figcaption style="color: <?= $color; ?>"><?= $ext;?></figure></td>
                    <td><?= $archivo; ?></td>
                    <td><?= @filesize($carpeta.$archivo)?> bytes</td>
                    <td><?=date('d-m-Y H:i:s', filemtime($carpeta.$archivo)+3600);?></td>
                    <td><a href="<?=$carpeta.$archivo;?>" download>Descargar fichero</a></td>
                    </tr><?php
                }
            ?>
            </tbody>
        </table>
        <section id="subida">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <label for="archivo">Selecciona un archivo: 
                    <input type="file" id="archivo" name="archivo" accept="<?php
                            foreach(array_keys($extPermitidas) as $ext){
                                echo '.' . $ext . ',';
                            }
                        ?>">
                </label>
                <label for="drag">
                    <input type="file" id="drag" name="drag" placeholder="Arrastra un archivo aqui" accept="<?php
                            foreach(array_keys($extPermitidas) as $ext){
                                echo '.' . $ext . ',';
                            }
                        ?>">
                </label>
                <button>Subir archivo</button>
            </form>
        </section>
        <p><?= $mensaje ?></p>
    </main>
    <footer>
        <p>Hecho por er Chemita, con su gracia y su arte. Ole!</p>
    </footer>
    <script src="<?= $recursos?>js/script.js"></script>
    <script src="<?= $recursos?>js/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>
</html>