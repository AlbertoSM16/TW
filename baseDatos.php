
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
    require './backend/CrudAdmin.php';

    if(isset($_GET['backups'])){
        if($_GET['hacer']){
            hacerBackup('/backups/backup.sql');
        }else{
            restaurarBackup('/backups/backup.sql');
        }
    }
    if(isset($_GET['reiniciar'])){
        vaciarTablas();
    }
    

    ?>

    
    
    <main class ="pt-36 md:pt-56 lg:p-0">
        <section class="flex flex-wrap justify-center md:justify-between p-6">
        <ul class="p-6 color-azul-marino">
                <li class="font-bold text-xl pt-3"><a href="./baseDatos.php?reiniciar=1">Reiniciar Base de datos</a></li>
               <li class="font-bold text-xl">BackUps
                   <ul class="font-normal text-lg ml-6">
                       <li><a href="baseDatos.php?backup=hacer" >Hacer</a></li>
                       <li><a href="reservas.php?backup=recuperar" >Recuperar</a></li>
                   </ul>
               </li>
           </ul>
        </section>

        

    </main>
    
    <?php require_once './auxiliares/footer.php'?>
</body>

</html>