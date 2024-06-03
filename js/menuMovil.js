
document.addEventListener('DOMContentLoaded', function() {

    const header = document.getElementById('header');
    const menuMovil = document.getElementById('menuMovil');
    const barra = document.getElementById('barra');

    var MOSTRAR = false;
    console.log("Estado inicial " + MOSTRAR);
    function mostrarMenuMovil(){
        MOSTRAR = !MOSTRAR;
        if(MOSTRAR){
            menuMovil.classList.remove('translate-x-full');
            menuMovil.classList.add('-translate-x-0')

        }
        else{
            menuMovil.classList.remove('-translate-x-0');
            menuMovil.classList.add('translate-x-full');
        }
    }

    barra.addEventListener('click', mostrarMenuMovil);



    function adjustNavHeight() {
        const headerHeight = header.offsetHeight;

        menuMovil.style.top = `${headerHeight - 1}px`;
        menuMovil.style.height = `calc(100vh - ${headerHeight}px)`;

    }

    adjustNavHeight();

    window.addEventListener('resize', adjustNavHeight);

    console.log("HOLA");
});