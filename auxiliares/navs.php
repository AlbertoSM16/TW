<?php

function navAnonimo(){
  echo '  <nav class="hidden lg:flex px-10 flex-col relative">
    <ul class="flex">
        <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
        <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
    </ul>

    <section class="lg:top-14 right-14 color-gris-crema font-bold absolute hidden md:block">
        
            <button class="bg-color-azul-marino py-2 px-4 rounded border-white border-2 animate-pulse"><a href="SignIn.php">Iniciar Sesión</a></button>
         
   </section>

   </nav>';
}

function navRecepcionista(){


    echo '<nav class="hidden lg:flex px-10 flex-col">
            <ul class="flex h-full justify-center items-center">
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-2xl color-dorado ">Gestionar Reservas</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="usuarios.php" class="p-6 text-2xl color-dorado ">Gestionar Clientes</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-2xl color-dorado ">Gestionar Habitaciones</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-2xl color-dorado ">Servicios</a></li>
                <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="datosUsuario.php" class="px-6 text-2xl color-dorado "><i class="animate-pulse fa-solid fa-user"></i><p class="px-2 inline">'. $_SESSION['datosUsuario']['nombre'].'</p></a></li>            
            </ul>     
        </nav>';
}

function navCliente(){
    
  echo '<nav class="hidden lg:flex px-10 flex-col relative ">
  <ul class="flex h-full justify-center items-center">
      <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="reservas.php" class="p-6 text-2xl color-dorado ">Gestionar Reservas</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="usuarios.php" class="p-6 text-2xl color-dorado ">Gestionar Clientes</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="habitaciones.php" class="p-6 text-2xl color-dorado ">Gestionar Habitaciones</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="servicios.php" class="p-6 text-2xl color-dorado ">Servicios</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105"><a href="datosUsuario.php" class="px-6 text-2xl color-dorado "><i class="animate-pulse fa-solid fa-user"></i>'. '<p class="px-2">'. $_SESSION['datosUsuario']['nombre'].'</p></li>            
  </ul>
</nav>';

}

function navAnonimoMovil(){
    echo '<nav id="menuMovil" class="transition-transform duration-1000 fixed left-0 w-full z-50 bg-color-gris-crema flex flex-col translate-x-full lg:hidden">
      <ul class="flex flex-col">
        <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
        <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
        <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6">
            <section class="lg:top-14 right-14 color-gris-crema font-bold absolute block">  
            <button class="bg-color-azul-marino py-2 px-4 rounded border-white border-2 animate-pulse"><a href="SignIn.php">Iniciar Sesión</a></button>    
            
        </li>
      </ul>
     </nav>';
  }
  
  function navRecepcionistaMovil(){
  
     echo '<nav id="menuMovil" class="transition-transform duration-1000 fixed left-0 w-full z-50 bg-color-gris-crema flex flex-col translate-x-full lg:hidden">
     <ul class="flex flex-col">
       <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Gestionar Reservas</a></li>
       <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="usuarios.php" class="p-6 text-3xl color-dorado ">Gestionar Clientes</a></li>
       <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="habitaciones.php" class="p-6 text-3xl color-dorado ">Gestionar Habitaciones</a></li>
       <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
       <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="datosUsuario.php" class="p-6 text-3xl color-dorado "><i class="animate-pulse fa-solid fa-user"></i>'.'<p class="px-2 inline">'.$_SESSION['datosUsuario']['nombre'].'</p></a>'. '</li>
     </ul>
    </nav>';
  }
  
  function navClienteMovil(){
  
    echo '<nav id="menuMovil" class="transition-transform duration-1000 fixed left-0 w-full z-50 bg-color-gris-crema flex flex-col translate-x-full lg:hidden">
    <ul class="flex flex-col">
      <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="reservas.php" class="p-6 text-3xl color-dorado ">Reservar habitación</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="usuarios.php" class="p-6 text-3xl color-dorado ">Habitaciones</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="servicios.php" class="p-6 text-3xl color-dorado ">Servicios</a></li>
      <li class=" h-full relative transition-transform duration-500 hover:scale-105 p-6"><a href="datosUsuario.php" class="p-6 text-3xl color-dorado "><i class="animate-pulse fa-solid fa-user"></i>'.'<p class="px-2 inline">'.$_SESSION['datosUsuario']['nombre'].'</p></a>'. '</li>
    </ul>
   </nav>';
  }