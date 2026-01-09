<?php

// ============================================
// INTERFACES
// ============================================

/**
 * Interface para operaciones de autenticación
 */
interface IAutenticable {
    public function login(string $correo, string $password): bool;
    public function logout(): bool;
    public function verificarCredenciales(string $correo, string $password): bool;
}

/**
 * Interface para operaciones CRUD básicas
 */
interface IGestionable {
    public function alta(): bool;
    public function modificar(): bool;
    public function eliminar(): bool;
}

/**
 * Interface para gestión de tokens
 */
interface ITokenizable {
    public function generarToken(): string;
    public function validarToken(string $token): bool;
    public function regenerarToken(): string;
}


// ============================================
// CLASE BASE
// ============================================

/**
 * Clase abstracta Persona
 * Contiene las propiedades y métodos comunes a todos los usuarios
 */
abstract class Persona implements IAutenticable, IGestionable {
    
    // Propiedades comunes
    protected int $id;
    protected string $nombre;
    protected string $apellidos;
    protected string $correo;
    protected string $password;
    
    /**
     * Constructor
     */
    public function __construct(
        int $id,
        string $nombre,
        string $apellidos,
        string $correo,
        string $password
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->password = $password;
    }
    
    // ============================================
    // GETTERS Y SETTERS
    // ============================================
    
    public function getId(): int {
        return $this->id;
    }
    
    public function getNombre(): string {
        return $this->nombre;
    }
    
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    
    public function getApellidos(): string {
        return $this->apellidos;
    }
    
    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }
    
    public function getCorreo(): string {
        return $this->correo;
    }
    
    public function setCorreo(string $correo): void {
        $this->correo = $correo;
    }
    
    public function setPassword(string $password): void {
        // Aquí se cifraría la contraseña (sin implementar)
        $this->password = $password;
    }
    
    // ============================================
    // MÉTODOS DE LA INTERFACE IAutenticable
    // ============================================
    
    /**
     * Método para realizar login
     */
    public function login(string $correo, string $password): bool {
        // TODO: Implementar lógica de login
        // - Verificar credenciales
        // - Crear sesión
        // - Registrar último acceso
        return false;
    }
    
    /**
     * Método para realizar logout
     */
    public function logout(): bool {
        // TODO: Implementar lógica de logout
        // - Destruir sesión
        // - Limpiar tokens si existen
        return false;
    }
    
    /**
     * Método para verificar credenciales
     */
    public function verificarCredenciales(string $correo, string $password): bool {
        // TODO: Implementar verificación de credenciales
        // - Comprobar correo
        // - Verificar password cifrado
        return false;
    }
    
    // ============================================
    // MÉTODOS DE LA INTERFACE IGestionable
    // ============================================
    
    /**
     * Método abstracto para dar de alta (cada clase lo implementará)
     */
    abstract public function alta(): bool;
    
    /**
     * Método abstracto para modificar datos (cada clase lo implementará)
     */
    abstract public function modificar(): bool;
    
    /**
     * Método para eliminar usuario
     */
    public function eliminar(): bool {
        // TODO: Implementar eliminación
        // - Borrar de base de datos
        // - Limpiar sesiones activas
        return false;
    }
    
    // ============================================
    // MÉTODOS AUXILIARES COMUNES
    // ============================================
    
    /**
     * Método para obtener nombre completo
     */
    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }
    
    /**
     * Método para validar formato de correo
     */
    protected function validarCorreo(string $correo): bool {
        // TODO: Implementar validación de correo
        return false;
    }
}


// ============================================
// CLASE JUGADOR
// ============================================

/**
 * Clase Jugador
 * Hereda de Persona e implementa ITokenizable
 */
class Jugador extends Persona implements ITokenizable {
    
    // Propiedades específicas del jugador
    private string $fechaNacimiento;
    private ?string $fechaFinalBaneo;
    private bool $estaBaneado;
    private bool $aceptaTerminos;
    private ?string $token;
    private ?string $fechaExpiracionToken;
    
    /**
     * Constructor del Jugador
     */
    public function __construct(
        int $id,
        string $nombre,
        string $apellidos,
        string $correo,
        string $password,
        string $fechaNacimiento,
        bool $aceptaTerminos = false
    ) {
        // Llamar al constructor del padre
        parent::__construct($id, $nombre, $apellidos, $correo, $password);
        
        // Inicializar propiedades específicas
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechaFinalBaneo = null;
        $this->estaBaneado = false;
        $this->aceptaTerminos = $aceptaTerminos;
        $this->token = null;
        $this->fechaExpiracionToken = null;
    }
    
    // ============================================
    // GETTERS Y SETTERS ESPECÍFICOS
    // ============================================
    
    public function getFechaNacimiento(): string {
        return $this->fechaNacimiento;
    }
    
