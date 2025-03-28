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
        require './backend/CrudAdmin.php';
        if(!esAdministrador()){
            echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }
       echo'<main class="pt-36 md:pt-56 lg:p-0">';
        mostrarLogs();
    ?>  
    
    </main>
    
    <?php require_once './auxiliares/footer.php'?>
</body>

</html>