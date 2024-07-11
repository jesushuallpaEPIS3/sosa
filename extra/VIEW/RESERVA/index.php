<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Reserva - Admin</title>
</head>
<body>
    <h1>Listar Reserva</h1>
    <a href="admin.php?action=agregarReserva">Agregar Nueva Reserva</a>
    <form action="admin.php" method="GET">
        <input type="hidden" name="action" value="buscarReserva">
        <input type="text" name="termino" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Maquinaria</th>
                <th>Cotización</th>
                <th>Empleado</th>
                <th>Fecha Reserva</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $reserva) { ?>
                <tr>
                    <td><?php echo $reserva['idreserva']; ?></td>
                    <td><?php echo $reserva['idcliente']; ?></td>
                    <td><?php echo $reserva['idmaquinaria']; ?></td>
                    <td><?php echo $reserva['idcotize']; ?></td>
                    <td><?php echo $reserva['idempleado']; ?></td>
                    <td><?php echo $reserva['fechareserva']; ?></td>
                    <td><?php echo $reserva['fechainicio']; ?></td>
                    <td><?php echo $reserva['fechafin']; ?></td>
                    <td><?php echo $reserva['estado']; ?></td>
                    <td>
                        <a href="admin.php?action=editarReserva&idreserva=<?php echo $reserva['idreserva']; ?>">Editar</a>
                        <a href="admin.php?action=eliminarReserva&idreserva=<?php echo $reserva['idreserva']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
