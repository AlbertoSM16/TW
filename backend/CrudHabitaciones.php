<?php 

function mostrarInfoHabitacion($id){
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM habitaciones WHERE id_habitacion = :id;';

    $stmt = $conn->prepare($query_select);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    $hab = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    $fotos = obtenerFotos($hab[0]['id_habitacion']);

    $html='
    <h1 class="py-10 font-bold text-3xl">'. $hab[0]['nombre'].'</h1>
    <section class="flex flex-col lg:flex-row lg:justify-between pb-10 my-6 items-center">
    <section class=" w-4/6 lg:w-2/6 ">         
            <div id="slider" class="relative w-full overflow-hidden m-6">
                <div class="slider-items flex transition-transform duration-500">';

                foreach($fotos as $foto){
                    $html = $html . '
                    <div class="slide w-full flex-shrink-0">
                        <img src="'.$foto['foto'] .'" class="w-full h-full object-cover">
                    </div>';
                }

                $html = $html . '</div>                     
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </section>
            
        <section class="break-all lg:w-3/6  p-10 items-center ">
            <p class="text-xl"><span class="font-bold text-2xl">Precio: </span>'.$hab[0]['precio'].'€</p>
            <p class="text-xl pt-2"><span class="font-bold text-2xl">Capacidad: </span>'.$hab[0]['capacidad'].'</p>
            <p class="text-xl pt-2"><span class="font-bold text-2xl">Descripción: </span><br>'.$hab[0]['descripcion'].'</p>';
            
          
        $html = $html. '</section>';
        echo $html;

        
        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_logs);
        
        $stmt->bindParam(":query",$query_select);
        $stmt->execute();
         
    
}


function infoHabitacion($id){
    require 'conexionBD.php';
    
    $query = 'SELECT * FROM habitaciones WHERE id_habitacion =:id';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id',$id);

    $stmt->execute();
    
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_logs);
    
    $stmt->bindParam(":query",$query);
    $stmt->execute();

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

            $query_foto = "INSERT INTO fotos_habitaciones (id_habitacion, foto) VALUES (:id_habitacion, :ruta_foto)";
            $stmt_foto = $conn->prepare($query_foto);
            $stmt_foto->bindParam(':id_habitacion', $id_habitacion);
            $stmt_foto->bindParam(':ruta_foto', $ruta_foto);
            $stmt_foto->execute();

            
        }
        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_logs);
        
        $stmt->bindParam(":query",$query_habitacion);
        $stmt->execute();
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

    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_logs);
    $stmt->bindParam(":query",$query);
    $stmt->execute();

}

function mostrarHabitaciones(){
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM habitaciones;';

    $stmt = $conn->prepare($query_select);

    $stmt->execute();


    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultados as $hab){
        
        $fotos = obtenerFotos($hab['id_habitacion']);
        echo'<figure class="flex items-center bg-color-gris-crema rounded-xl flex-col  ">';
        echo '<img src="' . $fotos[0]['foto'] . '" alt="" class="p-3">';


        echo '<section class="flex justify-center w-full">';
        
        if(esRecepcionista()){
            echo'<a class="transition-transform duration-100 hover:scale-105 p-3" href="editarHabitacion.php?id_habitacion='.$hab["id_habitacion"] .'">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>';
        }
                
                echo'<figcaption class="p-3 color-azul-marino font-bold text-xl"><a href="habitacion.php?id='.$hab['id_habitacion'].'">'.$hab['nombre'].'</figcaption>';
                if(esRecepcionista()){
                    echo'<a class="transition-transform duration-100 hover:scale-105 p-3" href="habitaciones.php?eliminarHabitacion='. $hab["id_habitacion"] . '">
                    <i class="fa-solid fa-trash"></i>
                </a>';
                }
                
           echo'</section>';
        
        echo '</figure>';
    }
    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_logs);
    
    $stmt->bindParam(":query",$query_select);
    $stmt->execute();

}


function eliminarHabitacion($id){
    
    require 'conexionBD.php';

    $query = 'DELETE FROM habitaciones WHERE id_habitacion=:id AND estado = "LIBRE"';

    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "La habitación ha sido eliminada correctamente.";
    }


    $query_log = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_log);
    $stmt->bindParam(':query', $query);

    $stmt->execute();

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


function editarHabitacion($id){

    echo $id;
    require 'conexionBD.php';
    
    $query_update = 'UPDATE habitaciones SET nombre = :nombre, precio = :precio, capacidad = :capacidad, descripcion = :descripcion
                WHERE id_habitacion = :id;';
    $stmt = $conn->prepare($query_update);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':precio', $_POST['precio']);
    $stmt->bindParam(':capacidad', $_POST['capacidad']);
    $stmt->bindParam(':descripcion', $_POST['descripcion']);

    $stmt->execute();
    

    $query = 'INSERT INTO logs (accion) VALUES (:query);';

    $stament = $conn->prepare($query);
    $stament->bindParam(':query', $query_update);

    $stament->execute();

}

