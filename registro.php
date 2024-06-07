<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require_once './backend/validaciones_registro.php';

        if(isset($msj_error)){
            echo '<meta http-equiv="refresh" content="0;url=registro.php?error='.$msj_error.'">';
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/ejercicio14.css">
    <script src="https://kit.fontawesome.com/eee8b9a576.js" crossorigin="anonymous"></script>
    <title>Gran Hotel</title>

</head>
<body class="p-0 m-0 overflow-x-hidden">
    
    <?php require_once 'auxiliares/header.php' ?>

    <main class ="pt-36 md:pt-56 lg:p-0">
        <section class="flex justify-center p-6">
            <form action="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'index.php' : 'registro.php'; ?>" method="POST" class="w-full grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center" novalidate >
                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="nombre" class=" pr-3">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["nombre"] : ''; ?>" placeholder="Escriba su nombre" class=" mt-6 lg:mt-0 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">El nombre no puede estar vacío</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="apellidos" class=" pr-3 pt-6">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["apellidos"] : ''; ?>" placeholder="Escriba sus apellidos" class="mt-6 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Los apellidos no pueden estar vacíos</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="contrasena" class=" pr-3 pt-6">Contraseña:</label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Escriba su contraseña" class="mt-6 border-2 border-black color-azul-marino" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["contrasena"] : ''; ?>"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Debe contener almenos 5 caracteres alfanuméricos</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="confirmar_contrasena" class=" pr-3 pt-6">Repetir contraseña:</label>
                        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["confirmar_contrasena"] : ''; ?>" placeholder="Repite la contraseña" class="mt-6 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Las contraseñas no coinciden</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="email" class=" pr-3 pt-6">Email:</label>
                        <input type="text" name="email" id="email" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["email"] : ''; ?>"p laceholder="Escriba su email" class="mt-6 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">La dirección de correo no es válida</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="dni" class=" pr-3 pt-6">DNI:</label>
                        <input type="text" name="dni" id="dni" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["dni"] : ''; ?> " placeholder="Escriba su DNI" class="mt-6 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">DNI con formato incorrecto</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                        <label for="tarjeta_credito" class=" pr-3 pt-6">Tarjeta de credito:</label>
                        <input type="text" name="tarjeta_credito" id="tarjeta_credito" value="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST["tarjeta_credito"] : ''; ?> " placeholder="Escriba su Tarjeta de credito" class="mt-6 border-2 border-black color-azul-marino"
                        <?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'readonly' : ''; ?>>
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden break-words" name="error">La tarjeta de crédito debe ser una secuencia de 16 dígitos consecutivos</p>
                    </div>
                </div>

                <div class="text-center col-span-3 justify-center items-center  w-full pt-16">
                    <button type="submit" name="<?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'Registrarse' : 'Hola'; ?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton"><?= ($_SERVER["REQUEST_METHOD"] == "POST") ? 'Confirmar datos' : 'Enviar'; ?></button>
                </div>

                <?php if(isset($_GET['error'])):?>
                <div class="text-center col-span-3 justify-center items-center text-red-700 w-full pt-16">
                    <p><?=$_GET['error']?></p>
                </div>
                <?php endif;?>
            </form>
        </section>
    <?php require_once './auxiliares/footer.php'?>
    
    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST'): ?>
    <script defer>

        document.addEventListener('DOMContentLoaded', function () {
            const errores = document.getElementsByName('error');
            const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
            const boton = document.getElementById('boton');

            // Inicialmente deshabilitar el botón de enviar
            boton.disabled = true;

            inputs.forEach((input, index) => {
                input.addEventListener('blur', function () {
                    validarInput(input, errores[index]);
                    validarFormulario();
                });
            });

            function validarInput(input, errorElem) {
                let valor = input.value;
                let esValido = false;
                const contrasena = document.getElementById('contrasena').value;

                switch (input.placeholder) {
                    case "Escriba su nombre":
                        esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                        break;

                    case "Escriba su contraseña":
                        esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                        break;

                    case "Repite la contraseña":
                        esValido = (valor === contrasena);
                        break;

                    case "Escriba su email":
                        esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor);
                        break;

                    case "Escriba su DNI":
                        esValido = /^[0-9]{8}[A-Za-z]$/.test(valor);
                        break;

                    case "Escriba su Tarjeta de credito":
                        esValido = /^[0-9]{16}$/.test(valor);
                        break;

                    default:
                        esValido = valor.trim() !== "";
                }

                if (esValido) {
                    errorElem.classList.add('hidden');
                } else {
                    errorElem.classList.remove('hidden');
                }
            }

            function validarFormulario() {
                let formularioValido = true;

                inputs.forEach((input, index) => {
                    let valor = input.value;
                    let esValido = false;
                    const contrasena = document.getElementById('contrasena').value;
            
                    switch (input.placeholder) {
                        case "Escriba su nombre":
                            esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                            break;
            
                        case "Escriba su contraseña":
                            esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                            break;
            
                        case "Repite la contraseña":
                            esValido = (valor === contrasena);
                            break;
            
                        case "Escriba su email":
                            esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor);
                            break;
            
                        case "Escriba su DNI":
                            esValido = /^[0-9]{8}[A-Za-z]$/.test(valor);
                            break;
            
                        case "Escriba su Tarjeta de credito":
                            esValido = /^[0-9]{16}$/.test(valor);
                            break;
            
                        default:
                            esValido = valor.trim() !== "";
                    }    

                    if (!esValido) {
                        formularioValido = false;
                    }
                });

                boton.disabled = !formularioValido;
            }
        });
    </script> 
    <?php endif; ?>
</body>
</html>

