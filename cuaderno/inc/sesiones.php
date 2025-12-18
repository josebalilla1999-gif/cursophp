<section class="desarrollo">

    <h3 style="text-align: center; font-size: 2rem;">Iniciar una sesión con PHP</h3>
    <p>Para comenzar una sesión usamos <code>session_start()</code>. Esto crea o recupera la sesión del usuario.</p>
    <pre>
    <code class="language-php">
    session_start();
    $_SESSION['usuario'] = 'Esperanza';
    echo $_SESSION['usuario'];
    </code>
    </pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        session_start();
        $_SESSION['usuario'] = 'Esperanza';
        echo $_SESSION['usuario'];
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Comprobar si existe una sesión</h3>
    <p>Podemos comprobar si el usuario inició sesión verificando valores en <code>$_SESSION</code></p>

    <pre><code class="language-php">
    session_start();
    if (isset($_SESSION['usuario'])) {
        echo "Sesión activa: " . $_SESSION['usuario'];
    } else {
        echo "No hay sesión iniciada.";
    }
    </code>
    </pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        if (isset($_SESSION['usuario'])) {
            echo "Sesión activa: " . $_SESSION['usuario'];
        } else {
            echo "No hay sesión iniciada.";
        }
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Modificar datos de sesión</h3>
    <p>Podemos actualizar valores como si fuera un array normal.</p>

    <pre><code class="language-php">
    session_start();
    $_SESSION['contador'] = ($_SESSION['contador'] ?? 0) + 1;
    echo "Visitas: " . $_SESSION['contador'];
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        $_SESSION['contador'] = ($_SESSION['contador'] ?? 0) + 1;
        echo "Visitas: " . $_SESSION['contador'];
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Eliminar un valor de sesión</h3>
    <p>Podemos borrar una clave concreta con <code>unset()</code></p>

    <pre><code class="language-php">
    session_start();
    unset($_SESSION['usuario']);
    echo "Usuario eliminado de la sesión.";
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        unset($_SESSION['usuario']);
        echo "Usuario eliminado de la sesión.";
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Cerrar sesión completamente</h3>
    <p>Para destruir toda la sesión usamos <code>session_unset()</code> y <code>session_destroy()</code></p>

    <pre><code class="language-php">
    session_start();
    session_unset();     // Limpia variables
    session_destroy();   // Elimina la sesión
    echo "Sesión cerrada.";
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        session_unset();
        session_destroy();
        echo "Sesión cerrada.";
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Ejemplo completo estilo login</h3>
    <p>Este ejemplo muestra un inicio de sesión básico usando sesiones.</p>

    <pre><code class="language-php">
    session_start();
    $usuario = "admin";
    $clave   = "1234";
    if ($_POST['usuario'] === $usuario && $_POST['clave'] === $clave) {
        $_SESSION['acceso'] = true;
        echo "Bienvenido.";
    } else {
        echo "Credenciales incorrectas.";
    }
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        // Para no romper nada en la demo:
        echo "Bienvenido o credenciales incorrectas (depende del formulario).";
        ?>
    </strong>

</section>