<section class="desarrollo">

    <h3 style="text-align: center; font-size: 2rem;">Introducción a la Programación Orientada a Objetos (POO)</h3>
    <p>
        La Programación Orientada a Objetos (POO) es un paradigma que nos permite organizar el código de forma más clara, reutilizable y mantenible.
        En lugar de escribir funciones y variables sueltas, agrupamos datos y comportamientos en estructuras llamadas <strong>clases</strong>.
        Esto nos ayuda a modelar elementos del mundo real y a construir aplicaciones más escalables y profesionales.
    </p>

    <h3 style="text-align: center; font-size: 2rem;">Definir una clase en PHP</h3>
    <p>Para crear una clase usamos la palabra clave <code>class</code>Dentro definimos propiedades y métodos.</p>

    <pre><code class="language-php">
    class Usuario {
        public string $nombre;

        public function saludar() {
            echo "Hola, soy " . $this->nombre;
        }
    }
    </code></pre>

    <p>En este ejemplo hemos definido una clase llamada <code>Usuario</code></p>

    <h3 style="text-align: center; font-size: 2rem;">Crear un objeto a partir de una clase</h3>
    <p>Una vez definida la clase, podemos crear objetos usando la palabra clave <code>new</code></p>

    <pre><code class="language-php">
    $usuario = new Usuario();
    $usuario->nombre = "Esperanza";
    $usuario->saludar();
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        class Usuario {
            public string $nombre;
            public function saludar() {
                echo "Hola, soy " . $this->nombre;
            }
        }

        $usuario = new Usuario();
        $usuario->nombre = "Esperanza";
        $usuario->saludar();
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Usar un constructor</h3>
    <p>El constructor se ejecuta automáticamente al crear el objeto y nos permite inicializar sus datos.</p>

    <pre><code class="language-php">
    class Usuario {
        public string $nombre;

        public function __construct(string $nombre) {
            $this->nombre = $nombre;
        }

        public function saludar() {
            echo "Hola, soy " . $this->nombre;
        }
    }

    $usuario = new Usuario("Esperanza");
    $usuario->saludar();
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        class Usuario2 {
            public string $nombre;

            public function __construct(string $nombre) {
                $this->nombre = $nombre;
            }

            public function saludar() {
                echo "Hola, soy " . $this->nombre;
            }
        }

        $usuario2 = new Usuario2("Esperanza");
        $usuario2->saludar();
        ?>
    </strong>

    <h3 style="text-align: center; font-size: 2rem;">Acceder a propiedades y métodos</h3>
    <p>Usamos el operador <code>-&gt;</code> para acceder a las propiedades y métodos de un objeto.</p>

    <pre><code class="language-php">
    $usuario->nombre;
    $usuario->saludar();
    </code></pre>

    <h3 style="text-align: center; font-size: 2rem;">Ejemplo completo orientado a aplicación</h3>
    <p>Este ejemplo muestra una clase sencilla que podría formar parte de una aplicación real.</p>

    <pre><code class="language-php">
    class Contador {
        private int $valor = 0;

        public function incrementar() {
            $this->valor++;
        }

        public function mostrar() {
            echo "Valor actual: " . $this->valor;
        }
    }

    $contador = new Contador();
    $contador->incrementar();
    $contador->mostrar();
    </code></pre>

    <p>El resultado en pantalla sería:</p>
    <strong class="paint">
        <?php
        class Contador {
            private int $valor = 0;

            public function incrementar() {
                $this->valor++;
            }

            public function mostrar() {
                echo "Valor actual: " . $this->valor;
            }
        }

        $contador = new Contador();
        $contador->incrementar();
        $contador->mostrar();
        ?>
    </strong>

</section>