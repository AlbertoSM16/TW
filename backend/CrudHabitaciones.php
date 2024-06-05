<?php 

function mostrarInfoHabitacion($id,$fotos){

    require 'conexionBD.php';

    $query_select = 'SELECT * FROM habitaciones WHERE "id_habitacion" = :id;';

    $stmt = $conn->prepare($query_select);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

        echo'<figure class="text-center bg-color-bronce-metalico rounded-sm">';
        
        foreach($fotos as $foto){
            echo '<img src="./img/granHotel/habitaciones/'.$foto["foto"].'" alt="" class="p-3">';
        }

        echo '<figcaption class="p-3 color-azul-marino font-bold text-xl">'.$hab["nombre"].'</figcaption>
        </figure>';
    
}


function infoHabitacion($id){

    
    $query = 'SELECT * FROM habitaciones WHERE id =:id';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id',$id);

    $stmt->execute();
    
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $resultado;
       
}

function insertar_habitacion($nombre, $precio, $capacidad, $descripcion, $estado, $num_fotos) {

    require 'conexionBD.php';
    try {
        $conn->beginTransaction();

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

        $id_habitacion = $conn->lastInsertId();

        for ($i = 0; $i < $num_fotos; $i++) {
            $foto_nombre = $_FILES['filesToUpload']['name'][$i];
            $foto_temporal = $_FILES['filesToUpload']['tmp_name'][$i];
            $ruta_foto = './img/granHotel/habitaciones/' . $foto_nombre;
            move_uploaded_file($foto_temporal, $ruta_foto);

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
    require 'conexionBD.php';
    $query = 'SELECT * FROM habitaciones WHERE capacidad=:pax;';
   
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':pax', $pax);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $hab){
        
        $fotos = obtenerFotos($hab['id_habitacion']);
        echo'<figure class="text-center bg-color-bronce-metalico rounded-sm">';
        echo '<img src="' . $fotos[0]['foto'] . '" alt="" class="p-3">';

        echo '<figcaption class="p-3 color-azul-marino font-bold text-xl"><a href="habitacion.php?id='.$hab['id_habitacion'].'">'.$hab['nombre'].'</figcaption>
        </figure>';
    }

}

function mostrarHabitaciones(){
    
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM habitaciones;';

    $stmt = $conn->prepare($query_select);

    $stmt->execute();


    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultados as $hab){
        
        $fotos = obtenerFotos($hab['id_habitacion']);
        echo'<figure class="text-center bg-color-bronce-metalico rounded-sm">';
        echo '<img src="' . $fotos[0]['foto'] . '" alt="" class="p-3">';

        echo '<figcaption class="p-3 color-azul-marino font-bold text-xl"><a href="habitacion.php?id='.$hab['id_habitacion'].'">'.$hab['nombre'].'</figcaption>
        </figure>';
    }
    
}


function eliminarHabitacion($id){
    
    require 'conexionBD.php';

    $query = 'DELETE FROM habitaciones WHERE id=:id AND estado = "LIBRE"';

    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "La habitación ha sido eliminada correctamente.";
    }

}

function obtenerFotos($id){

    require 'conexionBD.php';
    $query= 'SELECT * FROM fotos_habitaciones WHERE id_habitacion=:id;';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resultados;

}




