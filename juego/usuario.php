<?php
    interface ILogin{
        public function login($email, $contrasena);

        public function logout();
        public function validacion();
    }

    interface IGestion{
        public function darseDeAlta();
        public function modificarDatos();
        public function eliminarDatos();
    }

    interface IToken{
        public function generarToken();
        public function validarToken(string $token);
        public function regenerarToken();
    }

    class Usuario implements ILogin, IGestion{
        protected int $id;
        protected string $nombre;
        protected string $apellidos;
        protected string $email;
        protected string $contrasena;
        protected ?string $token;
        protected ?string $fechaExpiracionToken;

        public function __construct($nombre, $apellidos, $email, $contrasena, $token, $fechaExpiracionToken){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->contrasena = $contrasena;
            $this->token = $token;
            $this->fechaExpiracionToken = $fechaExpiracionToken;
        }

        public function getId(){
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
    
        public function getEmail(): string {
            return $this->email;
        }
    
        public function setEmail(string $email): void {
            $this->email = $email;
        }
    
        public function setContrasena(string $contrasena): void {
            // Aquí se cifraría la contraseña (sin implementar)
            $this->contrasena = $contrasena;
        }

        public function getToken(): ?string {
            return $this->token;
        }
    
        public function getFechaExpiracionToken(): ?string {
            return $this->fechaExpiracionToken;
        }

        public function login($email, $contrasena) {
            if($this->email == $email && $this->contrasena == $contrasena){
                return 'Login realizado con exito';
            }else{
                return 'Login incorrecto';
            }
        }

        public function logout() {
        
        }

        public function registrarse() {
        }

        public function validacion(){

        }

        public function cambioContrasena(){

        }

        public function darseDeAlta(){

        }

        public function modificarDatos(){

        }

        public function eliminarDatos(){

        }
    }

    class Jugador extends Usuario implements IToken{
        private ?string $nick;
        private string $fechaNac;
        private string $fechaAlta;
        private bool $aceptaTerminos = false;
        private ?bool $baneado;
        private ?string $fechaFinBan;
        private ?int $numerointentosfallidos;
        private ?string $fechafinbloqueologin;
        private ?string $fechabaja;
        
        public function __construct($nombre, $apellidos, $email, $contrasena, $token, $nick, $fechaNac, $fechaAlta, $aceptaTerminos, $baneado, $fechaFinBan, $fechaExpiracionToken, $numerointentosfallidos, $fechafinbloqueologin, $fechabaja){
            parent::__construct($nombre, $apellidos, $email, $contrasena, $token, $fechaExpiracionToken);
            $this->nick = $nick;
            $this->fechaNac = $fechaNac;
            $this->fechaAlta = $fechaAlta;
            $this->aceptaTerminos = $aceptaTerminos;
            $this->baneado = $baneado;
            $this->fechaFinBan = $fechaFinBan;
            $this->numerointentosfallidos = $numerointentosfallidos;
            $this->fechafinbloqueologin = $fechafinbloqueologin;
            $this->fechabaja = $fechabaja;
        }

        public function getFechaNac(): string {
            return $this->fechaNac;
        }
    
        public function setFechaNac(string $fechaNac): void {
            $this->fechaNac = $fechaNac;
        }
    
        public function getFechaFinBan(): ?string {
            return $this->fechaFinBan;
        }
    
        public function setFechaFinBan(?string $fechaFinBan): void {
            $this->fechaFinBan = $fechaFinBan;
        }
    
        public function getBaneado(): bool {
            return $this->baneado;
        }
    
        public function setBaneado(bool $baneado): void {
            $this->baneado = $baneado;
        }
    
        public function getAceptaTerminos(): bool {
            return $this->aceptaTerminos;
        }
    
        public function setAceptaTerminos(bool $aceptaTerminos): void {
            $this->aceptaTerminos = $aceptaTerminos;
        }

        public function modificarDatos(){
            
        }

        public function darseDeAlta(){

        }

        public function eliminarDatos(){

        }

        public function cambioNick(){

        }

        public function comprobarBaneo(){

        }

        public function regenerarToken(){

        }

        public function validarToken(string $token){

        }

        public function generarToken(){

        }
    }

    class Admin extends Usuario implements IToken{
        private ?string $rol;

        public function __construct($nombre, $apellidos, $email, $contrasena, $token, $fechaExpiracionToken, $rol){
            parent::__construct($nombre, $apellidos, $email, $contrasena, $token, $fechaExpiracionToken);
            $this->rol = $rol;
        }

        public function getRol(): ?string{
            return $this->rol;
        }

        public function setRol(string $rol): void{
            $this->rol = $rol;
        }

        public function borrarAdmin(){
        }

        public function banearJugador(string $email, string $motivoBaneo = '', string $fechaFin){

        }

        public function desbanearJugador(){

        }

        public function asignarRol(){

        }

        public function generarToken(){

        }

        public function regenerarToken(){

        }

        public function validarToken(string $token){

        }
        public function modificarDatos(){
            
        }

        public function darseDeAlta(){

        }

        public function eliminarDatos(){

        }
    }
?>