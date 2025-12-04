<?php
$nombre = $email = $edad = $provincia = "";
$errores = [];
$exito = false;
function limpiar($cosa) {
        return htmlspecialchars($cosa, ENT_QUOTES, "UTF-8");
    }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre    = trim($_POST["nombre"] ?? "");
    $email     = trim($_POST["email"] ?? "");
    $edad      = trim($_POST["edad"] ?? "");
    $provincia = trim($_POST["provincia"] ?? "");



    // Validación
    if ($nombre === "") $errores[] = "El nombre está vacío.";
    if ($email === "" || !str_contains($email, "@")) $errores[] = "Email no válido.";
    if ($edad === "" || !is_numeric($edad) || $edad < 1 || $edad > 120)
        $errores[] = "Edad incorrecta.";
    if ($provincia === "") $errores[] = "Debemos elegir una provincia.";

    // ¿Todo bien?
    if (empty($errores)) {
        $exito = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción</title>
    <script defer src="../js/validar.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { width: 500px; display: flex; flex-direction: column; gap: 12px; }
        input, select { padding: 8px; border: 1px solid #aaa; width: 400px;}
        button { padding: 10px; cursor: pointer; }
        .error { color: red; margin-bottom: 10px; }
        .ok { background: #efe; padding: 15px; border: 1px solid #0a0; }
    </style>
</head>
<body>

<form id="form-inscripcion" action="" method="POST">

    <label>
        Nombre:
        <input type="text" name="nombre" id="nombre"
               value="<?=  limpiar($nombre) ?>">
               <span></span>
    </label>

    <label>
        Email:
        <input type="email" name="email" id="email"
               value="<?= limpiar($email) ?>">
               <span></span>
    </label>

    <label>
        Edad:
        <input type="number" name="edad" id="edad" min="1" max="120"
               value="<?= limpiar($edad) ?>">
               <span></span>
    </label>

    <label>
        Provincia:
        <select name="provincia" id="provincia">
            <option value="">-- Seleccionar --</option>
            <?php
            $provincias = ["Madrid","Barcelona","Sevilla","Albacete"];
            foreach ($provincias as $p) {
                $sel = ($provincia === $p) ? "selected" : "";
                echo "<option value='$p' $sel>$p</option>";
            }
            ?>
        </select>
        <span></span>
    </label>

    <button type="submit">Enviar</button>
    <output id="mensaje" class="error"></output>
</form>

<?php if (!empty($errores)): ?>
    <div class="error">
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= limpiar($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($exito): ?>
<div class="ok">
    <h3>Datos enviados correctamente</h3>
    <p><strong>Nombre:</strong> <?= limpiar($nombre) ?></p>
    <p><strong>Email:</strong> <?= limpiar($email) ?></p>
    <p><strong>Edad:</strong> <?= limpiar($edad) ?></p>
    <p><strong>Provincia:</strong> <?= limpiar($provincia) ?></p>
</div>
<?php endif; ?>
</body>
</html>