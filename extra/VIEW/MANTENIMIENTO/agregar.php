<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mantenimiento</title>
</head>
<body>
    <h1>Agregar Mantenimiento</h1>
    <form action="admin.php?action=agregarMantenimiento" method="POST">
        <label for="idmaquinaria">Maquinaria ID:</label>
        <input type="text" id="idmaquinaria" name="idmaquinaria" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>
        <label for="costopro">Costo:</label>
        <input type="number" step="0.01" id="costopro" name="costopro" required><br>
        <label for="idempleado">Empleado ID:</label>
        <input type="text" id="idempleado" name="idempleado" required><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br>
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br>
        <button type="submit">Agregar Mantenimiento</button>
    </form>
</body>
</html>
