<?php
    interface ILogin{
        public function login($email, $contrasena);

        public function logout();
        public function validacion();

        public function cambioContrasena();
    }

    interface IGestion{
        public function darseDeAlta();
        public function modificarDatos();
        public function eliminarDatos();
    }

    interface IToken{
        public function generarToken();
        public function validarToken();
        public function regenerarToken();
    }

    class Usuario implements ILogin{
        private $id;
        protected $nombre;
        protected $apellidos;
        protected $email;
        protected $contrasena;
        protected $token;

        public function __construct($nombre, $apellidos, $email, $contrasena, $token){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->contrasena = $contrasena;
            $this->token = $token;
        }

        public function getId(){
            return $this->id;
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

        public function cambioNick(){

        }

        public function cambioContrasena(){

        }
    }

    class Jugador extends Usuario implements IGestion{
        public $nick;
        public $fechaNac;
        public $fechaAlta;
        public $aceptaTerminos;
        public $baneado;
        public $fechaInicioBan;
        public $fechaFinBan;
        
        public function __construct($nombre, $apellidos, $email, $contrasena, $token, $nick, $fechaNac, $fechaAlta, $aceptaTerminos, $baneado, $fechaInicioBan, $fechaFinBan){
            parent::__construct($nombre, $apellidos, $email, $contrasena, $token);
            $this->nick = $nick;
            $this->fechaNac = $fechaNac;
            $this->fechaAlta = $fechaAlta;
            $this->aceptaTerminos = $aceptaTerminos;
            $this->baneado = $baneado;
            $this->fechaInicioBan = $fechaInicioBan;
            $this->fechaFinBan = $fechaFinBan;
        }

        public function modificarDatos(){
            
        }

        public function darseDeAlta(){

        }

        public function eliminarDatos(){

        }
    }

    class Admin extends Usuario implements IToken, IGestion{
        public $rol;

        public function __construct($nombre, $apellidos, $email, $contrasena, $token, $rol){
            parent::__construct($nombre, $apellidos, $email, $contrasena, $token);
            $this->rol = $rol;
        }

        public function borrarAdmin(){
        }

        public function banearJugador(){

        }

        public function desbanearJugador(){

        }

        public function asignarRol(){

        }

        public function generarToken(){

        }

        public function regenerarToken(){

        }

        public function validarToken(){

        }
        public function modificarDatos(){
            
        }

        public function darseDeAlta(){

        }

        public function eliminarDatos(){

        }
    }
?>