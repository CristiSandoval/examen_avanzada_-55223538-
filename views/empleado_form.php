<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Empleado</title>
    <style>
        form { width: 300px; margin: 50px auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 5px; }
        input[type="submit"] { margin-top: 15px; padding: 8px 12px; }
        .error { color: red; }
        a { display: block; margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Registrar Empleado</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form action="index.php?action=registrar" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="salario_base">Salario Base:</label>
        <input type="number" step="0.01" name="salario_base" id="salario_base" required>

        <label for="comision_pct">Comisión %:</label>
        <input type="number" step="0.01" name="comision_pct" id="comision_pct" required>

        <input type="submit" value="Registrar">
    </form>
    <a href="index.php?action=listar">Volver al listado</a>
</body>
</html>