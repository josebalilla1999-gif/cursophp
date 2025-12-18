<?php
class Mitema
{

    public function __construct()
    {
        
    }

    public function __escribirJS(){
?>
    <!-- <script src="static/js/code.js"></script> -->
    <script>
        var enlace = document.createElement('link');
        enlace.setAttribute('rel', 'stylesheet');
        enlace.setAttribute('href', 'static/css/dark.css');
        document.head.append(enlace);
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