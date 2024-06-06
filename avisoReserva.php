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
    
    <?php require 'auxiliares/header.php';
        if(isset($_POST['add_reserva_previa']) || isset($_POST['add_reserva_recepcion']) ){
            $reserva=insertReservaPrevia($_POST['num_pax'],$_POST['dia_entrada'],$_POST['dia_salida'],$_POST['comentario']);
            var_dump($reserva);
        }
    ?>  

    <section>
        <h2>Datos de la Tabla Reservas</h2>
        <ul>
            <li><strong>Numero de la reserva:</strong><?= $reserva[0]['id_reserva']?> </li>
            <li><strong>Dia de llegada:</strong><?= $reserva[0]['dia_entrada']?></li>
            <li><strong>Dia de salida:</strong><?= $reserva[0]['dia_salida']?> </li>
            <li><strong>Número de personas:</strong> <?= $reserva[0]['num_pax']?></li>
        </ul>

    </section>

    <section>

        <form action="index.php" method="POST" class="w-full grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center"> 
            <button type="submit" name="confirmarReserva" value="<?= $reserva[0]["id_reserva"]?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Confirmar</button>
        </form>

    </section>

    <section>

        <form action="index.php" method="POST" class="w-full grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center"> 
            <a><button type="submit" name="rechazarReserva" value="<?= $reserva[0]["id_reserva"]?>" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse" id="boton">Rechazar</button></a>
        </form>

    </section>




<main>

</main>

<?php require_once './auxiliares/footer.php'?>
</body>
</html>