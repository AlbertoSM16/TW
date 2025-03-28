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
<body class="p-0 m-0">
    
    <?php require_once 'auxiliares/header.php' ;?>
    <?php
        if(esCliente()){
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }
        if(isset($_GET['id_usuario_recepcionista'])){
            $user=infoUsuario($_GET['id_usuario_recepcionista']);
        }
    ?>

    <main class="pt-36 md:pt-56 lg:p-0">
        <section class="flex justify-center p-6">
            <form action="usuarios.php" method="POST" class="grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center" novalidate>
                
        
                <div class="flex col-span-3 flex-col">
                    <div class="w-full flex text-center  justify-between items-center ">
                        <label for="nombre" class=" pr-3">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" value="<?= $user[0]['nombre']?>" class="border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">El nombre no puede estar vacío</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class="w-full flex text-center  justify-between items-center">
                        <label for="apellidos" class=" pr-3 pt-6">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?=  $user[0]['apellidos']?>" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Los apellidos no pueden estar vacíos</p>
                    </div>
                </div>
            
                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="email" class=" pr-3 pt-6">Email:</label>
                        <input type="text" name="email" id="email" placeholder="Escriba su email" value="<?=  $user[0]['email']?>" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">La dirección de correo no es válida</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="dni" class=" pr-3 pt-6">DNI:</label>
                        <input type="text" name="dni" id="dni"  value="<?= $user[0]['dni']?>" placeholder="Escriba su DNI" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">DNI con formato incorrecto</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="tarjeta_credito" class=" pr-3 pt-6">Tarjeta de credito:</label>
                        <input type="text" name="tarjeta_credito" id="tarjeta_credito"value="<?=  $user[0]['tarjeta_credito']?>" placeholder="Escriba su Tarjeta de credito" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden break-words" name="error">La tarjeta de crédito debe ser una secuencia de 16 dígitos consecutivos</p>
                    </div>
                </div>
            <?php 
                if(esAdministrador()){

                    echo'<div class="flex col-span-3 flex-col">
                            <div class="w-full flex text-center  justify-between items-center ">
                                <label for="Rol" class=" pr-3 pt-6">Rol:</label>
                                <label for="rol">Seleccione un rol:</label>
                                <select id="rol" name="rol" required>
                                    <option value="administrador">Administrado</option>
                                    <option value="cliente">Cliente</option>
                                    <option value="recepcionista">Recepcionsta</option>
                                </select>
                    </div>';
                }
                ?>
                
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden break-words" name="error">La tarjeta de crédito debe ser una secuencia de 16 dígitos consecutivos</p>
                    </div>
                </div>

                <div class="text-center col-span-3 justify-center items-center  w-full pt-16">
                    <button type="submit" name="modificarACliente" value="<?= $user[0]['id_usuario'] ?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Enviar</button>
                </div>
            </form>
        </section>
    <?php require_once './auxiliares/footer.php'?>
    
    <!-- <script defer>

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
    </script>  -->
</body>
</html>
