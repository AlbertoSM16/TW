<?php

require 'conexionBD.php';

 $query_usuarios = 'CREATE TABLE IF NOT EXISTS usuarios (
   id_usuario INT AUTO_INCREMENT PRIMARY KEY,
   nombre VARCHAR(255) NOT NULL ¡,
   apellidos VARCHAR(255) NOT NULL,
   dni CHAR(9) NOT NULL,
   email VARCHAR(255) NOT NULL,
   contrasena VARCHAR(255) NOT NULL CHECK (LENGTH(contrasena) >= 5),
   tarjeta_credito CHAR(16) NOT NULL,
   rol ENUM("anónimo", "cliente", "recepcionista", "administrador") NOT NULL DEFAULT "cliente",
   UNIQUE (dni),
   UNIQUE (email));';


$query_reservas = 'CREATE TABLE IF NOT EXISTS reservas (
   id_reserva INT AUTO_INCREMENT PRIMARY KEY,
   id_cliente INT NOT NULL,
   id_habitacion INT NOT NULL,
   dia_entrada date NOT NULL,
   dia_salida date NOT NULL,
   num_pax INT NOT NULL,
   comentario TEXT,
   estado ENUM("PENDIENTE","CONFIRMADA"),
   FOREIGN KEY (id_cliente) REFERENCES usuarios(id_usuario),
   FOREIGN KEY (id_habitacion) REFERENCES habitaciones(id_habitacion)
   );';

$query_habitaciones = 'CREATE TABLE IF NOT EXISTS habitaciones (
   id_habitacion INT AUTO_INCREMENT PRIMARY KEY,
   nombre VARCHAR(255) NOT NULL,
   precio INT NOT NULL, 
   capacidad INT NOT NULL,
   descripcion text,
   estado ENUM ("OCUPADA","LIBRE"),
   fotos INT NOT NULL
   );';