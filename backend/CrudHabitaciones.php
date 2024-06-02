<?php 

function mostrarInfoHabitacion($id,$fotos){

    require 'conexionBD.php';

    $query_select = 'SELECT * FROM habitaciones WHERE "id" = '.$id.';';

    $stmt = $conn->prepare($query_select);

    $stmt->execute();

        echo'<figure class="text-center bg-color-bronce-metalico rounded-sm">';
        
        foreach($fotos as $foto){
            echo '<img src="./img/granHotel/habitaciones/'.$foto.'" alt="" class="p-3">';
        }

        echo '<figcaption class="p-3 color-azul-marino font-bold text-xl">'.$hab[$nombre].'</figcaption>
        </figure>';
    
}

function insertar_habitacion($nombre, $precio, $capacidad, $descripcion, $estado, $fotos) {
    require 'conexionBD.php';
    try {
        // Comenzar una transacción
        $conn->beginTransaction();

        // Insertar la habitación
        $query_habitacion = "INSERT INTO habitaciones (nombre, precio, capacidad, descripcion, estado, fotos) 
                            VALUES (:nombre, :precio, :capacidad, :descripcion, :estado, :num_fotos)";
        $stmt_habitacion = $conn->prepare($query_habitacion);
        $stmt_habitacion->bindParam(':nombre', $nombre);
        $stmt_habitacion->bindParam(':precio', $precio);
        $stmt_habitacion->bindParam(':capacidad', $capacidad);
        $stmt_habitacion->bindParam(':descripcion', $descripcion);
        $stmt_habitacion->bindParam(':estado', $estado);
        $stmt_habitacion->bindParam(':num_fotos', $num_fotos);
        $stmt_habitacion->execute();

        // Obtener el ID de la habitación recién insertada
        $id_habitacion = $conn->lastInsertId();

        // Insertar cada foto en la tabla fotos_habitaciones
        for ($i = 0; $i < $num_fotos; $i++) {
            $foto_nombre = $_FILES['fotos']['name'][$i];
            $foto_temporal = $_FILES['fotos']['tmp_name'][$i];

            // Mover la foto al directorio deseado
            $ruta_foto = 'directorio_destino/' . $foto_nombre;
            move_uploaded_file($foto_temporal, $ruta_foto);

            // Insertar la foto en la base de datos
            $query_foto = "INSERT INTO fotos_habitaciones (id_habitacion, foto) VALUES (:id_habitacion, :ruta_foto)";
            $stmt_foto = $conn->prepare($query_foto);
            $stmt_foto->bindParam(':id_habitacion', $id_habitacion);
            $stmt_foto->bindParam(':ruta_foto', $ruta_foto);
            $stmt_foto->execute();
        }

        // Confirmar la transacción
        $conn->commit();

    } catch (PDOException $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        echo "Error al insertar la habitación: " . $e->getMessage();
    }

    
}

function filtrarHabitaciones($pax){

    $query = 'SELECT * FROM habitaciones where "capacidad"='.$pax.';';
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultados;

}

function obtenerFotos($id){

    $query= 'SELECT "url" FROM fotos_habitaciones WHERE "id_habitacion"='.$id.';'
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultados;

}




