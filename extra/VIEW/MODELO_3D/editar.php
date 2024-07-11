<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Detalle de Maquinaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background-color: #fff;
            margin-top: 20px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Editar Detalle de Maquinaria</h1>
    <form action="admin.php?action=actualizarDetalleMaquinaria" method="POST" enctype="multipart/form-data">
        <div>
            <label>ID Detalle:</label>
            <span><?php echo $detalle['iddetalle']; ?></span>
            <input type="hidden" name="id" value="<?php echo $detalle['iddetalle']; ?>">
        </div>
        <div>
            <label>ID Maquinaria:</label>
            <span><?php echo $detalle['idmaquinaria']; ?></span>
            <input type="hidden" name="idmaquinaria" value="<?php echo $detalle['idmaquinaria']; ?>">
        </div>
        <div>
            <label for="imagen1">Imagen 1:</label>
            <input type="file" id="imagen1" name="imagen1">
            <img src="IMAGENES/<?php echo $detalle['imagen1'] ?? 'default.png'; ?>" alt="Imagen 1" width="50">
        </div>
        <div>
            <label for="imagen2">Imagen 2:</label>
            <input type="file" id="imagen2" name="imagen2">
            <img src="IMAGENES/<?php echo $detalle['imagen2'] ?? 'default.png'; ?>" alt="Imagen 2" width="50">
        </div>
        <div>
            <label for="imagen3">Imagen 3:</label>
            <input type="file" id="imagen3" name="imagen3">
            <img src="IMAGENES/<?php echo $detalle['imagen3'] ?? 'default.png'; ?>" alt="Imagen 3" width="50">
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $detalle['descripcion']; ?></textarea>
        </div>
        <div class="dropzone" id="myDropzone">
            <input type="file" name="modelo3d" style="display: none;" webkitdirectory mozdirectory msdirectory odirectory directory>
        </div>
        <div>
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#myDropzone", {
            url: "admin.php?action=actualizarDetalleMaquinaria", 
            paramName: "modelo3d",
            uploadMultiple: false,
            parallelUploads: 1,
            dictDefaultMessage: "Arrastra y suelta una carpeta aquí para subir",
            init: function() {
                this.on("success", function(file, response) {
                    console.log(response);
                });
            }
        });
    </script>
</body>
</html>
