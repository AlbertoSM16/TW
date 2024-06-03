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
    
    <?php require 'auxiliares/header.php' ?>

<main>

<?php 
    
    if(isset($_GET['rol'])){
        $rol = $_GET['rol'];
        filtrarUsuarios($rol);
    }
    mostrarUsuarios();
?>

            <aside class="lg:w-1/6 lg:fixed lg:right-0 z-0">
                    <ul class="p-6 color-azul-marino">
                        <?php if(esRecepcionista()): ?>
                            <li class="font-bold text-xl pt-3"><a href="registro.php">Añadir Usuario</a></li>
                        <?php endif;?>
                        <li class="font-bold text-xl">Filtrado de usuarios
                            <ul class="font-normal text-lg ml-6">
                                <li><a href="usuarios.php?rol=cliente" >Clientes</a></li>
                                <li><a href="usuarios.php?rol=administrador" >Administradores</a></li>
                                <li><a href="usuarios.php?rol=recepcionista">Recepcionistas</a></li>
                            </ul>
                        </li>
                     
                    </ul>
            </aside>



</main>

<?php require_once './auxiliares/footer.php'?>
</body>
</html>