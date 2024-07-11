<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mantenimiento</title>
</head>
<body>
    <h1>Editar Mantenimiento</h1>
    <form action="admin.php?action=editarMantenimiento&idmantenimiento=<?php echo $datos['idmantenimiento']; ?>" method="POST">
        <label for="idmaquinaria">Maquinaria ID:</label>
        <input type="text" id="idmaquinaria" name="idmaquinaria" value="<?php echo $datos['idmaquinaria']; ?>" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $datos['fecha']; ?>" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?php echo $datos['descripcion']; ?></textarea><br>
        <label for="costopro">Costo:</label>
        <input type="number" step="0.01" id="costopro" name="costopro" value="<?php echo $datos['costopro']; ?>" required><br>
        <label for="idempleado">Empleado ID:</label>
        <input type="text" id="idempleado" name="idempleado" value="<?php echo $datos['idempleado']; ?>" required><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $datos['estado']; ?>" required><br>
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $datos['tipo']; ?>" required><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
