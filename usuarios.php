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
    
    <?php require 'auxiliares/header.php' ?>

<main class ="pt-36 md:pt-44 lg:p-0">
    <section class="flex flex-col-reverse lg:flex-row">
        <?php
            if(esCliente()){
                echo '<meta http-equiv="refresh" content="0;url=index.php">';
            }
            if(isset($_GET['elimiar_id_usuario'])){
                deleteClient($_GET['elimiar_id_usuario']);
            }
            if(isset($_POST['modificarACliente'])){
               
                modificarUsuario((int)$_POST['modificarACliente']);
            }
            if(isset($_POST['añadirUsuario'])){
                registrarUsuario();
            }
        ?>
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 bg-red-200 lg:w-5/6 overflow-y-auto fondo-gradiente">
            <?php if(isset($_GET['rol'])):?>
                <section>
                    <?php 
                    $rol = $_GET['rol'];
                    filtrarUsuarios($rol);
                    ?>
                </section>
            <?php else:?>
                
                <?php
                    if($_SESSION['datosUsuario']['rol'] === "administrador"){
                        mostrarUsuarios(); 
                    }else{
                        mostrarClientes();
                    }    
                ?>
           
            <?php endif; ?>
        </div>


        <aside class="lg:w-1/6 lg:fixed lg:right-0 z-0">
                <ul class="p-6 color-azul-marino">
                    <?php if(!esCliente()): ?>
                        <li class="font-bold text-xl pt-3"><a href="añadirUsuario.php">Añadir Usuario</a></li>
                    <?php endif;?>
                    <?php  if($_SESSION['datosUsuario']['rol']==='administrador'){
                        echo '<li class="font-bold text-xl">Filtrado de usuarios
                        <ul class="font-normal text-lg ml-6">
                            <li><a href="usuarios.php?rol=cliente" >Clientes</a></li>
                            <li><a href="usuarios.php?rol=administrador" >Administradores</a></li>
                            <li><a href="usuarios.php?rol=recepcionista">Recepcionistas</a></li>
                        </ul>
                    </li>';
                    }
                    ?>
                    
                </ul>
        </aside>
    </section>

</main>

<?php require_once './auxiliares/footer.php'?>
</body>
</html>