<?php
class clsReserva {
    public function listarReservaAdmin() {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $datos = $reserva->listarReserva();
        require_once("VIEW/RESERVA/index.php");
    }

    public function agregarReservaAdmin($idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado) {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $reserva->agregarReserva($idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado);
    }

    public function editarReservaAdmin($idreserva, $idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado) {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $reserva->editarReserva($idreserva, $idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado);
    }

    public function eliminarReservaAdmin($idreserva) {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $resultado = $reserva->eliminarReserva($idreserva);

        if ($resultado) {
            header("Location: admin.php?action=listarReserva");
        } else {
            echo "Error al eliminar la reserva.";
        }
        exit();
    }

    public function buscarReservaAdmin($termino) {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $datos = $reserva->buscarReserva($termino);
        require_once("VIEW/RESERVA/buscar.php");
    }

    public function mostrarFormularioEditar($idreserva) {
        require_once("MODEL/Reserva.php");
        $reserva = new Reserva();
        $datos = $reserva->obtenerReservaPorId($idreserva);
        require_once("VIEW/RESERVA/editar.php");
    }
}
?>
