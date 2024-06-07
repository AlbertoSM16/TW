<?php 
function emailEsvalido($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function contraseniaValida($pass){
    return strlen($pass) >= 3;
}

function contraseniasIguales($pass1, $pass2){
    return $pass1 == $pass2;
}

function esFechaMayor($fecha1, $fecha2) {
    $date1 = DateTime::createFromFormat('Y-m-d', $fecha1);
    $date2 = DateTime::createFromFormat('Y-m-d', $fecha2);

    return $date2 > $date1;

}

function esDNIValido($dni) {
    return preg_match("/^[0-9]{8}[A-Za-z]$/", $dni) === 1;
}

function esTarjetaCreditoValida($tarjeta) {
    if (strlen($tarjeta) === 16 && ctype_digit($tarjeta)) {
        return true;
    }
    return false;
}

function noEstaVacia($variable) {
    return isset($variable) && !empty($variable);
}

function numeroPositivo($dinero){
    return $dinero > 0;
}