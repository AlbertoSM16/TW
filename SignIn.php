
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

<body class="p-0 m-0">
    <?php require_once './auxiliares/header.php'?>
    <main>
        <section class="flex justify-center p-6">
            <form action="index.php" method='POST' class="grid lg:grid-cols-3 lg:w-3/6 bg-color-azul-marino color-gris-crema font-bold p-32 rounded-3xl">
                <label for="name" class="col-span-1 pr-3 pt-6">Email:</label>
                <input type="text" name="email" placeholder="Escriba su email" class="mt-6 col-span-2 border-2 border-black color-azul-marino">

                <label for="name" class="col-span-1 pr-3 pt-6">Contraseña:</label>
                <input type="password" name="contrasena" id="" placeholder="Escriba su contraseña" class="mt-6 col-span-2 border-2 border-black color-azul-marino">

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