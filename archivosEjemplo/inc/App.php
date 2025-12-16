<?php
class App
{
    private $usuarioValido = 'hellothere';
    private $contrasenaValida = 'generalkenobi';

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function pintarCabecera(string $titulo, string $clase){
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $titulo?></title>
            <link href="static/css/reset.css" rel="stylesheet">
            <link href="static/css/estilos.css" rel="stylesheet">
        </head>
        <body class="<?= $clase; ?>">
            <header>
                <h1><?php ?></h1>
            </header>
            <main>
        <?php
    }

    public function pintarPie(){
        ?>    
        </main>
        <footer>
            <p id="mensaje" class="error">Si estas leyendo este mensaje me debes 50€</p>
        </footer>
        <script src="static/js/code.js"></script>
        </body>
        </html>
    <?php
    }


    public function login(string $usuario, string $contrasena): bool
    {
        if ($usuario === $this->usuarioValido && $contrasena === $this->contrasenaValida) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
        return false;
    }


    public function esta_logueado(): bool
    {
        return isset($_SESSION['usuario']);
    }


    public function toma_usuario(): ?string
    {
        return $_SESSION['usuario'] ?? null;
    }

    // Cerrar sesión
    public function logout(): void
    {
        session_unset();
        session_destroy();
    }
}
