<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menuMovil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>El Gran Hotel</title>
</head>
<body>
    <header id="header" class="fixed w-full lg:relative z-20 border-azul-marino bg-color-gris-crema">
        <section class="flex justify-between items-center">
            <section data-aos="fade-up-right" class="w-1/6 h-1/6">
                <a href="index.php"><img src="img/granHotel/granHotelLogo.png" class="object-cover"></a>
            </section>
            <h1 class="text-3xl font-bold color-dorado lg:hidden">EL Gran Hotel</h1>
            <i id="barra" class="fa-solid fa-bars lg:hidden px-10 text-3xl color-dorado"></i>

        <i class="fa-solid fa-bars lg:hidden px-10 text-3xl color-dorado"></i>
        
        <?php 
            session_start();
             require './backend/creacionTablas.php';
             require './backend/CRUDUsuarios.php';
             require './backend/funcionesLogin.php';
             require './backend/CRUDReservas.php';
             require './backend/CrudHabitaciones.php';
             require 'navs.php';
             creaTablas();

                if(isset($_POST['cerrar_sesion'])){
                    cerrarSesion();
                }
                if (isset($_POST['sign_in'])) {
                    login();
                } elseif (isset($_POST['Registrarse'])) {
                    registrarUsuario();
                    login();
                }
                
                if(isLogged()){
                    if(esRecepcionista()){
                        navRecepcionistaMovil();
                        navRecepcionista();
                    }else if(esCliente()){
                        navClienteMovil();
                        navCliente();
                    }else{
                        navAnonimoMovil();
                        navAnonimo();
                    }
                }
                if(!isLogged()){
                    navAnonimoMovil();
                    navAnonimo();
                }
            ?>
        </section>
    </header>
    <script src="js/menuMovil.js"></script>            
</body>
</html>