    public function setFechaNacimiento(string $fechaNacimiento): void {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    
    public function getFechaFinalBaneo(): ?string {
        return $this->fechaFinalBaneo;
    }
    
    public function setFechaFinalBaneo(?string $fechaFinalBaneo): void {
        $this->fechaFinalBaneo = $fechaFinalBaneo;
    }
    
    public function getEstaBaneado(): bool {
        return $this->estaBaneado;
    }
    
    public function setEstaBaneado(bool $estaBaneado): void {
        $this->estaBaneado = $estaBaneado;
    }
    
    public function getAceptaTerminos(): bool {
        return $this->aceptaTerminos;
    }
    
    public function setAceptaTerminos(bool $aceptaTerminos): void {
        $this->aceptaTerminos = $aceptaTerminos;
    }
    
    public function getToken(): ?string {
        return $this->token;
    }
    
    public function getFechaExpiracionToken(): ?string {
        return $this->fechaExpiracionToken;
    }
    
    // ============================================
    // IMPLEMENTACIÓN DE MÉTODOS ABSTRACTOS
    // ============================================
    
    /**
     * Método para dar de alta un jugador
     * POLIMORFISMO: Implementación específica para Jugador
     */
    public function alta(): bool {
        // TODO: Implementar alta de jugador
        // - Validar que acepta términos y condiciones
        // - Validar edad mínima según fecha de nacimiento
        // - Validar que el correo no existe
        // - Insertar en base de datos
        // - Generar token de verificación
        // - Enviar email de confirmación
        return false;
    }
    
    /**
     * Método para modificar datos del jugador
     * POLIMORFISMO: Implementación específica para Jugador
     */
    public function modificar(): bool {
        // TODO: Implementar modificación de jugador
        // - Validar datos
        // - Actualizar en base de datos
        // - Si cambia correo, generar nuevo token de verificación
        return false;
    }
    
    /**
     * Override del método login para verificar baneo
     * POLIMORFISMO: Comportamiento diferente al de Admin
     */
    public function login(string $correo, string $password): bool {
        // TODO: Implementar login específico de jugador
        // - Verificar que no está baneado
        // - Verificar que aceptó términos
        // - Llamar al login del padre
        // - Actualizar último acceso
        return false;
    }
    
    // ============================================
    // MÉTODOS DE LA INTERFACE ITokenizable
    // ============================================
    
    /**
     * Generar token de autenticación
     */
    public function generarToken(): string {
        // TODO: Implementar generación de token
        // - Generar token único
        // - Establecer fecha de expiración
        // - Guardar en base de datos
        return '';
    }
    
    /**
     * Validar token existente
     */
    public function validarToken(string $token): bool {
        // TODO: Implementar validación de token
        // - Verificar que coincide con el almacenado
        // - Verificar que no ha expirado
        return false;
    }
    
    /**
     * Regenerar token (por seguridad o expiración)
     */
    public function regenerarToken(): string {
        // TODO: Implementar regeneración de token
        // - Invalidar token anterior
        // - Generar nuevo token
        // - Actualizar fecha de expiración
        return '';
    }
    
    // ============================================
    // MÉTODOS ESPECÍFICOS DE JUGADOR
    // ============================================
    
    /**
     * Banear al jugador
     */
    public function banear(string $fechaFin, string $motivo = ''): bool {
        // TODO: Implementar baneo
        // - Establecer estado baneado
        // - Guardar fecha final de baneo
        // - Registrar motivo en log
        // - Cerrar sesiones activas
        return false;
    }
    
    /**
     * Desbanear al jugador
     */
    public function desbanear(): bool {
        // TODO: Implementar desbaneo
        // - Quitar estado baneado
        // - Limpiar fecha final de baneo
        // - Registrar en log
        return false;
    }
    
    /**
     * Verificar si el baneo ha expirado
     */
    public function verificarBaneo(): bool {
        // TODO: Implementar verificación de baneo
        // - Si está baneado, verificar fecha
        // - Si la fecha ha pasado, desbanear automáticamente
        return false;
    }
    
    /**
     * Calcular edad del jugador
     */
    public function calcularEdad(): int {
        // TODO: Implementar cálculo de edad
        // - Calcular años desde fecha de nacimiento
        return 0;
    }
    
    /**
     * Verificar si es mayor de edad
     */
    public function esMayorDeEdad(): bool {
        // TODO: Implementar verificación de mayoría de edad
        return false;
    }
    
    /**
     * Aceptar términos y condiciones
     */
    public function aceptarTerminos(): bool {
        // TODO: Implementar aceptación de términos
        // - Marcar como aceptado
        // - Registrar fecha de aceptación en log
        return false;
    }
}


// ============================================
// CLASE ADMIN
// ============================================

/**
 * Clase Admin
 * Hereda de Persona
 * Tiene menos propiedades que Jugador y permisos especiales
 */
class Admin extends Persona {
    
    // El admin solo tiene las propiedades heredadas de Persona
    // No necesita propiedades adicionales según especificación
    
    /**
     * Constructor del Admin
     */
    public function __construct(
        int $id,
        string $nombre,
        string $apellidos,
        string $correo,
        string $password
    ) {
        // Llamar al constructor del padre
        parent::__construct($id, $nombre, $apellidos, $correo, $password);
    }
    
    // ============================================
    // IMPLEMENTACIÓN DE MÉTODOS ABSTRACTOS
    // ============================================
    
    /**
     * Método para dar de alta un admin
     * POLIMORFISMO: Implementación específica para Admin
     */
    public function alta(): bool {
        // TODO: Implementar alta de admin
        // - Validar permisos del usuario que crea el admin
        // - Validar que el correo no existe
        // - Insertar en base de datos con rol de admin
        // - Enviar credenciales por email seguro
        return false;
    }
    
    /**
     * Método para modificar datos del admin
     * POLIMORFISMO: Implementación específica para Admin
     */
    public function modificar(): bool {
        // TODO: Implementar modificación de admin
        // - Validar permisos
        // - Actualizar en base de datos
        return false;
    }
    
    /**
     * Override del método login con validaciones de admin
     * POLIMORFISMO: Comportamiento diferente al de Jugador
     */
    public function login(string $correo, string $password): bool {
        // TODO: Implementar login específico de admin
        // - Verificar credenciales
        // - Verificar que tiene permisos de admin activos
        // - Crear sesión con permisos especiales
        // - Registrar acceso en log de seguridad
        return false;
    }
    
    // ============================================
    // MÉTODOS ESPECÍFICOS DE ADMINISTRACIÓN
    // ============================================
    ///////Aquí es donde tenéis que seguir vosotros!!!
}
?>