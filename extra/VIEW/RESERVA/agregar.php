<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Reserva</title>
</head>
<body>
    <h1>Agregar Reserva</h1>
    <form action="admin.php?action=agregarReserva" method="POST">
        <label for="idcliente">Cliente ID:</label>
        <input type="text" id="idcliente" name="idcliente" required><br>
        
        <label for="idmaquinaria">Maquinaria ID:</label>
        <input type="text" id="idmaquinaria" name="idmaquinaria" required><br>
        
        <label for="idcotize">Cotización ID:</label>
        <input type="text" id="idcotize" name="idcotize" required><br>
        
        <label for="idempleado">Empleado ID:</label>
        <input type="text" id="idempleado" name="idempleado" required><br>
        
        <label for="fechainicio">Fecha de Inicio:</label>
        <input type="datetime-local" id="fechainicio" name="fechainicio" required><br>
        
        <label for="fechafin">Fecha de Fin:</label>
        <input type="datetime-local" id="fechafin" name="fechafin" required><br>
        
        <input type="hidden" id="fechareserva" name="fechareserva" value="<?php echo date('Y-m-d\TH:i'); ?>"><br>

        <button type="submit">Agregar Reserva</button>
    </form>
</body>
</html>
