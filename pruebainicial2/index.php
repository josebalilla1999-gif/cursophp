<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <style>
        table{
            width: calc(200px * 3);
            justify-content: center;
            border: 3px double grey;
        }
        table tr{
            text-align: center;
        }
        table td, th{
            border-top: 1px dotted grey;
            border-right: 1px solid grey;
            width: 200px;
        }
        table th{
            background-color: yellow;
        }

        .caja{
            width: 300px;
            margin: 20px;
            padding: 15px;
            border: 2px solid black;
            background-color: #cccccc;
        }

        .responsive{
            width: 300px;
            margin: 20px;
            padding: 10px;
            border: 1px solid black;
            background-color: red;
        }

        @media(max-width: 767px) {
            .responsive{
                background-color: blue;
                color: white;
            }
        }

        /* 
        .responsive{
            width: 300px;
            margin: 20px;
            padding: 10px;
            border: 1px solid black;
            background-color: blue;
            color: white;
        }
        
        @media(min-width: 768px) {
            .responsive{
                background-color: red;
            }
        } 
        */
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Ciudad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hermenegildo</td>
                <td>65</td>
                <td>Albacete</td>
            </tr>
            <tr>
                <td>Asuncion</td>
                <td>74</td>
                <td>Ciudad Real</td>
            </tr>
        </tbody>
    </table>
    <div class="caja"><p>Contenido</p></div>
    <div class="responsive"><p>Tengo un tractor amarillo que es lo que se lleva ahora</p></div>
    <button id="miBoton">Haz click aqui</button>
    <script>
        document.getElementById('miBoton').addEventListener('click', () => {
            alert('Era un domingo en la tarde fui a los coches de choque');
        })
    </script>
    <?php
        $nombre = 'Chemita';
        $edad = '26';
    ?>
    <p>Soy <?= $nombre ?> y tengo <?= $edad ?> años, ¿quieres saber cuánto vale tu coche?</p>
    <?php
        $base = 5;
        $altura = 4;
        function calcularArea($base, $altura): float {
            return $altura * $base;
        }
    ?>
    <p>El area del rectangulo de <?= $base ?> de base y <?= $altura ?> de altura es <?= calcularArea(5,4); ?></p>
    <ul>
    <?php
        $frutas = ['Fresa','Platano','Manzana','Naranja','Pera'];
        foreach( $frutas as $fruta ) {
            ?>
            <li><?= $fruta ?></li>
            <?php
        }
    ?>
    </ul>
    <?php
        $nota = 5;
        if($nota >= 0 && $nota < 5){
            ?> <p>Tu nota es un <?= $nota ?>. Estas suspenso, maquina</p><?php
        }else if($nota >= 5 && $nota < 7){
            ?> <p>Tu nota es un <?= $nota ?>. Estas aprobado justito, mostro</p><?php
        }else if($nota >= 7 && $nota < 9){
            ?> <p>Tu nota es un <?= $nota ?>. Buena nota, fiera</p><?php
        }else if($nota >= 9 && $nota <= 10){
            ?> <p>Tu nota es un <?= $nota ?>. Estas que te sales, Einstein</p><?php
        }else{
            ?> <p>Tu nota es un <?= $nota ?>. La de poner notas bien como que no te la sabes, ¿verdad?</p><?php
        }
    ?>
    <p>
    <?php
        $productos = [
            ['nombre' => 'Clorox', 'precio' => 25, 'stock' => 100], 
            ['nombre' => 'Desodorante', 'precio' => 6, 'stock' => 70]
        ];
        foreach( $productos as $producto ) {
        ?>
        Nombre del producto: <?= $producto['nombre'] ?>. Cuesta <?= $producto['precio'] ?>€ y quedan <?= $producto['stock'] ?> unidades en la tienda<br>
    <?php
        }
    ?>
    </p>
    <p>
    <?php 
    session_start();
    if (isset($_SESSION['usuario'])) {
        echo "Sesión activa: " . $_SESSION['usuario'] . '. <a href="cerrarsesion.php">Cerrar sesion</a>';
    } else {
        echo "No hay sesión iniciada. <a href='sesion.php'>Iniciar sesion</a>";
    }
    ?></p>
</body>
</html>