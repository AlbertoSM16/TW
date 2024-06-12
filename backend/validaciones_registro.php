<?php
require_once 'validaciones.php';

if(!noEstaVacia($_POST['nombre'])){
    $msj_error = "El nombre no puede estar vacio";
} else if(!noEstaVacia($_POST['apellidos'])){
    $msj_error = "Los apellidos no pueden estar vacios";
} else if(!noEstaVacia($_POST['contrasena'])){
    $msj_error = "La contraseña no puede estar vacía";
}else if(!noEstaVacia($_POST['confirmar_contrasena'])){
    $msj_error = "La comprobación de la segunda contraseña no puede estar vacía";
}else if(!noEstaVacia($_POST['email'])){
    $msj_error = "El email no puede estar vacío";
} else if(!noEstaVacia($_POST['dni'])){
    $msj_error = "El dni no puede estar vacío";
} else if(!noEstaVacia($_POST['tarjeta_credito'])){
    $msj_error = "La tarjeta de credito no puede estar vacia";
} else  if(!emailEsvalido($_POST['email'])){
    $msj_error = "El formato del email no es correcto";
} else if(!contraseniaValida($_POST['contrasena'])){
    $msj_error = "El formato de la contraseña no es correcta";
}else if(!contraseniasIguales($_POST['contrasena'],$_POST['confirmar_contrasena'])){
    $msj_error = "Las contraseñas no son iguales";
} else if(!esDNIValido($_POST['dni'])){
    $msj_error = "El DNI no es válido, formato incorrecto";
} else if(!esTarjetaCreditoValida($_POST['tarjeta_credito'])){
    $msj_error = "La tarjeta no es valida";
}