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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Gran Hotel</title>
</head>
<body class="p-0 m-0 overflow-x-hidden">
    <?php
    require_once './auxiliares/header.php';    
    ?>
    <main class="flex flex-col lg:flex-row h-screen  bg-white lg:fondo-gradiente pt-36 md:pt-36 lg:p-0">

        <aside data-aos="fade-right" class ="h-screen bg-white px-10 md:py-10 lg:py-20 color-dorado text-3xl border-azul-marino-right">
            <p class="font-bold">Hola <?=$_SESSION['datosUsuario']['nombre']; ?></p> 
            <ul class="pt-10">
                <li><a href="index.php?cerrar_sesion=true">Cerrar Sesion</a></li>
                <li class="pt-6"><a href="modificarUsuario.php">Modificar perfil</a></li>   
            </ul>
        </aside>

        <section class="flex flex-col-reverse lg:flex-row w-full lg:justify-center lg:items-center">
            <section class="lg:border-r-4 lg:border-black p-10 lg:h-3/6 lg:bg-white text-2xl flex items-center justify-start lg:justify-center color-dorado lg:color-azul-marino w-full lg:w-auto">
                <ul>
                    <li><span class="font-bold">Nombre: </span><?= $_SESSION['datosUsuario']['nombre']?></li>
                    <li class="pt-6"><span class="font-bold">Apellidos: </span><?= $_SESSION['datosUsuario']['apellidos']?></li>
                    <li class="pt-6"><span class="font-bold">DNI: </span><?= $_SESSION['datosUsuario']['dni']?></li>
                </ul>
            </section>
            <section class="p-10 lg:h-3/6 bg-color-azul-marino text-2xl flex items-center justify-start lg:justify-center color-dorado w-full lg:w-auto">
                <ul>
                    <li><span class="font-bold">Email: </span><?= $_SESSION['datosUsuario']['email']?></li>
                    <li class="pt-6"><span class="font-bold">Tarjeta: </span><?= $_SESSION['datosUsuario']['tarjeta_credito']?></li>
                </ul>
            </section>
        </section>

    </main>
    
    <?php require_once './auxiliares/footer.php'?>
</body>
</html>
