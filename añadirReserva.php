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
    <?php
    require_once './auxiliares/header.php';

    ?>
<main>
<form action="aceptarReserva.php" method="post">
        
        <label for="num_pax">Numero de personas:</label>
        <input type="number" id="num_pax" name="num_pax" required><br><br>
        
        <label for="dia_entrada">Día de Entrada:</label>
        <input type="date" id="dia_entrada" name="dia_entrada" required><br><br>
        
        <label for="dia_salida">Día de Salida:</label>
        <input type="date" id="dia_salida" name="dia_salida" required><br><br>
        
        <label for="num_pax">Número de Personas:</label>
        <input type="number" id="num_pax" name="num_pax" required><br><br>
        
        <label for="comentario">Comentario:</label><br>
        <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Realizar Reserva" name="add_reserva">
    </form>
</main>

    <?php require_once './auxiliares/footer.php'?>
</body>

</html>