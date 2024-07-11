<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
require_once '../../DB/db.php';

// Incluir la clase FPDF y crear una instancia
require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Contrato");

// Obtener el ID del contrato de los parámetros GET
if (isset($_GET['idcontrato'])) {
    $idContrato = $_GET['idcontrato'];

    // Obtener datos del contrato desde la base de datos
    $conexion = Conectar::conexion();

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos del contrato, cotización y reserva
    $consulta = "SELECT c.idcontrato, c.idreserva, c.idcotizacion, 
                        r.idcliente, r.idmaquinaria, r.fechainicio, r.fechafin, r.estado, 
                        tc.idcliente, tc.idmaquinaria, tc.idlugar, tc.total, tc.tiempo
                 FROM tbcontrato c
                 JOIN tbreserva r ON c.idreserva = r.idreserva
                 JOIN tbcotizacion tc ON c.idcotizacion = tc.idcotizacion
                 WHERE c.idcontrato = $idContrato";

    $resultado = $conexion->query($consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado && $resultado->num_rows > 0) {
        $datosContrato = $resultado->fetch_assoc();

        // Comenzar a añadir contenido al PDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'CONTRATO DE ALQUILER', 0, 1, 'C');
        $pdf->Ln();

        // Información del contrato
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'ID Contrato: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $datosContrato['idcontrato'], 0, 1, 'L');
        $pdf->Ln();

        // Información de la reserva
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'ID Reserva: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $datosContrato['idreserva'], 0, 1, 'L');
        $pdf->Cell(50, 10, 'Fecha Inicio: ', 0, 0, 'L');
        $pdf->Cell(0, 10, $datosContrato['fechainicio'], 0, 1, 'L');
        $pdf->Cell(50, 10, 'Fecha Fin: ', 0, 0, 'L');
        $pdf->Cell(0, 10, $datosContrato['fechafin'], 0, 1, 'L');
        $pdf->Ln();

        // Información de la cotización
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'ID Cotización: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $datosContrato['idcotizacion'], 0, 1, 'L');
        $pdf->Cell(50, 10, 'Total: ', 0, 0, 'L');
        $pdf->Cell(0, 10, '$' . number_format($datosContrato['total'], 2), 0, 1, 'L');
        $pdf->Cell(50, 10, 'Tiempo: ', 0, 0, 'L');
        $pdf->Cell(0, 10, $datosContrato['tiempo'] . ' dias', 0, 1, 'L');
        $pdf->Ln();

        // Otros detalles del contrato (puedes agregar más según necesites)

        // Salida del PDF
        ob_clean(); // Limpiar el búfer de salida antes de generar el PDF
        $pdf->Output();
    } else {
        die("Contrato no encontrado");
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    die("ID de contrato no proporcionado");
}
?>