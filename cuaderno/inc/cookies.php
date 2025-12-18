<section class="desarrollo">

    <h3 style="text-align: center; font-size: 2rem;">Crear una cookie con PHP</h3>
    <p>Para crear una cookie usamos<code>setcookie()</code></p><p>La cookie se guarda en el navegador del usuario.</p>

    <pre><code class="language-php">
    setcookie('usuario', 'Esperanza', time() + 3600);
    echo "Cookie creada";
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        setcookie('usuario', 'Esperanza', time() + 3600);
        echo "Cookie creada";
        ?>
    </strong>

    <p><strong>Nota importante:</strong><code>setcookie()</code></p><p>debe ejecutarse antes de enviar cualquier salida HTML. PHP es muy suyo con esto.</p>

    <h3 style="text-align: center; font-size: 2rem;">Leer una cookie</h3>
    <p>Las cookies se leen mediante el array superglobal <code>$_COOKIE</code></p>

    <pre><code class="language-php">
    if (isset($_COOKIE['usuario'])) {
        echo "Cookie usuario: " . $_COOKIE['usuario'];
    } else {
        echo "No existe la cookie.";
    }
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        if (isset($_COOKIE['usuario'])) {
            echo "Cookie usuario: " . $_COOKIE['usuario'];
        } else {
            echo "No existe la cookie.";
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Comprobar si existe una cookie</h3>
    <p>Antes de usar una cookie conviene comprobar si existe. Evitamos errores y sustos.</p>

    <pre><code class="language-php">
    if (isset($_COOKIE['usuario'])) {
        echo "La cookie existe";
    } else {
        echo "La cookie no existe";
    }
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        echo isset($_COOKIE['usuario']) 
            ? "La cookie existe" 
            : "La cookie no existe";
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Modificar una cookie</h3>
    <p>No se modifica directamente: se vuelve a crear con el mismo nombre.</p>

    <pre><code class="language-php">
    setcookie('usuario', 'Carlos', time() + 3600);
    echo "Cookie modificada";
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        setcookie('usuario', 'Carlos', time() + 3600);
        echo "Cookie modificada";
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Eliminar una cookie</h3>
    <p>Para borrar una cookie le asignamos una fecha de expiración pasada.</p>

    <pre><code class="language-php">
    setcookie('usuario', '', time() - 3600);
    echo "Cookie eliminada";
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        setcookie('usuario', '', time() - 3600);
        echo "Cookie eliminada";
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Ejemplo completo estilo login con cookies</h3>
    <p>Este ejemplo simula un inicio de sesión básico usando cookies.</p>

    <pre><code class="language-php">
    $usuario = "admin";
    $clave   = "1234";

    if ($_POST['usuario'] === $usuario && $_POST['clave'] === $clave) {
        setcookie('acceso', 'ok', time() + 3600);
        echo "Bienvenido.";
    } else {
        echo "Credenciales incorrectas.";
    }
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        echo "Bienvenido o credenciales incorrectas (depende del formulario).";
        ?>
    </strong>

    <p><strong>Recordatorio final:</strong> las cookies viven en el navegador. No son seguras para información sensible. Para eso están las sesiones. Cada cosa a lo suyo.</p>

</section>