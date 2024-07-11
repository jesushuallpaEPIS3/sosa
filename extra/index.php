<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOSA</title>
    <link rel="icon" href="sosalogo.png" type="image/png">

</head>
<body>
    <?php
        include("VIEW/header.php");
        require_once("DB/db.php");
        
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';

        switch ($action) {
            case 'catalogo':
                require_once("CONTROLLER/MaquinariaController.php");
                clsMaquinaria::catalogoMaquinaria();
                break;
            case 'nosotros':
                require_once("VIEW/nosotros.php");
                break;
            case 'cotice': 
                require_once("CONTROLLER/CoticeController.php");
                break;
            case 'login': 
                require_once("login.php");
                break;
            case 'detalle-maquinaria':
                require_once("CONTROLLER/MaquinariaController.php");
                clsMaquinaria::detalleMaquinaria();
                break;
            case 'home':
            default:
                require_once("VIEW/home.php");
                break;
        }
    ?>
</body>
</html>
