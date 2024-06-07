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
        <section class="flex justify-between items-center flex-row">
            <section data-aos="fade-up-right" class="w-1/6 h-1/6">
                <a href="index.php"><img src="img/granHotel/granHotelLogo.png" class="object-cover"></a>
            </section>
            <h1 class="text-3xl font-bold color-dorado lg:hidden">EL Gran Hotel</h1>
            <i id="barra" class="fa-solid fa-bars lg:hidden px-10 text-3xl color-dorado"></i>
        
        <?php 
            session_start();
             require_once './backend/creacionTablas.php';
             require_once './backend/CRUDUsuarios.php';
             require_once './backend/funcionesLogin.php';
             require_once './backend/CRUDReservas.php';
             require_once './backend/CrudHabitaciones.php';
             require_once 'navs.php';
             creaTablas();

                if(isset($_GET['cerrar_sesion'])){
                    cerrarSesion();
                }
                if (isset($_POST['sign_in'])) {
                    login();
                } elseif (isset($_POST['Registrarse'])) {
                    registrarUsuario();
                    login();
                    echo '<meta http-equiv="refresh" content="0;url=index.php">';
                }
                
                if(isLogged()){
                    if(esRecepcionista()){
                        navRecepcionistaMovil();
                        navRecepcionista();
                    }else if(esCliente()){
                        navClienteMovil();
                        navCliente();
                    }else{
                        navAdministrador();
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
