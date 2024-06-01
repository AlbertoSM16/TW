<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/ejercicio14.css">
    <script src="https://kit.fontawesome.com/eee8b9a576.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Gran Hotel</title>
</head>
<body class="p-0 m-0">
<?php require_once 'auxiliares/header.php' ?>

    <main>
        <section class="flex justify-center p-6">
            <form action="" class="grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center"  enctype="multipart/form-data">
                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="habitacion" class=" pr-3">Número de habitación:</label>
                        <input type="text" name="registro" id="" placeholder="Escriba el número de habitación" class="border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">El número de habitación tiene que ser un número entero</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Capacidad:</label>
                        <input type="text" name="registro" id="" placeholder="Escriba la capacidad de la habitación" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Capacidad no válida (tiene que ser mayor que 0 y un número entero)</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Precio por noche:</label>
                        <input type="text" name="registro" id="" placeholder="Precio de la habitación por noche" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">Precio no válido (tiene que ser un número mayor que 0)</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Descripción:</label>
                        <input type="text" name="registro" id="" placeholder="Escriba la descripción de la habitación" class="mt-6 border-2 border-black color-azul-marino">
                    </div>
                    <div class="w-64 flex justify-between">
                        <p class="text-red-600 hidden" name="error">La descripción no puede estar vacía</p>
                    </div>
                </div>

                <div class="flex col-span-3 flex-col">
                    <div class='w-full flex text-center  justify-between items-center '>
                        <label for="name" class=" pr-3 pt-6">Fotografías:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="mt-6">
                    </div>
                </div>

                <div class="text-center col-span-3 justify-center items-center  w-full pt-16">
                    <button type="submit" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Enviar</button>
                </div>
            </form>
        </section>
    </main>

    <?php require_once './auxiliares/footer.php'?>
    <script src="./js/popupregistro.js" defer></script>
    <script src="./js/registro_habitaciones.js" defer></script>
</body>
</html>