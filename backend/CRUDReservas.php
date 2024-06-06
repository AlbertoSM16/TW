<?php

function insertReservaPrevia($num_pax, $dia_entrada, $dia_salida, $comentario) {
    require 'conexionBD.php';

    $habitacion = comprobarReserva($num_pax,$dia_entrada,$dia_salida);
    if($habitacion !== FALSE){
        try {

            $query = "INSERT INTO reservas (id_cliente, id_habitacion, dia_entrada, dia_salida, num_pax, comentario, estado) 
                      VALUES (:id_cliente, :id_habitacion, :dia_entrada, :dia_salida, :num_pax, :comentario, 'PENDIENTE')";
            
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(':id_cliente', $_SESSION['datosUsuario']['id_usuario']);
            $stmt->bindParam(':id_habitacion', $habitacion[0]['id_habitacion'] );
            $stmt->bindParam(':dia_entrada',$dia_entrada );
            $stmt->bindParam(':dia_salida',$dia_salida);
            $stmt->bindParam(':num_pax', $num_pax );
            $stmt->bindParam(':comentario', $comentario);
    
            $stmt->execute();
            
            $query_id = 'SELECT * FROM reservas 
            WHERE id_habitacion = :id_hab AND id_cliente = :id_cliente 
            AND dia_entrada = :dia_entrada AND dia_salida = :dia_salida 
            AND num_pax = :num_pax AND comentario = :comentario';

           $statement = $conn->prepare($query_id);

            $statement->bindParam(':id_cliente', $_SESSION['datosUsuario']['id_usuario']);
            $statement->bindParam(':id_hab', $habitacion[0]['id_habitacion'] );
            $statement->bindParam(':dia_entrada',$dia_entrada );
            $statement->bindParam(':dia_salida',$dia_salida);
            $statement->bindParam(':num_pax', $num_pax );
            $statement->bindParam(':comentario', $comentario);
    
            $statement->execute();

            $reserva = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $reserva;
            

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }else {
        echo 'No es posible reservar en esas fechas no hay habitaciones libres';
    }
    

}

function confirmarReserva($id){
    require 'conexionBD.php';

    var_dump($id);
    $query = "UPDATE reservas set estado ='CONFIRMADA' WHERE id_reserva = :id";
    $stmt = $conn->prepare($query);
    
    $stmt->bindParam(':id', $id);

    $stmt->execute();

}


function mostrarReservas(){

    require 'conexionBD.php';


        $query = "SELECT id_reserva,id_habitacion,num_pax,dia_entrada,dia_salida,estado FROM reservas;";

        $stmt= $conn->prepare($query);

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $reserva){

            $query_hab = 'SELECT nombre FROM habitaciones WHERE id_habitacion=:id';

            $statement = $conn->prepare($query_hab);
            
            $statement->bindParam(':id',  $reserva['id_habitacion'] );

            $statement->execute();
            

            $nombre = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo '<section class="flex flex-col bg-color-gris-carbon  color-gris-crema p-10">
                <div class="flex justify-between p-4 rounded-lg ">
                    <a class="transition-transform duration-100 hover:scale-105" href="modificarReserva.php?id_reserva='.$reserva["id_reserva"] .'">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a class="transition-transform duration-100 hover:scale-105 ml-4" href="reservas.php?id_reserva='.$reserva["id_reserva"].'">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                <section class="flex flex-col md:flex-row  mt-10">
                <section = class="flex flex-col">
                    <p>N Habitacion: '.$nombre[0]["nombre"].'</p>
                    <p>Capacidad:'.$reserva['num_pax'].'</p>
                    <p>Fecha Inicio:'.$reserva['dia_entrada'].'</p>
                    <p>Fecha Fin:'.$reserva['dia_salida'].'</p>
                </section>';

                if($reserva['estado'] === 'CONFIRMADA'){
                    echo '<section class="text-black p-10">
                            <span class="border-2 border-black bg-red-500 inline p-3">CONFIRMADA</span>
                        </section>
                        </section>
                        </section>';
                }else{
                    echo '<section class="text-black p-10">
                    <span class="border-2 border-black bg-green-500 inline p-3">PENDIENTE</span>
                    </section>
                    </section>
                    </section>';
                }
            
        }
    }
    function filtrarReservas($estado){
        
        require 'conexionBD.php';

        $query = 'SELECT * FROM reservas WHERE estado=:estado';

    
        $stmt= $conn->prepare($query);

        $stmt->bindParam(':estado', $estado);

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultados as $reserva){

            $query = 'SELECT nombre FROM habitaciones WHERE id_habitacion=:id';

            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(':id', $reserva['id_habitacion']);

            $stmt->execute();
    
            $nombre = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<section class="flex flex-col md:flex-row bg-color-gris-carbon p-6 color-gris-crema mt-10">
            <section = class="flex flex-col">
                <p>N Habitacion: '.$nombre[0]['nombre'].'</p>
                <p>Capacidad:'.$reserva['num_pax'].'</p>
                <p>Fecha Inicio:'.$reserva['dia_entrada'].'</p>
                <p>Fecha Fin:'.$reserva['dia_salida'].'</p>
            </section>';

            if($estado === 'CONFIRMADA'){
                echo '<section class="text-black p-10">
                        <span class="border-2 border-black bg-red-500 inline p-3">CONFIRMADA</span>
                    </section>
                    </section>';
            }else{
                echo '<section class="text-black p-10">
                <span class="border-2 border-black bg-green-500 inline p-3">PENDIENTE</span>
                </section>
                </section>';
            }
        }


    }


    function eliminarReserva($id){

        require 'conexionBD.php';

        $query = 'DELETE  FROM reservas WHERE id_reserva=:id';

        $stmt= $conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();


    }

    function modificarReserva($id){

        require 'conexionBD.php';

        $habitacion = comprobarReserva($_POST['num_pax'],$_POST['dia_entrada'],$_POST['dia_salida']);
        if($habitacion !== FALSE){
            try {
    
                $query = "UPDATE reservas 
                SET id_cliente =?, id_habitacion =?, dia_entrada = ?, dia_salida = ? num_pax =?, comentario =? 
                WHERE id_reserva = ?";
                    
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1, $_POST['id_cliente']);
                $stmt->bindParam(2, $habitacion[0]['id_habitacion']);
                $stmt->bindParam(3, $_POST['dia_entrada']);
                $stmt->bindParam(4, $_POST['dia_salida']);
                $stmt->bindParam(5, $_POST['num_pax']);
                $stmt->bindParam(6, $_POST['comentario']);
                $stmt->bindParam(7, $id_reserva);
                $stmt->execute();
            }
            catch (PDOException $e) {
                echo "Error al actualizar la reserva: " . $e->getMessage();
            }
        }
    }

    function comprobarReserva($pax,$fecha_entrada,$fecha_salida){
        
        require 'conexionBD.php';

        $query = "
            SELECT h.id_habitacion
            FROM habitaciones h
            WHERE h.estado = 'LIBRE'
            AND h.capacidad >= :pax
            AND NOT EXISTS (
                SELECT * FROM reservas r
                WHERE r.id_habitacion = h.id_habitacion
                AND (
                    (r.dia_entrada <= :fecha_entrada AND r.dia_salida >= :fecha_entrada)
                    OR (r.dia_entrada <= :fecha_salida AND r.dia_salida >= :fecha_salida)
                    OR (r.dia_entrada >= :fecha_entrada AND r.dia_salida <= :fecha_salida)
                )
            ) LIMIT 1
        ;";

        $stmt= $conn->prepare($query);

        $stmt->bindParam(':pax', $pax);
        $stmt->bindParam(':fecha_entrada', $fecha_entrada);
        $stmt->bindParam(':fecha_salida', $fecha_salida);

        $stmt->execute();

        if($stmt->rowCount()>0){
            return $habitacion = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        return false;

    
    }

    function infoReserva($id){
        require 'conexionBD.php';

        $query = 'SELECT * FROM reservas WHERE id_reserva=:id';

        $stmt= $conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $reserva = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    function mostrarReservasUsuario($id_usuario){
    

    require 'conexionBD.php';


        $query = "SELECT id_habitacion,num_pax,dia_entrada,dia_salida,estado FROM reservas WHERE id_cliente=:id;";

        $stmt= $conn->prepare($query);
        $stmt->bindParam(':id', $id_usuario);

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $reserva){

            $query_hab = 'SELECT nombre FROM habitaciones WHERE id_habitacion=:id';

            $statement = $conn->prepare($query_hab);
            
            $statement->bindParam(':id',  $reserva['id_habitacion'] );

            $statement->execute();
    
            $nombre = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo '<section class="flex flex-col md:flex-row bg-color-gris-carbon p-6 color-gris-crema mt-10">
                <section = class="flex flex-col">
                    <div class="flex justify-between">
                        <a class="transition-transform duration-100 hover:scale-105" href="modificarReserva.php?id_reserva='.$reserva["id_reserva"].'><i class="fa-regular fa-pen-to-square"></i></a>
                    </div>
                    <p>N Habitacion: '.$nombre[0]["nombre"].'</p>
                    <p>Capacidad: '.$reserva['num_pax'].'</p>
                    <p>Fecha Inicio: '.$reserva['dia_entrada'].'</p>
                    <p>Fecha Fin: '.$reserva['dia_salida'].'</p>
                </section>';

                if($reserva['estado'] === 'CONFIRMADA'){
                    echo '<section class="text-black p-10">
                            <span class="border-2 border-black bg-red-500 inline p-3">CONFIRMADA</span>
                        </section>
                        </section>';
                }else{
                    echo '<section class="text-black p-10">
                    <span class="border-2 border-black bg-green-500 inline p-3">PENDIENTE</span>
                    </section>
                    </section>';
                }
            
        }
    }
    
