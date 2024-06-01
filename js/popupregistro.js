document.addEventListener('DOMContentLoaded', function () {
    const formulario = document.getElementById('miFormulario');
    const boton = document.getElementById('boton');

    boton.addEventListener('click', function (event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto
        const confirmacion = confirm('¿Estás seguro de que deseas enviar el formulario?');
        if (confirmacion) {
            formulario.submit(); // Enviar el formulario si se confirma
        }
    });
});