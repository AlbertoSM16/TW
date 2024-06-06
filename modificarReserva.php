
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
        if(isset($_GET['id_reserva'])){
            $reserva = infoReserva($_GET['id_reserva']);
        }
    ?>
<main class ="pt-36 md:pt-56 lg:p-0">

    <section class="flex justify-center p-6">
        <form action="reservas.php" method="POST" class="w-full grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center"> 
            
            <div class="flex col-span-3 flex-col">
                <div class=' flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                    <label for="comentario">Comentario:</label><br>
                    <textarea class="mt-6 border-2 mr-6 w-11/12 lg:w-6/12 border-black color-azul-marino" value="<?= $reserva[0]['comentario'] ?>"  id="comentario" name="comentario" rows="4" cols="50"></textarea><br><br>
                </div>
                
            </div>

            <div class="text-center col-span-3 justify-center items-center   flex-col w-full lg:flex-row pt-16">
                <button type="submit" name="modificarReserva" value="<?= $_GET['id_reserva'] ?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Realizar reserva</button>
            </div>

        </form>
    </section>

</main>

    <?php require_once './auxiliares/footer.php'?>
</body>


</html>