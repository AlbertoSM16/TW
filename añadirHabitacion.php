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


<form action="gestionHabitaciones.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required><br><br>
        
        <label for="capacidad">Capacidad:</label>
        <input type="number" id="capacidad" name="capacidad" required><br><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
        
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="LIBRE">LIBRE</option>
            <option value="OCUPADA">OCUPADA</option>
        </select><br><br>
        <label for="fotos">Fotos:</label><br>
        <input type="file" id="fotos" name="fotos" accept="image/*" multiple required><br><br>
        
        <input type="submit" value="Agregar Habitación" name="crearHabitacion">
    </form>
    <main>
    </main>
    <?php require_once './auxiliares/footer.php'?>
</body>

</html>