<section class="desarrollo">

    <h3 style="text-align: center; font-size: 2rem;">Comprobación de existencia de archivos</h3>
    <p>
        Cuando queremos trabajar con un archivo, primero debemos asegurarnos de que está ahí… como cuando vamos a por el
        tupper al frigorífico y esperamos que no se lo haya comido alguien. Podemos hacerlo con
        <code>file_exists()</code> e incluso afinar usando <code>is_file()</code>.
    </p>

    <pre>
    <code class="language-php">
    $ruta = 'inc/documento.txt';
    if (file_exists($ruta)) {
        echo 'El archivo existe';
    } else {
        echo 'Nada. Archivo perdido en combate.';
    }
    </code>
    </pre>

    <strong class="paint">
        <?php
        $ruta = 'inc/documento.txt';
        if (file_exists($ruta)) {
            echo 'El archivo existe';
        } else {
            echo 'Nada. Archivo perdido en combate.';
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Comprobar si es archivo o directorio</h3>
    <p>
        A veces necesitamos saber si tenemos un archivo o una carpeta. Podemos comprobarlo con <code>is_file()</code> e
        <code>is_dir()</code>.
    </p>

    <pre>
    <code class="language-php">
    $ruta = 'templates';
    if (is_dir($ruta)) {
        echo 'Es un directorio';
    }
    if (is_file($ruta)) {
        echo 'Es un archivo';
    }
    </code>
    </pre>

    <strong class="paint">
        <?php
        $ruta = 'templates';
        $archivo = 'index.php';
        if (is_dir($ruta))
            echo 'Es un directorio<br>';
        if (is_file($archivo))
            echo 'Es un archivo';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Obtener información del archivo</h3>
    <p>
        PHP nos permite conocer tamaño, fecha de modificación y tipo del archivo.
    </p>

    <pre>
    <code class="language-php">
    $ruta = 'inc/documento.txt';
    if (is_file($ruta)) {
        echo 'Tamaño: ' . filesize($ruta) . ' bytes<br>';
        echo 'Modificado: ' . date('d-m-Y H:i:s', filemtime($ruta));
    }
    </code>
    </pre>

    <strong class="paint">
        <?php
        $ruta = 'inc/documento.txt';
        if (is_file($ruta)) {
            echo 'Tamaño: ' . @filesize($ruta) . ' bytes<br>';
            echo 'Modificado: ' . @date('d-m-Y H:i:s', @filemtime($ruta) + 3600);
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Leer archivos</h3>
    <p>
        Para leer el contenido de un archivo podemos usar <code>file_get_contents()</code> si queremos todo de golpe, o
        la combinación clásica <code>fopen()</code> / <code>fgets()</code> si queremos procesarlo línea a línea.
    </p>

    <pre>
    <code class="language-php">
    $contenido = file_get_contents('inc/documento.txt');
    echo $contenido;
    </code>
    </pre>

    <strong class="paint">
        <?php
        echo @file_get_contents('inc/documento.txt');
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Escribir archivos</h3>
    <p>
        Podemos escribir en archivos usando <code>file_put_contents()</code> para ir rápidos o <code>fopen()</code> para
        mayor control.
    </p>

    <pre>
    <code class="language-php">
    $texto = "Línea añadida con PHP\n";
    file_put_contents('nuevo.txt', $texto);
    </code>
    </pre>

    <strong class="paint">
        <?php
        file_put_contents('nuevo.txt', "Línea añadida con PHP\n");
        echo 'Archivo escrito correctamente.';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Añadir contenido a un archivo</h3>
    <p>
        Si no queremos borrar lo que ya tenía, podemos concatenar contenido usando <code>FILE_APPEND</code>.
    </p>

    <pre>
    <code class="language-php">
    $extra = "Otra línea más.\n";
    file_put_contents('nuevo.txt', $extra, FILE_APPEND);
    </code>
    </pre>

    <strong class="paint">
        <?php
        file_put_contents('nuevo.txt', "Otra línea más.\n", FILE_APPEND);
        echo 'Añadido sin borrar lo anterior.';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Borrar archivos</h3>
    <p>
        Cuando ya no necesitamos un archivo podemos eliminarlo con <code>unlink()</code>.
    </p>

    <pre>
    <code class="language-php">
    if (file_exists('basura.txt')) {
        unlink('basura.txt');
        echo 'Archivo eliminado.';
    }
    </code>
    </pre>

    <strong class="paint">
        <?php
        if (file_exists('basura.txt')) {
            unlink('basura.txt');
            echo 'Archivo eliminado.';
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Crear y borrar directorios</h3>
    <p>
        Para crear carpetas usamos <code>mkdir()</code> y para eliminarlas <code>rmdir()</code>.
    </p>

    <pre>
    <code class="language-php">
    mkdir('carpeta_demo');
    rmdir('carpeta_demo');
    </code>
    </pre>

    <strong class="paint">
        <?php
        @mkdir('carpeta_demo');
        @rmdir('carpeta_demo');
        echo 'Directorio creado y eliminado (si estaba vacío).';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Listar archivos de un directorio</h3>
    <p>
        Para ver qué tenemos en una carpeta podemos usar <code>scandir()</code>.
    </p>

    <pre>
    <code class="language-php">
    $archivos = scandir('templates');
    foreach ($archivos as $archivo) {
        echo $archivo . "&lt;br&gt;";
    }
    </code>
    </pre>

    <strong class="paint">
        <?php
        if (is_dir('templates')) {
            $archivos = scandir('templates');
            foreach ($archivos as $archivo)
                echo $archivo . "<br>";
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Mover o renombrar archivos</h3>
    <p>
        PHP nos permite reubicar archivos con <code>rename()</code>.
    </p>

    <pre>
    <code class="language-php">
    rename('nuevo.txt', 'backup_nuevo.txt');
    </code>
    </pre>

    <strong class="paint">
        <?php
        @rename('nuevo.txt', 'backup_nuevo.txt');
        echo 'Renombrado o movido.';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Copiar archivos</h3>
    <p>
        Si queremos duplicar un archivo usamos <code>copy()</code>.
    </p>

    <pre>
    <code class="language-php">
    copy('backup_nuevo.txt', 'copia.txt');
    </code>
    </pre>

    <strong class="paint">
        <?php
        @copy('backup_nuevo.txt', 'copia.txt');
        echo 'Copia creada.';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Permisos de archivo</h3>
    <p>
        Podemos cambiar los permisos de un archivo usando <code>chmod()</code>.
    </p>

    <pre>
    <code class="language-php">
    chmod('copia.txt', 0644);
    </code>
    </pre>

    <strong class="paint">
        <?php
        @chmod('copia.txt', 0644);
        echo 'Permisos aplicados (si el servidor quiso).';
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Obtener la ruta absoluta</h3>
    <p>
        Para saber dónde está realmente un archivo podemos usar <code>realpath()</code>.
    </p>

    <pre>
    <code class="language-php">
    echo realpath('copia.txt');
    </code>
    </pre>

    <strong class="paint">
        <?php
        echo @realpath('copia.txt');
        ?>
    </strong>

</section>