<?php




function insertReserva($num_pax, $dia_entrada, $dia_salida, $comentario) {
    try {


        $query = "INSERT INTO reservas (id_cliente, id_habitacion, dia_entrada, dia_salida, num_pax, comentario, estado) 
                  VALUES (:id_cliente, :id_habitacion, :dia_entrada, :dia_salida, :num_pax, :comentario, 'PENDIENTE')";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id_cliente', $_SESSION['id']);
        $stmt->bindParam(':id_habitacion', $id_habitacion, PDO::PARAM_INT);
        $stmt->bindParam(':dia_entrada', $dia_entrada);
        $stmt->bindParam(':dia_salida', $dia_salida);
        $stmt->bindParam(':num_pax', $num_pax, PDO::PARAM_INT);
        $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            return "Reserva insertada correctamente.";
        } else {
            return "Error al insertar la reserva.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function 