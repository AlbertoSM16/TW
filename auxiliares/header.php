

<header class="border-azul-marino bg-color-gris-crema">

    <?php 

        require 'backend/creacionTablas.php';
        require 'backend/CRUDUsuarios.php';
        creaTablas();
        if(!isset($_POST['Registrase'])){
            registrarUsuario();
        }

?>
    <section class="flex justify-between items-center">
        <section data-aos="fade-up-right" class="w-1/6 h-1/6">
            <a  href="index.php"><img src="img/granHotel/granHotelLogo.png" class="object-cover"></a>
        </section>

        <h1 class="text-3xl font-bold color-dorado lg:hidden">EL Gran Hotel</h1>

        <i class="fa-solid fa-bars lg:hidden px-10 text-3xl color-dorado"></i>

        <nav class="hidden lg:flex px-10 flex-col relative">
            <ul class="flex">
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Reservas</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
            </ul>

            <section class="lg:top-14 right-14 color-gris-crema font-bold absolute hidden md:block">
                <?php if(!isset($esta_en_sesion)):?>
                    <button class="bg-color-azul-marino py-2 px-4 rounded border-white border-2 animate-pulse"><a href="sesion.php">Iniciar Sesión</a></button>
                <?php endif;?>
            </section>

        </nav>
        
    </section>

</header>