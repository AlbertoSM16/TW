document.addEventListener('DOMContentLoaded', function () {
    const errores = document.getElementsByName('error');
    const inputs = document.getElementsByName('registro');
    const boton = document.getElementById('boton');

    boton.disabled = true;

    inputs.forEach((input, index) => {
        input.addEventListener('blur', function () {
            validarInput(input, errores[index], inputs);
            validarFormulario(inputs);
        });
    });

    function validarInput(input, errorElem, errores) {
        let valor = input.value;
        let esValido = false;
        let valorContrasenia = errores[2].value; 

        switch (input.placeholder) {
            case "Escriba su nombre":
                esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                break;

            case "Escriba su contraseña":
                esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                break;

            case "Repite la contraseña":
                esValido = (valor == valorContrasenia);
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

    function validarFormulario(errores) {
        let formularioValido = true;

        inputs.forEach((input, index) => {
            let valor = input.value;
            let esValido = false;
            let valorContrasenia = errores[2].value; 
    
            switch (input.placeholder) {
                case "Escriba su nombre":
                    esValido = /^[a-zA-Z\s]+$/.test(valor) && valor.trim() !== "";
                    break;
    
                case "Escriba su contraseña":
                    esValido = /^[a-zA-Z0-9]{5,}$/.test(valor);
                    break;
    
                case "Repite la contraseña":
                    esValido = (valor == valorContrasenia);
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


