<?php
require 'credenciales.php';


try {
    // CONEXION A LA BD CON PDO
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

