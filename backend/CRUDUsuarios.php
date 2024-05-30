<?php

require 'conexionBD.php'

$query_select = 'SELECT * FROM usuarios WHERE rol = "clientes";';

$query_delete = 'DELETE FROM usuarios WHERE id_usuario=:id_usuario AND rol = "clientes';

$query_update = 'UPDATE usuarios 
SET nombre = :nombre, 
    apellidos = :apellidos, 
    dni = :dni, 
    email = :email, 
    tarjeta_credito = :tarjeta_credito 
WHERE id_usuario = :id_usuario;
';