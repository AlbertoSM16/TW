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
    
    <?php require 'auxiliares/header.php' 
        if(isset($_POST['add_reserva_previa'])){
            $reserva=insertReservaPrevia($_POST['num_pax'],$_POST['dia_entrada'],$_POST['dia_salida'],$_POST['comentario']);
        }

    ?>

    <section>
        <h2>Datos de la Tabla Reservas</h2>
        <ul>
            <li><strong>Numero de la reserva:</strong><?php $reserva?> </li>
            <li><strong>Dia de llegada:</strong></li>
            <li><strong>Dia de salida:</strong> </li>
            <li><strong>Número de personas:</strong> INT NOT NULL</li>
        </ul>
    </section>
    




<main>

</main>

<?php require_once './auxiliares/footer.php'?>
</body>
</html>