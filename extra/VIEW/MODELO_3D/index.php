<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Modelos 3D</title>
</head>
<body>
<h1>Modelos 3D</h1>


<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Maquinaria</th>
            <th>Imagen 1</th>
            <th>Imagen 2</th>
            <th>Imagen 3</th>
            <th>Modelo 3D</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $detalle) { ?>
            <tr>
                <td><?php echo $detalle['iddetalle']; ?></td>
                <td><?php echo $detalle['idmaquinaria']; ?></td>
                <td><img src="IMAGENES/<?php echo $detalle['imagen1'] ?? 'default.jpg'; ?>" alt="Imagen 1" width="50"></td>
                <td><img src="IMAGENES/<?php echo $detalle['imagen2'] ?? 'default.jpg'; ?>" alt="Imagen 2" width="50"></td>
                <td><img src="IMAGENES/<?php echo $detalle['imagen3'] ?? 'default.jpg'; ?>" alt="Imagen 3" width="50"></td>
                <td>
                    <img src="IMAGENES/<?php echo !empty($detalle['modelo3d']) ? '3d.png' : 'default.jpg'; ?>" alt="Modelo 3D" width="50">
                </td>
                <td><?php echo $detalle['descripcion']; ?></td>
                <td>
                    <a href="admin.php?action=editarDetalleMaquinaria&id=<?php echo $detalle['iddetalle']; ?>">Editar</a>
                    <a href="admin.php?action=mostrarFormularioEliminar&id=<?php echo $detalle['iddetalle']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
