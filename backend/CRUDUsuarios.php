<?php

require 'conexionBD.php';

function selectUsuarios(){

    $query_select = 'SELECT nombre, apellidos, email, dni FROM usuarios WHERE rol = "cliente"';
    
    $stmt = $pdo->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>DNI</th></tr>";

    foreach ($resultados as $fila) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['apellidos']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['dni']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}


function deleteClient(){

}

$query_delete = 'DELETE FROM usuarios WHERE id_usuario = :id AND rol = "cliente" ';

$query_update = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, dni = :dni, email = :email, tarjeta_credito = :tarjeta_credito
 WHERE id_usuario = :id_usuario;';

$query_update = 'INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena, tarjeta_credito) 
VALUES (:nombre, :apellidos, :dni, :email, :contrasena, :tarjeta_credito);';

