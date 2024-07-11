<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cotización</title>
    <style>
        .error {
            border-color: red;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            justify-content: center;
            align-items: center;
        }

        .overlay-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <h2>Formulario de Cotización</h2>
    <form action="CONTROLLER/CoticeController.php" method="POST" id="formCotizacion">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br>

        <label for="iddocumento">Tipo de documento:</label><br>
        <select id="iddocumento" name="iddocumento" required>
            <option value="" disabled selected>Seleccione un tipo de documento</option>
            <option value="1">DNI</option>
            <option value="2">RUC</option>
        </select><br>

        <label for="documento">Número de documento:</label><br>
        <input type="text" id="documento" name="documento" required><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono" maxlength="9" required><br>

        <a href="#" id="mostrarTerminos">Ver Términos y Condiciones</a><br>

        <input type="checkbox" id="terminos" name="terminos" required>
        <label for="terminos">Acepto los Términos y Condiciones</label><br>

        <input type="submit" value="Enviar">
    </form>

    <div class="overlay" id="overlay">
        <div class="overlay-content">
            <h2>Términos y Condiciones</h2>
            <p>
                Estos términos y condiciones describen las reglas y regulaciones para el uso de nuestro servicio y la protección de sus datos personales. 
                <br><br>
                <strong>Uso de Datos:</strong> La información recopilada se utilizará únicamente con el propósito de brindarle el servicio solicitado. No utilizaremos sus datos para otros fines sin su permiso explícito.
                <br><br>
                <strong>Contacto:</strong> Si tiene alguna pregunta o inquietud sobre estos términos y condiciones, por favor contáctenos.
            </p>
            <button id="acepto">Acepto</button>
            <button id="noAcepto">No Acepto</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const idDocumentoSelect = document.getElementById('iddocumento');
            const documentoInput = document.getElementById('documento');
            const formCotizacion = document.getElementById('formCotizacion');
            const mostrarTerminos = document.getElementById('mostrarTerminos');
            const overlay = document.getElementById('overlay');
            const aceptoBtn = document.getElementById('acepto');
            const noAceptoBtn = document.getElementById('noAcepto');
            const checkboxTerminos = document.getElementById('terminos');
            const telefonoInput = document.getElementById('telefono');
            const correoInput = document.getElementById('correo');

            idDocumentoSelect.addEventListener('change', () => {
                validarDocumento();
            });

            documentoInput.addEventListener('input', () => {
                validarDocumento();
            });

            formCotizacion.addEventListener('submit', (event) => {
                if (!validarDocumento()) {
                    event.preventDefault();
                    alert("Por favor, corrija los errores en el formulario.");
                }
            });

            telefonoInput.addEventListener('input', (event) => {
                const value = event.target.value;
                event.target.value = value.replace(/[^0-9]/g, '');
            });

            function validarDocumento() {
                const tipoDocumento = idDocumentoSelect.value;
                const documento = documentoInput.value;

                let isValid = true;
                documentoInput.classList.remove('error');

                if (tipoDocumento === "1") {
                    documentoInput.maxLength = 8;
                    if (documento.length !== 8) {
                        isValid = false;
                    }
                } else if (tipoDocumento === "2") {
                    documentoInput.maxLength = 11;
                    if (documento.length !== 11) {
                        isValid = false;
                    }
                }

                if (!isValid) {
                    documentoInput.classList.add('error');
                }

                return isValid;
            }

            documentoInput.addEventListener('keypress', (event) => {
                if (!/^\d$/.test(event.key)) {
                    event.preventDefault();
                }
            });

            mostrarTerminos.addEventListener('click', (event) => {
                event.preventDefault();
                overlay.style.display = 'flex';
            });

            aceptoBtn.addEventListener('click', () => {
                checkboxTerminos.checked = true;
                overlay.style.display = 'none';
            });

            noAceptoBtn.addEventListener('click', () => {
                checkboxTerminos.checked = false;
                overlay.style.display = 'none';
            });

            correoInput.addEventListener('input', (event) => {
                const value = event.target.value;
                const atIndex = value.indexOf('@');
                if (atIndex !== -1 && atIndex === value.length - 1) {
                    event.target.value += 'gmail.com';
                }
            });

        });
    </script>
</body>
</html>
