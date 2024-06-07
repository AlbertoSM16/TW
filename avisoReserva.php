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
    
    <?php require 'auxiliares/header.php';
        if(!isset($_POST['add_reserva_previa']) || isset($_POST['add_reserva_recepcion'])){
            echo '<meta http-equiv="refresh" content="0;url=index.php">';

        }
        if(isset($_POST['add_reserva_previa']) || isset($_POST['add_reserva_recepcion']) ){
            $reserva=insertReservaPrevia($_POST['num_pax'],$_POST['dia_entrada'],$_POST['dia_salida'],$_POST['comentario']);
        }
    ?>  
    
<main class="pt-36 md:pt-56 lg:p-0">
    <section class="flex w-full justify-center items-center flex-col">
        <h2 class="font-bold text-5xl color-azul-marino mb-6">Datos de su reserva</h2>
        <ul class="p-2">
            <li id="id_reserva" class="hidden"><?= $reserva[0]['id_reserva']?></li>
            <li  class="p-6 text-2xl"><strong>Numero de la reserva: </strong><?= $reserva[0]['id_reserva']?> </li>
            <li class="p-6 text-2xl"><strong>Dia de llegada: </strong><?= $reserva[0]['dia_entrada']?></li>
            <li class="p-6 text-2xl"><strong>Dia de salida: </strong><?= $reserva[0]['dia_salida']?> </li>
            <li class="p-6 text-2xl"><strong>Número de personas: </strong> <?= $reserva[0]['num_pax']?></li>
        </ul>

    </section>

    <section class="flex flex-col lg:flex-row p-10 w-full justify-center items-center">

        <form action="index.php" method="POST" class="m-6 text-center bg-color-azul-marino color-gris-crema font-bold p-10 rounded-3xl justify-center"> 
            <button type="submit" name="confirmarReserva" value="<?= $reserva[0]["id_reserva"]?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Confirmar</button>
        </form>

        <form action="index.php" method="POST" class="m-6 text-center bg-color-azul-marino color-gris-crema font-bold p-10 rounded-3xl justify-center"> 
            <a><button type="submit" name="rechazarReserva" value="<?= $reserva[0]["id_reserva"]?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Rechazar</button></a>
        </form>

    </section>

</main>

<?php require_once './auxiliares/footer.php'?>
<script src="js/tiempo.js" defer></script>
</body>
</html>