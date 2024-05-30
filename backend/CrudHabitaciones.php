<?php 

require 'conexionBD.php';


function mostrarHabitaciones(){
    $query_select = 'SELECT nombre,precio,capacidad,estado FROM habitaciones';


    $stmt = $pdo->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Precio</th><th>Capacidad</th><th>Estado</th></tr>";

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

}
