<?php 

function mostrarHabitaciones(){
    require 'conexionBD.php';

    $query_select = 'SELECT nombre,precio,capacidad,estado FROM habitaciones';

    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-32">';

    foreach($resultados as $hab){
         echo'<section class="flex flex-col md:flex-row bg-color-gris-carbon p-6 color-gris-crema mt-10"> 
                <section = class="flex flex-col">
                    <p>Nombre:'.$hab["nombre"].' 101</p>
                    <p>Capacidad:'.$hab["capacidad"].'</p>
                    <p>Precio:'.$hab["precio"].'</p>
                </section>

        <section class="text-black p-10">';
        if($hab["estado"]==="OCUPADA"){
          echo ' <span class="border-2 border-black bg-red-500 inline p-3">Ocupada</span>';
        }else{
            echo '<span class="border-2 border-black bg-green-500 inline p-3">Libre</span>';
        }
        echo'</section>
        </section>';
    }
    echo '</section>';


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

    function filtrarHabitaciones($filtro){

        $query = 'SELECT * FROM habitaciones where "capacidad"='.$filtro.';';
        
        $stmt = $conn->prepare($query_select);

        $stmt->execute();
    
    }
}



