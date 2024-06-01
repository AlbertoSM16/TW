<!DOCTYPE html>
<html lang="es">

<!--
    Colores:
    Dorado -> #D4AF37
    Azul Marino Produndo -> #002B5C
    Gris Carbón -> #36454F
    Blanco Crema -> #F5F5DC
    Bronce Metálico -> #CD7F32
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/ejercicio14.css">
    <script src="https://kit.fontawesome.com/eee8b9a576.js" crossorigin="anonymous"></script>
    <title>Gran Hotel</title>
</head>

<body class="p-0 m-0">
    
    <?php require_once 'auxiliares/header.php' ?>

    <main>
        <section class="flex justify-center p-6">
            <form action="" class="grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center">
                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3">Nombre:</label>
                        <input type="text" name="registro" id="" placeholder="Escriba su nombre" class="border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">El nombre no puede estar vacío</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Apellidos:</label>
                        <input type="password" name="registro" id="" placeholder="Escriba sus apellidos" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">Los apellidos no pueden estar vacíos</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Contraseña:</label>
                        <input type="password" name="registro" id="" placeholder="Escriba su contraseña" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">Debe contener almenos 5 caracteres alfanuméricos</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Repetir contraseña:</label>
                        <input type="password" name="registro" id="" placeholder="Repite la contraseña" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">Las contraseñas no coinciden</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Email:</label>
                        <input type="text" name="registro" placeholder="Escriba su email" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">La dirección de correo no es válida</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">DNI:</label>
                        <input type="text" name="registro" placeholder="Escriba su DNI" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">DNI con formato incorrecto</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Tarjeta de credito:</label>
                        <input type="text" name="registro" placeholder="Escriba su Tarjeta de credito" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-full flex justify-between">
                        <p class="text-red-600 hidden" name="error">La tarjeta de crédito debe ser una secuencia de 16 dígitos consecutivos</p>
                    </div>
                </div>

                <div class="text-center col-span-3 justify-center items-center  w-full pt-16">
                    <button type="submit" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Enviar</button>
                </div>
            </form>
        </section>
    </main>

    <?php require_once './auxiliares/footer.php'?>

    <script src="./js/registro.js" defer></script>

</body>
</html>