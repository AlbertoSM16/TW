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
            <form action="" class="grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl">
                <label for="name" class="col-span-1 pr-3">Nombre:</label>
                <input type="text" name="" placeholder="Escriba su nombre" class="col-span-2 border-2 border-black color-azul-marino">

                <label for="name" class="col-span-1 pr-3 pt-6">Contraseña:</label>
                <input type="password" name="" id="" placeholder="Escriba su contraseña" class="mt-6 col-span-2 border-2 border-black color-azul-marino">

                <label for="name" class=" pr-3 pt-6">Repetir contraseña:</label>
                <input type="password" name="" id="" placeholder="Repite la contraseña" class="mt-6 col-span-2 border-2 border-black color-azul-marino">

                <label for="name" class="col-span-1 pr-3 pt-6">Email:</label>
                <input type="text" name="" placeholder="Escriba su email" class="mt-6 col-span-2 border-2 border-black color-azul-marino">

                <div class="text-center col-span-3 justify-center items-center  w-full pt-32">
                    <button type="submit" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse">Enviar</button>
                </div>
            </form>
        </section>
    </main>

    <?php require_once './auxiliares/footer.php'?>

</body>
</html>