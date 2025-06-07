<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Empleados</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto;}
        th, td { border: 1px solid #333; padding: 8px; text-align: center;}
        th { background-color: #ddd; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Listado de Empleados</h2>
    <p style="text-align:center;"><a href="index.php?action=registrar">Registrar nuevo empleado</a></p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Salario Base</th>
                <th>Comisión %</th>
                <th>Salario Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($empleados as $emp): ?>
            <tr>
                <td><?= htmlspecialchars($emp['nombre']) ?></td>
                <td>$<?= number_format($emp['salario_base'], 2) ?></td>
                <td><?= number_format($emp['comision_pct'], 2) ?>%</td>
                <td>$<?= number_format($emp['salario_base'] + ($emp['salario_base'] * $emp['comision_pct'] / 100), 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>