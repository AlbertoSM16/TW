
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

    
    if(isset($_POST['confirmarReserva'])){
        confirmarReserva($_POST['confirmarReserva']);
    }
    if(isset($_POST['rechazarReserva'])){

        eliminarReserva($_POST['rechazarReserva']);
    }
    ?>
    <main class ="pt-36 md:pt-56 lg:p-0">
        <section class="flex flex-wrap justify-center md:justify-between p-6">
            <div data-aos="fade-right" class="md:w-4/6 text-xl md:px-16 lg:px-32 lg:justify-center lg:text-center lg:items-center flex">
                <p>Descubre el lujo y la serenidad en el Gran Hotel. Ubicado en el vibrante corazón de la ciudad, te invitamos a disfrutar de una estadía inolvidable con servicios de primera clase, comodidades de lujo y una atención excepcional. Reserva ahora para vivir el encanto y la elegancia que solo el Gran Hotel puede ofrecer.</p>
            </div>
            <figure data-aos="fade-left" class=" mt-8 md:block md:w-2/6 md:mt-0">
                <img src="img/granHotel/granhotelaspecto.png" alt="" class="object-cover">
            </figure>
        </section>

        <h2 class="md:hidden font-bold text-3xl text-center mt-6">Algunas Habitaciones</h2>
        
        <section data-aos="zoom-out" class="fondo-gradiente grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-10 w-full gap-10 p-3">
            <figure class="text-center bg-color-bronce-metalico rounded-sm">
                <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
            </figure>

            <figure class="text-center bg-color-bronce-metalico rounded-sm">
                <img src="img/granHotel/habitacion2.jpg" alt="" class="p-3">
                <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 2</figcaption>
            </figure>

            <figure class="text-center bg-color-bronce-metalico rounded-sm">
                <img src="img/granHotel/habitacion3.jpg" alt="" class="p-3">
                <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 3</figcaption>
            </figure>
        </section>

    </main>
    
    <?php require_once './auxiliares/footer.php'?>
</body>

</html>