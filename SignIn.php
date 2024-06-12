<?php
    require_once './backend/CRUDUsuarios.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $msj = usuarioRegistrado($_POST['email'], $_POST['contrasena']);

       if($msj === true){
         echo '<meta http-equiv="refresh" content="0;url=index.php?sign_in=true&email='.$_POST['email'].'">';
       }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/ejercicio14.css">
    <title>Gran Hotel</title>
    <script src="https://kit.fontawesome.com/eee8b9a576.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="p-0 m-0 overflow-x-hidden">
    <?php require_once './auxiliares/header.php'?>
    <main class="pt-36 md:pt-56 lg:p-0">
        <section class="flex justify-center p-6">
            <form action="SignIn.php" method='POST' class="w-full grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl justify-center" novalidate>
                
                <?php if(isset($msj)):?>
                    <section class="text-center col-span-3 justify-center items-center  w-full pb-10 text-red-700 text-3xl">
                        <p><?= $msj ?></p>
                    </section>
                <?php endif; ?>

                <div  class=' col-span-3 flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                    <label for="name">Email:</label>
                    <input type="text" name="email" placeholder="Escriba su email" class="mt-6 lg:mt-0 col-span-2 border-2 border-black color-azul-marino">
                </div>

                <div  class=' col-span-3 flex-col w-full lg:flex-row flex text-center  justify-between items-center '>
                    <label for="name" class="mt-6">Contraseña:</label>
                    <input type="password" name="contrasena" id="" placeholder="Escriba su contraseña" class="mt-6 col-span-2 border-2 border-black color-azul-marino">
                </div>

                <div class="text-center col-span-3 justify-center items-center  w-full pt-32">
                    <button type='submit' name="sign_in" class="text border-white border-2 p-3 bg-color-bronce-metalico rounded-full w-32 animate-pulse">Iniciar Sesion</button>
                </div>

                <section class="text-center col-span-3 justify-center items-center  w-full pt-10 text-3xl">
                    <a href="registro.php">Registrarse</a>
                </section>


            </form>
        </section>
    </main>
    <?php require_once './auxiliares/footer.php'?>
</body>

</html>