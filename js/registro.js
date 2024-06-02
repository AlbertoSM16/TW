console.log("hola");

document.addEventListener('DOMContentLoaded', function () {
    const errores = document.getElementsByName('error');
    const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
    const boton = document.getElementById('boton');

    // Inicialmente deshabilitar el botón de enviar
    boton.disabled = true;

    inputs.forEach((input, index) => {
        input.addEventListener('blur', function () {
            validarInput(input, errores[index]);
            validarFormulario();
        });
    });

    function validarInput(input, errorElem) {
        let valor = input.value;
        let esValido = false;
        const contrasena = document.getElementById('contrasena').value;

        switch (input.placeholder) {
            case "Escriba su nombre":
                esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                break;

            case "Escriba su contraseña":
                esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                break;

            case "Repite la contraseña":
                esValido = (valor === contrasena);
                break;

            case "Escriba su email":
                esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor);
                break;

            case "Escriba su DNI":
                esValido = /^[0-9]{8}[A-Za-z]$/.test(valor);
                break;

            case "Escriba su Tarjeta de credito":
                esValido = /^[0-9]{16}$/.test(valor);
                break;

            default:
                esValido = valor.trim() !== "";
        }

        if (esValido) {
            errorElem.classList.add('hidden');
        } else {
            errorElem.classList.remove('hidden');
        }
    }

    function validarFormulario() {
        let formularioValido = true;

        inputs.forEach((input, index) => {
            let valor = input.value;
            let esValido = false;
            const contrasena = document.getElementById('contrasena').value;
    
            switch (input.placeholder) {
                case "Escriba su nombre":
                    esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                    break;
    
                case "Escriba su contraseña":
                    esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                    break;
    
                case "Repite la contraseña":
                    esValido = (valor === contrasena);
                    break;
    
                case "Escriba su email":
                    esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor);
                    break;
    
                case "Escriba su DNI":
                    esValido = /^[0-9]{8}[A-Za-z]$/.test(valor);
                    break;
    
                case "Escriba su Tarjeta de credito":
                    esValido = /^[0-9]{16}$/.test(valor);
                    break;
    
                default:
                    esValido = valor.trim() !== "";
            }    

            if (!esValido) {
                formularioValido = false;
            }
        });

        boton.disabled = !formularioValido;
    }
});

console.log("hola");