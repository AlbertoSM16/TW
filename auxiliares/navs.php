<?php

function navAnonimo(){
  echo '  <nav class="hidden lg:flex px-10 flex-col relative">
    <ul class="flex">
        <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Reservas</a></li>
        <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
        <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
    </ul>

    <section class="lg:top-14 right-14 color-gris-crema font-bold absolute hidden md:block">';
         if(!isset($esta_en_sesion)){
           echo ' <button class="bg-color-azul-marino py-2 px-4 rounded border-white border-2 animate-pulse"><a href="sesion.php">Iniciar Sesión</a></button>';
         }
   echo '</section>

   </nav>';
}

function navRecepcionista(){


    echo '<nav class="hidden lg:flex px-10 flex-col relative">
            <ul class="flex">
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Gestionar Reservas</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Gestionar Clientes</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Gestion Habitaciones</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
            </ul>

            <section class="lg:top-14 right-14 color-gris-crema font-bold absolute hidden md:block">
            
                
            </section>

        </nav>';
}

function navCliente(){

    echo '<nav class="hidden lg:flex px-10 flex-col relative">
            <ul class="flex">
            
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Reservar Habitación</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
            </ul>

            <section class="lg:top-14 right-14 color-gris-crema font-bold absolute hidden md:block">
                
            
                   </section>

        </nav>';
}