
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
    
    <?php require_once 'auxiliares/header.php' ?>

    <main class="flex justify-center w-full pt-36 md:pt-44 lg:p-0"">
        <div class="lg:w-3/6 p-6">
            <section data-aos="fade-left" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <img src="img/granHotel/servicios/recepcion.png" alt="" class="object-cover">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Recepción 24 H</h2>
                </div>
            </section >

            <section data-aos="fade-right" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Parking gratuito</h2>
                </div>
                <img src="img/granHotel/servicios/parking.png" alt="" class="object-cover">
            </section>

            <section data-aos="fade-left" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <img src="img/granHotel/servicios/restaurante.png" alt="" class="object-cover">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Restaurante dentro del hotel</h2>
                </div>
            </section>

            <section data-aos="fade-right" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Spa y piscina aclimatadas</h2>
                </div>
                <img src="img/granHotel/servicios/spa.png" alt="" class="object-cover">
            </section>

            <section data-aos="fade-left" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <img src="img/granHotel/servicios/gimnasio.png" alt="" class="object-cover">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Gimnasio y zona de deportes</h2>
                </div>
            </section>

            <section data-aos="fade-right" class="flex justify-between h-64 bg-color-azul-marino mt-20 p-5 color-gris-crema">
                <div class="flex items-center text-3xl font-bold">
                    <h2>Servicio de habitaciones</h2>
                </div>
                <img src="img/granHotel/servicios/servicioHabitaciones.png" alt="" class="object-cover">
            </section>
        </div>
    </main>

    <?php require_once './auxiliares/footer.php'?>
</body>

</html>