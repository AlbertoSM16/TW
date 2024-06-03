<?php

function insertReserva($num_pax, $dia_entrada, $dia_salida, $comentario) {
    require 'conexionBD.php';
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

function selectReservas(){

    require 'conexionBD.php';


        $query = "SELECT id_habitacion,num_pax,dia_entrada,dia_salida,estado FROM reservas;";

        $stmt= $conn->prepare($query);

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultados as $reserva){

            $query = 'SELECT nombre FROM habitaciones WHERE id=:id';

            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(':id',  $resultado['id'] );

            $stmt->execute();
    
            $nombre = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<section class="flex flex-col md:flex-row bg-color-gris-carbon p-6 color-gris-crema mt-10">
                <section = class="flex flex-col">
                    <p>N Habitacion: '.$nombre.'</p>
                    <p>Capacidad:'.$reserva['num_pax'].'</p>
                    <p>Fecha Inicio:'.$reserva['dia_entrada'].'</p>
                    <p>Fecha Fin:'.$reserva['dia_salida'].'</p>
                </section>';

                if($reserva['estado'] === 'CONFIRMADA'){
                    echo '<section class="text-black p-10">
                            <span class="border-2 border-black bg-red-500 inline p-3">CONFIRMADA</span>
                        </section>
                        </section>';
                }else{
                    echo '<section class="text-black p-10">
                    <span class="border-2 border-black bg-green-500 inline p-3">PENDIENTE</span>
                    </section>';
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

            $query = 'SELECT nombre FROM habitaciones WHERE id=:id';

            $stmt = $conn->prepare($query);
            
            $stmt->bindParam(':id', $resultado['id']);

            $stmt->execute();
    
            $nombre = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<section class="flex flex-col md:flex-row bg-color-gris-carbon p-6 color-gris-crema mt-10">
            <section = class="flex flex-col">
                <p>N Habitacion: '.$nombre.'</p>
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
                </section>';
            }
        }


    }
}