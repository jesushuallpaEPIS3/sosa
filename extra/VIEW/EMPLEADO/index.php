<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Empleados - Admin</title>
</head>
<body>
    <h1>Listar Empleados</h1>
    <a href="admin.php?action=agregarEmpleado">Agregar Nuevo Empleado</a>
    <form action="admin.php" method="GET">
        <input type="hidden" name="action" value="buscarEmpleados">
        <input type="text" name="termino" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $empleado) { ?>
                <tr>
                    <td><?php echo $empleado['idempleado']; ?></td>
                    <td><?php echo $empleado['idcargo']; ?></td>
                    <td><?php echo $empleado['nombre']; ?></td>
                    <td><?php echo $empleado['apellido']; ?></td>
                    <td><?php echo $empleado['dni']; ?></td>
                    <td>
                        <a href="admin.php?action=editarEmpleado&idempleado=<?php echo $empleado['idempleado']; ?>">Editar</a>
                        <a href="admin.php?action=eliminarEmpleado&idempleado=<?php echo $empleado['idempleado']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
