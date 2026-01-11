<?php
class Mitema
{
    private string $carpeta = 'static/css/temas/';

    public function __construct(){
        
    }

    public function getCookie():string{
        $tema = $_COOKIE['$tema'] ?? null;
        if(!$tema){
            $estilo = 'static/css/temas/default.css';
        }
        return $estilo;
    }

    public function escribirMenu(){

    }

    public function mostrarCSS():array{
        $hojas = [];
        if(is_dir($this->carpeta)){
            foreach(scandir($this->carpeta) as $archivo){
                if(pathinfo($archivo, PATHINFO_EXTENSION) === 'css'){
                    array_push( $hojas, $archivo);
                }
            }
        }
        return $hojas;
    }

    public function __escribirJS(){
?>
    <!-- <script src="static/js/code.js"></script> -->
    <script>
        var enlace = document.createElement('link');
        enlace.rel = 'stylesheet';
        enlace.href = '<?= $this->getCookie(); ?>';
        document.head.append(enlace);
        let selector = document.createElement('select');
        selector.setAttribute('id', 'temas');
        <?php
            foreach($this->mostrarCSS() as $valor){
        ?>
            var opcion = document.createElement('option');
            opcion.value = '<?= $valor; ?>';
            opcion.innerText = '<?= $valor ?>';
            selector.append(opcion);
        <?php
            }
        ?>
        document.body.prepend(selector);
        selector.addEventListener('change', () => {
            enlace.href = '<?= $this->carpeta; ?>' + selector.value;
        })
    </script>
<?php
    }
}
?>
        <!-- <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Elegir tema</title>
            <link href="static/css/reset.css" rel="stylesheet">
            <link href="static/css/estilos.css" rel="stylesheet">
        </head>

        <body class="">
            <header>
                <h1></h1>
            </header>
            <main id="zona">
            </main>
            <footer>

            </footer>
            <script src="static/js/code.js"></script>
            <script src="static/js/popup.js"></script>
        </body>

        </html> -->