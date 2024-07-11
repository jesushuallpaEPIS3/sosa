<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reserva</title>
</head>
<body>
    <h1>Editar Reserva</h1>
    <form action="admin.php?action=editarReserva&idreserva=<?php echo $datos['idreserva']; ?>" method="POST">
        <label for="idcliente">Cliente ID:</label>
        <input type="text" id="idcliente" name="idcliente" value="<?php echo $datos['idcliente']; ?>" required><br>
        
        <label for="idmaquinaria">Maquinaria ID:</label>
        <input type="text" id="idmaquinaria" name="idmaquinaria" value="<?php echo $datos['idmaquinaria']; ?>" required><br>
        
        <label for="idcotize">Cotización ID:</label>
        <input type="text" id="idcotize" name="idcotize" value="<?php echo $datos['idcotize']; ?>" required><br>
        
        <label for="idempleado">Empleado ID:</label>
        <input type="text" id="idempleado" name="idempleado" value="<?php echo $datos['idempleado']; ?>" required><br>
        
        <label for="fechainicio">Fecha de Inicio:</label>
        <input type="datetime-local" id="fechainicio" name="fechainicio" value="<?php echo date('Y-m-d\TH:i', strtotime($datos['fechainicio'])); ?>" required><br>
        
        <label for="fechafin">Fecha de Fin:</label>
        <input type="datetime-local" id="fechafin" name="fechafin" value="<?php echo date('Y-m-d\TH:i', strtotime($datos['fechafin'])); ?>" required><br>
        
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo $datos['estado']; ?>" required><br>
        
        <input type="hidden" id="fechareserva" name="fechareserva" value="<?php echo date('Y-m-d\TH:i'); ?>"><br>

        <button type="submit">Actualizar Reserva</button>
    </form>
</body>
</html>
