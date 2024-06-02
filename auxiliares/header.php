

<header class="border-azul-marino bg-color-gris-crema">


    <section class="flex justify-between items-center">
        <section data-aos="fade-up-right" class="w-1/6 h-1/6">
            <a  href="index.php"><img src="img/granHotel/granHotelLogo.png" class="object-cover"></a>
        </section>

        <h1 class="text-3xl font-bold color-dorado lg:hidden">EL Gran Hotel</h1>

        <i class="fa-solid fa-bars lg:hidden px-10 text-3xl color-dorado"></i>
        
        <?php 
            session_start();
             require './backend/creacionTablas.php';
             require './backend/CRUDUsuarios.php';
             require './backend/funcionesLogin.php';
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
                    navRecepcionista();
                }else if(esCliente()){
                    navCliente();
                }else{
                    navAnonimo();
                }
            }
            if(!isLogged()){
                navAnonimo();
            }
        
        ?>
       
    </section>

</header>