<?php
require_once 'validaciones.php';
if(!noEstaVacia($_POST['nombre'])){
    $msj_error = "El nombre no puede estar vacio";
} elseif($_POST['capacidad'] >= 5){
    $msj_error = "La capacidad no puede ser mayor que cuatro";
} elseif(!numeroPositivo($_POST['precio'])){
    $msj_error = "El dinero no puede ser negativo o 0, que hay que comer";
}