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
    <title>Gran Hotel</title>
</head>

<body class="p-0 m-0">
    
    <?php require_once 'auxiliares/header.php' ?>

    <main>
    <h2>Formulario de Registro de Usuario</h2>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" maxlength="9" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" minlength="5" required><br><br>

        <label for="tarjeta_credito">Tarjeta de Crédito:</label><br>
        <input type="text" id="tarjeta_credito" name="tarjeta_credito" maxlength="16" required><br><br>

        <input type="submit" value="Registrarse" name="Registrarse">
    </form>
    </main>

    <?php require_once './auxiliares/footer.php'?>

</body>
</html>