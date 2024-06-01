document.addEventListener('DOMContentLoaded', function () {
    const errores = document.getElementsByName('error');
    const inputs = document.getElementsByName('registro');
    const boton = document.getElementById('boton');

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

        switch (input.placeholder) {
            case "Escriba el número de habitación":
                esValido = /^[1-9]\d*$/.test(valor);
                break;

            case "Escriba la capacidad de la habitación":
                esValido = /^[1-9]\d*$/.test(valor);
                break;

            case "Precio de la habitación por noche":
                esValido = /^(?!0(\.0+)?$)(\d+(\.\d+)?|\.\d+)$/.test(valor);
                break;

            case "Escriba la descripción de la habitación":
                esValido = valor.trim() !== "";
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

            switch (input.placeholder) {
                case "Escriba el número de habitación":
                    esValido = /^[1-9]\d*$/.test(valor);
                    break;

                case "Escriba la capacidad de la habitación":
                    esValido = /^[1-9]\d*$/.test(valor);
                    break;

                case "Precio de la habitación por noche":
                    esValido = /^(?!0(\.0+)?$)(\d+(\.\d+)?|\.\d+)$/.test(valor);
                    break;

                case "Escriba la descripción de la habitación":
                    esValido = valor.trim() !== "";
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
