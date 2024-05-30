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
<body class="p-0 m-0">
    
    <?php require_once 'auxiliares/header.php'?>
    
    <main>
        <section class="flex flex-col-reverse lg:flex-row">
            
            <section class="lg:w-5/6 grid grid-cols-2 md:grid-cols-3 gap-6 p-6">
                
                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>
     
                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>

                <figure class="text-center bg-color-bronce-metalico rounded-sm">
                    <img src="img/granHotel/habitacion1.png" alt="" class="p-3">
                    <figcaption class="p-3 color-azul-marino font-bold text-xl">Habitación 1</figcaption>
                </figure>
    
            </section>
            
            <aside class="lg:w-1/6 lg:fixed lg:right-0 z-0">
                <ul class="p-6 color-azul-marino">
                    <li class="font-bold text-xl">Camas
                        <ul class="font-normal text-lg ml-6">
                            <li><a href="">De matrimonio</a></li>
                            <li><a href="">Individuales</a></li>
                        </ul>
                    </li>
                    
                    <li class="font-bold text-xl pt-3">Partes del hogar
                        <ul class="font-normal text-lg ml-6 ">
                            <li><a href="">Con cocina</a></li>
                            <li><a href="">Con dos baños</a></li>
                        </ul>
                    </li> 
                </ul>
            </aside>
        </section>
    </main>

    <?php require_once './auxiliares/footer.php'?>

</body>
</html>