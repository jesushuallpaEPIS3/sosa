<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Detalle de Maquinaria</title>
</head>
<body>
    <h1>Eliminar Detalle de Maquinaria</h1>
    <p>¿Estás seguro de que deseas eliminar el siguiente detalle de maquinaria?</p>
    <form action="admin.php?action=eliminarDetalleMaquinaria" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit">Eliminar</button>
        <a href="admin.php?action=MenuModelo3D">Cancelar</a>
    </form>
</body>
</html>
