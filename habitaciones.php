<?php
    require './backend/CrudHabitaciones.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_FILES['filesToUpload'])) {
            $num_files = count($_FILES['filesToUpload']['name']);
            insertar_habitacion($_POST['nombre'], $_POST['precio'], $_POST['capacidad'], $_POST['descripcion'], 'LIBRE', $num_files);
                  
        }
    }
?>


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
                
                <?php 

                    
                    if(isset($_GET['pax'])){
                        $pax=(int)$_GET['pax'];
                        filtrarHabitaciones($pax);   
                    }else{
                        mostrarHabitaciones();
                    }


                ?>

    
            </section>
            
            <aside class="lg:w-1/6 lg:fixed lg:right-0 z-0">
                <ul class="p-6 color-azul-marino">
                    <?php if(esRecepcionista()): ?>
                        <li class="font-bold text-xl pt-3"><a href="./registro_habitaciones.php">Registrar habitación</a></li>
                    <?php endif;?>
                    <li class="font-bold text-xl">Camas
                        <ul class="font-normal text-lg ml-6">
                            <li><a href="habitaciones.php?pax=2" >Doble Estandar</a></li>
                            <li><a href="habitaciones.php?pax=3" >Suites</a></li>
                            <li><a href="habitaciones.php?pax=1">Individuales</a></li>
                        </ul>
                    </li>
                    
                
                </ul>
            </aside>
        </section>
    </main>

    <?php require_once './auxiliares/footer.php'?>

</body>
</html>