<?php
class autentificar
{
    private $usuarioValido = 'hellothere';
    private $contrasenaValida = 'generalkenobi';

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function login(string $usuario, string $contrasena): bool
    {
        if ($usuario === $this->usuarioValido && $contrasena === $this->contrasenaValida) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
        return false;
    }


    public function esta_logeado(): bool
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
