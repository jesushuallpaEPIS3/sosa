<?php
require_once("DB/db.php");
require_once("seguridad.php"); // Asegúrate de incluir este archivo

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Dashboard</title>
</head>
<body>
        <?php require_once("VIEW/ADMIN/sidebar.php"); ?>
    <main>
        <h2>Bienvenido, <?php echo htmlspecialchars($user['usuario']); ?></h2>
        <?php
            $action = isset($_GET['action']) ? $_GET['action'] : 'home';
            switch ($action) {
                /*
                Seccion Empleado Admin 
                =============================================
                */
                case 'MenuEmpleado':
                    require_once("CONTROLLER/EmpleadoController.php");
                    $controller = new clsEmpleado();
                    $controller->listarEmpleadosAdmin();
                    break;

                /*
                Seccion Cliente Admin 
                =============================================
                */
                case 'MenuCliente':
                    require_once("CONTROLLER/ClienteController.php");
                    $controller = new clsCliente();
                    $controller->listarClienteAdmin();
                    break;

                case 'agregarCliente':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require_once("CONTROLLER/ClienteController.php");
                        
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $correo = $_POST['correo'];
                        $iddocumento = $_POST['iddocumento'];
                        $documento = $_POST['documento'];
                        $telefono = $_POST['telefono'];

                        $controller = new clsCliente();
                        $controller->agregarClienteAdmin($nombre, $apellido, $correo, $iddocumento, $documento, $telefono);

                        header('Location: admin.php?action=listarCliente');
                        exit;
                    } else {
                        require_once("VIEW/CLIENTE/agregar.php");
                    }
                    break;

                case 'eliminarCliente':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idcliente'])) {
                            require_once("CONTROLLER/ClienteController.php");
                            $idcliente = $_GET['idcliente'];
                            $controller = new clsCliente();
                            $controller->eliminarClienteAdmin($idcliente);
                            header('Location: admin.php?action=listarCliente');
                            exit;
                        }
                    } else {
                        require_once("VIEW/CLIENTE/eliminar.php");
                    }
                    break;

                case 'editarCliente':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idcliente'])) {
                            require_once("CONTROLLER/ClienteController.php");
                            $id = $_GET['idcliente'];
                            $nombre = $_POST['nombre'];
                            $apellido = $_POST['apellido'];
                            $correo = $_POST['correo'];
                            $iddocumento = $_POST['iddocumento'];
                            $documento = $_POST['documento'];
                            $telefono = $_POST['telefono'];

                            $controller = new clsCliente();
                            $controller->editarClienteAdmin($id, $nombre, $apellido, $correo, $iddocumento, $documento, $telefono);

                            header('Location: admin.php?action=listarCliente');
                            exit;
                        }
                    } else {
                        if (isset($_GET['idcliente'])) {
                            require_once("CONTROLLER/ClienteController.php");
                            $id = $_GET['idcliente'];
                            $controller = new clsCliente();
                            $controller->mostrarFormularioEditar($id);
                        }
                    }
                    break;

                case 'buscarCliente':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if (isset($_GET['termino'])) {
                            $termino = $_GET['termino'];
                            require_once("CONTROLLER/ClienteController.php");
                            $controller = new clsCliente();
                            $controller->buscarClienteAdmin($termino);
                        }
                    } else {
                        require_once("VIEW/CLIENTE/buscar.php");
                    }
                    break;


                case 'MenuContrato':
                    require_once("CONTROLLER/ContratoController.php");
                    $controller = new clsContrato();
                    $controller->listarContratoAdmin();
                    break;

                case 'agregarContrato':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require_once("CONTROLLER/ContratoController.php");

                        $idreserva = $_POST['idreserva'];
                        $idcotizacion = $_POST['idcotizacion'];

                        $controller = new clsContrato();
                        $controller->agregarContratoAdmin($idreserva, $idcotizacion);

                        header('Location: admin.php?action=listarContrato');
                        exit;
                    } else {
                        require_once("VIEW/CONTRATO/agregar.php");
                    }
                    break;

                case 'eliminarContrato':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idcontrato'])) {
                            require_once("CONTROLLER/ContratoController.php");
                            $idcontrato = $_GET['idcontrato'];
                            $controller = new clsContrato();
                            $controller->eliminarContratoAdmin($idcontrato);
                            header('Location: admin.php?action=listarContrato');
                            exit;
                        }
                    } else {
                        require_once("VIEW/CONTRATO/eliminar.php");
                    }
                    break;

                case 'editarContrato':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idcontrato'])) {
                            require_once("CONTROLLER/ContratoController.php");
                            $idcontrato = $_GET['idcontrato'];
                            $idreserva = $_POST['idreserva'];
                            $idcotizacion = $_POST['idcotizacion'];

                            $controller = new clsContrato();
                            $controller->editarContratoAdmin($idcontrato, $idreserva, $idcotizacion);

                            header('Location: admin.php?action=listarContrato');
                            exit;
                        }
                    } else {
                        if (isset($_GET['idcontrato'])) {
                            require_once("CONTROLLER/ContratoController.php");
                            $idcontrato = $_GET['idcontrato'];
                            $controller = new clsContrato();
                            $controller->mostrarFormularioEditar($idcontrato);
                        }
                    }
                    break;

                case 'buscarContrato':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if (isset($_GET['termino'])) {
                            $termino = $_GET['termino'];
                            require_once("CONTROLLER/ContratoController.php");
                            $controller = new clsContrato();
                            $controller->buscarContratoAdmin($termino);
                        }
                    } else {
                        require_once("VIEW/CONTRATO/buscar.php");
                    }
                    break;
                case 'generarPDFContrato':

                    break;

                /*
                Seccion Reserva Admin 
                =============================================
                */

                case 'MenuReserva':
                    require_once("CONTROLLER/ReservaController.php");
                    $controller = new clsReserva();
                    $controller->listarReservaAdmin();
                    break;

                case 'agregarReserva':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require_once("CONTROLLER/ReservaController.php");

                        $idcliente = $_POST['idcliente'];
                        $idmaquinaria = $_POST['idmaquinaria'];
                        $idcotize = $_POST['idcotize'];
                        $idempleado = $_POST['idempleado'];
                        $fechareserva = date('Y-m-d H:i:s');
                        $fechainicio = $_POST['fechainicio'];
                        $fechafin = $_POST['fechafin'];
                        $estado = 1;

                        $controller = new clsReserva();
                        $controller->agregarReservaAdmin($idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado);

                        header('Location: admin.php?action=MenuReserva');
                        exit;
                    } else {
                        require_once("VIEW/RESERVA/agregar.php");
                    }
                    break;

                case 'eliminarReserva':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idreserva'])) {
                            require_once("CONTROLLER/ReservaController.php");
                            $idreserva = $_GET['idreserva'];
                            $controller = new clsReserva();
                            $controller->eliminarReservaAdmin($idreserva);
                            header('Location: admin.php?action=MenuReserva');
                            exit;
                        }
                    } else {
                        require_once("VIEW/RESERVA/eliminar.php");
                    }
                    break;

                case 'editarReserva':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idreserva'])) {
                            require_once("CONTROLLER/ReservaController.php");
                            $id = $_GET['idreserva'];
                            $idcliente = $_POST['idcliente'];
                            $idmaquinaria = $_POST['idmaquinaria'];
                            $idcotize = $_POST['idcotize'];
                            $idempleado = $_POST['idempleado'];
                            $fechareserva = $_POST['fechareserva'];
                            $fechainicio = $_POST['fechainicio'];
                            $fechafin = $_POST['fechafin'];
                            $estado = $_POST['estado'];

                            $controller = new clsReserva();
                            $controller->editarReservaAdmin($id, $idcliente, $idmaquinaria, $idcotize, $idempleado, $fechareserva, $fechainicio, $fechafin, $estado);

                            header('Location: admin.php?action=MenuReserva');
                            exit;
                        }
                    } else {
                        if (isset($_GET['idreserva'])) {
                            require_once("CONTROLLER/ReservaController.php");
                            $id = $_GET['idreserva'];
                            $controller = new clsReserva();
                            $controller->mostrarFormularioEditar($id);
                        }
                    }
                    break;

                case 'buscarReserva':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if (isset($_GET['termino'])) {
                            $termino = $_GET['termino'];
                            require_once("CONTROLLER/ReservaController.php");
                            $controller = new clsReserva();
                            $controller->buscarReservaAdmin($termino);
                        }
                    } else {
                        require_once("VIEW/RESERVA/buscar.php");
                    }
                    break;

                /*
                Seccion Maquinaria Admin 
                =============================================
                */

                case 'MenuMaquinaria':
                    require_once("CONTROLLER/MaquinariaController.php");
                    $controller = new clsMaquinaria();
                    $controller->listarMaquinariaAdmin();
                    break;
                case 'agregarMaquinaria':
		            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require_once("CONTROLLER/MaquinariaController.php");
                    
                    $numserie = $_POST['numserie'];
                    $nombre = $_POST['nombre'];
                    $marca = $_POST['marca'];
                    $modelo = $_POST['modelo'];
                    $costoh = floatval($_POST['costoh']);


                    $imagenprincipal = basename($_FILES['imagenprincipal']['name']);
                    $nombre_unico = uniqid() . '_' . $nombre_archivo;
                    $ruta_archivo = 'IMAGENES/' . $nombre_unico;
                    if (move_uploaded_file($_FILES['imagenprincipal']['tmp_name'], $ruta_archivo)) {
                        $imagenprincipal = $nombre_unico;
                    } else {
                        echo "<p>Error al cargar la imagen.</p>";
                    }

                    $controller = new clsMaquinaria();
                    $controller->agregarMaquinariaAdmin($numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal);

                    header('Location: admin.php?action=MenuMaquinaria');
                    exit;
                    } else {
                    require_once("VIEW/MAQUINARIA/agregar.php");
                    }
                break;
                case 'eliminarMaquinaria':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idmaquinaria'])) {
                            require_once("CONTROLLER/MaquinariaController.php");
                            $id = $_GET['idmaquinaria'];
                            $controller = new clsMaquinaria();
                            $controller->eliminarMaquinariaAdmin($id);
                            header('Location: admin.php?action=MenuMaquinaria');
                            exit;
                        }
                    } else {
                        require_once("VIEW/MAQUINARIA/eliminar.php");
                    }
                    break;
                case 'editarMaquinaria':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idmaquinaria'])) {
                            require_once("CONTROLLER/MaquinariaController.php");
                            $id = $_GET['idmaquinaria'];
                            $numserie = $_POST['numserie'];
                            $nombre = $_POST['nombre'];
                            $marca = $_POST['marca'];
                            $modelo = $_POST['modelo'];
                            $costoh = floatval($_POST['costoh']);
                            
                            // Manejo de la imagen principal
                            $imagenprincipal = '';
                            if (!empty($_FILES['imagenprincipal']['name'])) {
                                $nombre_archivo = basename($_FILES['imagenprincipal']['name']);
                                $nombre_unico = uniqid() . '_' . $nombre_archivo;
                                $ruta_archivo = 'IMAGENES/' . $nombre_unico;
                                if (move_uploaded_file($_FILES['imagenprincipal']['tmp_name'], $ruta_archivo)) {
                                    $imagenprincipal = $nombre_unico;
                                } else {
                                    echo "<p>Error al cargar la imagen.</p>";
                                }
                            } else {
                                // Mantener la imagen anterior si no se ha cargado una nueva
                                $imagenprincipal = $_POST['imagen_actual'];
                            }

                            $controller = new clsMaquinaria();
                            $controller->editarMaquinariaAdmin($id, $numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal);

                            header('Location: admin.php?action=MenuMaquinaria');
                            exit;
                        }
                    } else {
                        if (isset($_GET['idmaquinaria'])) {
                            require_once("CONTROLLER/MaquinariaController.php");
                            $id = $_GET['idmaquinaria'];
                            $controller = new clsMaquinaria();
                            $controller->mostrarFormularioEditar($id);
                        }
                    }
                    break;
                case 'buscarMaquinaria':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if (isset($_GET['termino'])) {
                            $termino = $_GET['termino'];
                            require_once("CONTROLLER/MaquinariaController.php");
                            $controller = new clsMaquinaria();
                            $controller->buscarMaquinariaAdmin($termino);
                        }
                    } else {
                        require_once("VIEW/MAQUINARIA/buscar.php");
                    }
                    break;

                /*
                Seccion Modelo 3D Admin 
                =============================================
                */
    
                case 'MenuModelo3D':
                    require_once("CONTROLLER/DetalleMaquinariaController.php");
                    $controller = new clsDetalleMaquinariaController();
                    $controller->listarDetalleMaquinariaAdmin();
                    break;
                
                case 'editarDetalleMaquinaria':
                    require_once("CONTROLLER/DetalleMaquinariaController.php");
                    $controller = new clsDetalleMaquinariaController();
                    if (isset($_GET['id'])) {
                        $controller->mostrarFormularioEdicion($_GET['id']);
                    }
                    break;
                
                case 'actualizarDetalleMaquinaria':
                    require_once("CONTROLLER/DetalleMaquinariaController.php");
                    $controller = new clsDetalleMaquinariaController();
                    if (isset($_POST['id'])) {
                        $controller->actualizarDetalle($_POST);
                    }
                    break;
                
                case 'mostrarFormularioEliminar':
                    require_once("CONTROLLER/DetalleMaquinariaController.php");
                    $controller = new clsDetalleMaquinariaController();
                    if (isset($_GET['id'])) {
                        $controller->mostrarFormularioEliminar($_GET['id']);
                    }
                    break;
                
                case 'eliminarDetalleMaquinaria':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $id = $_POST['id'] ?? null;
                        if ($id !== null) {
                            require_once("CONTROLLER/DetalleMaquinariaController.php");
                            $controller = new clsDetalleMaquinariaController();
                            $controller->eliminarDetalle($id);
                        }
                    }
                    break;

                
                /*
                Seccion Reserva Admin 
                =============================================
                */


                /*
                Seccion Mantenimiento Admin 
                =============================================
                */
                case 'MenuMantenimiento':
                    require_once("CONTROLLER/MantenimientoController.php");
                    $controller = new clsMantenimiento();
                    $controller->listarMantenimientoAdmin();
                    break;
                case 'agregarMantenimiento':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require_once("CONTROLLER/MantenimientoController.php");
                        
                        $idmaquinaria = $_POST['idmaquinaria'];
                        $fecha = $_POST['fecha'];
                        $descripcion = $_POST['descripcion'];
                        $costopro = floatval($_POST['costopro']);
                        $idempleado = $_POST['idempleado'];
                        $estado = $_POST['estado'];
                        $tipo = $_POST['tipo'];

                        $controller = new clsMantenimiento();
                        $controller->agregarMantenimientoAdmin($idmaquinaria, $fecha, $descripcion, $costopro, $idempleado, $estado, $tipo);

                        header('Location: admin.php?action=MenuMantenimiento');
                        exit;
                    } else {
                        require_once("VIEW/MANTENIMIENTO/agregar.php");
                    }
                    break;
                case 'eliminarMantenimiento':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idmantenimiento'])) {
                            require_once("CONTROLLER/MantenimientoController.php");
                            $idmantenimiento = $_GET['idmantenimiento'];
                            $controller = new clsMantenimiento();
                            $controller->eliminarMantenimientoAdmin($idmantenimiento);
                            header('Location: admin.php?action=MenuMantenimiento');
                            exit;
                        }
                    } else {
                        require_once("VIEW/MANTENIMIENTO/eliminar.php");
                    }
                    break;
                case 'editarMantenimiento':
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_GET['idmantenimiento'])) {
                            require_once("CONTROLLER/MantenimientoController.php");
                            $id = $_GET['idmantenimiento'];
                            $idmaquinaria = $_POST['idmaquinaria'];
                            $fecha = $_POST['fecha'];
                            $descripcion = $_POST['descripcion'];
                            $costopro = floatval($_POST['costopro']);
                            $idempleado = $_POST['idempleado'];
                            $estado = $_POST['estado'];
                            $tipo = $_POST['tipo'];

                            $controller = new clsMantenimiento();
                            $controller->editarMantenimientoAdmin($id, $idmaquinaria, $fecha, $descripcion, $costopro, $idempleado, $estado, $tipo);

                            header('Location: admin.php?action=MenuMantenimiento');
                            exit;
                        }
                    } else {
                        if (isset($_GET['idmantenimiento'])) {
                            require_once("CONTROLLER/MantenimientoController.php");
                            $id = $_GET['idmantenimiento'];
                            $controller = new clsMantenimiento();
                            $controller->mostrarFormularioEditar($id);
                        }
                    }
                    break;
                case 'buscarMantenimiento':
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        if (isset($_GET['termino'])) {
                            $termino = $_GET['termino'];
                            require_once("CONTROLLER/MantenimientoController.php");
                            $controller = new clsMantenimiento();
                            $controller->buscarMantenimientoAdmin($termino);
                        }
                    } else {
                        require_once("VIEW/MANTENIMIENTO/buscar.php");
                    }
                    break;
                default:
                    require_once("VIEW/ADMIN/home.php");
                    break;
            }
            ?>
    </main>
    <script src="CSS/sidebar.js"></script>
</body>
</html>

