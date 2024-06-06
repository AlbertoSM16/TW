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
            
            if(esRecepcionista() || esAdministrador()){
            $html = $html . '<section class="pt-4">';
                if($hab[0]['estado'] == "OCUPADA"){
                    $html= $html.'<span class="font-bold text-2xl p-2 mt-2 bg-red-700">OCUPADO</span>';
                }
                else{
                    $html= $html.'<span class="font-bold text-2xl p-2 mt-2 bg-green-700">LIBRE</span>';
                }
            $html = $html . '</section>';
            }
        $html = $html. '</section>';
        echo $html;
    
}


function infoHabitacion($id){
    require 'conexionBD.php';
    
    $query = 'SELECT * FROM habitaciones WHERE id_habitacion =:id';
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
        echo'<figure class="flex items-center bg-color-gris-crema rounded-xl flex-col  ">';
        echo '<img src="' . $fotos[0]['foto'] . '" alt="" class="p-3">';


        echo '<section class="flex justify-center w-full">
                <a class="transition-transform duration-100 hover:scale-105 p-3" href="editarHabitacion.php?id_habitacion='.$hab["id_habitacion"] .'">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <figcaption class="p-3 color-azul-marino font-bold text-xl"><a href="habitacion.php?id='.$hab['id_habitacion'].'">'.$hab['nombre'].'</figcaption>
                <a class="transition-transform duration-100 hover:scale-105 p-3" href="habitaciones.php?eliminarHabitacion='. $hab["id_habitacion"] . '">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </section>';
        
        echo '</figure>';
    }
    
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




