<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Contratos - Admin</title>
</head>
<body>
    <h1>Listar Contratos</h1>
    <a href="admin.php?action=agregarContrato">Agregar Nuevo Contrato</a>
    <form action="admin.php" method="GET">
        <input type="hidden" name="action" value="buscarContrato">
        <input type="text" name="termino" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID Contrato</th>
                <th>ID Reserva</th>
                <th>ID Cotización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $contrato) { ?>
                <tr>
                    <td><?php echo $contrato['idcontrato']; ?></td>
                    <td><?php echo $contrato['idreserva']; ?></td>
                    <td><?php echo $contrato['idcotizacion']; ?></td>
                    <td>
                        <a href="admin.php?action=editarContrato&idcontrato=<?php echo $contrato['idcontrato']; ?>">Editar</a>
                        <a href="admin.php?action=eliminarContrato&idcontrato=<?php echo $contrato['idcontrato']; ?>">Eliminar</a>
                        <a href="VIEW/CONTRATO/generar.php?idcontrato=<?php echo $contrato['idcontrato']; ?>">Generar PDF</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
