<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Maquinaria - Admin</title>
</head>
<body>
<h1>Listar Maquinaria</h1>
    <a href="admin.php?action=agregarMaquinaria">Agregar Nueva Maquinaria</a>
    <form action="admin.php" method="GET">
        <input type="hidden" name="action" value="buscarMaquinaria">
        <input type="text" name="termino" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Serie</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Costo por Hora</th>
                <th>Imagen Principal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $maquinaria) { ?>
                <tr>
                    <td><?php echo $maquinaria['idmaquinaria']; ?></td>
                    <td><?php echo $maquinaria['numserie']; ?></td>
                    <td><?php echo $maquinaria['nombre']; ?></td>
                    <td><?php echo $maquinaria['marca']; ?></td>
                    <td><?php echo $maquinaria['modelo']; ?></td>
                    <td><?php echo $maquinaria['costoh']; ?></td>
                    <td><img src="IMAGENES/<?php echo $maquinaria['imagenprincipal']; ?>" alt="<?php echo $maquinaria['nombre']; ?>" width="30"></td>
                    <td>
                        <a href="admin.php?action=editarMaquinaria&idmaquinaria=<?php echo $maquinaria['idmaquinaria']; ?>">Editar</a>
                        <a href="admin.php?action=eliminarMaquinaria&idmaquinaria=<?php echo $maquinaria['idmaquinaria']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
