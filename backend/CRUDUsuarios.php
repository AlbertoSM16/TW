<?php


function mostrarUsuarios(){
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM usuarios';
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultados as $fila) {
        echo "<section class='flex flex-col p-6 bg-color-azul-marino border-solid border-4 border-cobre color-bronce-metalico text-xl lg:text-lg'>
        <div class='w-full flex justify-between'>
            <a class='transition-transform duration-100 hover:scale-105' href='modificarACliente.php?id_usuario_recepcionista=".$fila['id_usuario']."'><i class='fa-regular fa-pen-to-square'></i></a>
            <h3 class='text-center color-bronce-metalico font-bold text-3xl border-b-2 border-cobre pb-2'>". $fila['nombre'] ."</h3>
            <a class='transition-transform duration-100 hover:scale-105' href='usuarios.php?elimiar_id_usuario=".$fila['id_usuario']."'><i class='fa-solid fa-trash'></i></a>
        </div>
        <section class='grid grid-cols-1'>
            <section class='flex justify-start items-center h-full'>
                <ul class='pt-6'>
                    <li class='break-all overflow-hidden'><span class='font-bold'>Apellidos: </span>". $fila["apellidos"] ."</li>
                    <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>DNI: </span>". $fila["dni"] ."</li>
                </ul>
            </section>

            <section  class='flex justify-start items-center h-full'>
            <ul class='pt-6'>
                <li class='break-all overflow-hidden'><span class='font-bold'>Email: </span>". $fila["email"] ."</li>
                <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>Tarjeta de credito: </span>". $fila["tarjeta_credito"] ."</li>
                <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>Rol: </span>". $fila["rol"] ."</li>
            </ul>
            </section>

        </section>
    </section>";
    }

    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_log);
    
    $stament->bindParam(":query",$query_select);
    $stmt->execute();
}

function mostrarClientes(){
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM usuarios WHERE rol ="cliente"';
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultados as $fila) {
        echo "<section class='flex flex-col p-6 bg-color-azul-marino border-solid border-4 border-cobre color-bronce-metalico text-xl lg:text-lg'>
        <div class='w-full flex justify-between'>
            <a class='transition-transform duration-100 hover:scale-105' href='modificarACliente.php?id_usuario_recepcionista=".$fila['id_usuario']."'><i class='fa-regular fa-pen-to-square'></i></a>
            <h3 class='text-center color-bronce-metalico font-bold text-3xl border-b-2 border-cobre pb-2'>". $fila['nombre'] ."</h3>
            <a class='transition-transform duration-100 hover:scale-105' href='usuarios.php?elimiar_id_usuario=".$fila['id_usuario']."'><i class='fa-solid fa-trash'></i></a>
        </div>
        <section class='grid grid-cols-1'>
            <section class='flex justify-start items-center h-full'>
                <ul class='pt-6'>
                    <li class='break-all overflow-hidden'><span class='font-bold'>Apellidos: </span>". $fila["apellidos"] ."</li>
                    <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>DNI: </span>". $fila["dni"] ."</li>
                </ul>
            </section>

            <section  class='flex justify-start items-center h-full'>
            <ul class='pt-6'>
                <li class='break-all overflow-hidden'><span class='font-bold'>Email: </span>". $fila["email"] ."</li>
                <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>Tarjeta de credito: </span>". $fila["tarjeta_credito"] ."</li>
                <li class='pt-6 break-all overflow-hidden'><span class='font-bold'>Rol: </span>". $fila["rol"] ."</li>
            </ul>
            </section>

        </section>
    </section>";

    }
    $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

    $stmt = $conn->prepare($query_logs);
    
    $stmt->bindParam(":query",$query_select);
    $stmt->execute();

}


function deleteClient($id){
    
    require 'conexionBD.php';

    $query_delete = 'DELETE FROM usuarios WHERE id_usuario =:id AND rol = "cliente" ';
    try{

        $stmt = $conn->prepare($query_delete);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_log);
        
        $stament->bindParam(":query",$query_delete);
        $stmt->execute();
        
    }catch (Exception $e){
        echo "Error: " . $e->getMessage();

    }
}
   
    
function registrarUsuario(){
    require 'conexionBD.php';


    $query_insert = 'INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena, tarjeta_credito) 
                     VALUES (:nombre, :apellidos, :dni, :email, :contrasena, :tarjeta_credito);';

    try {
        $stmt = $conn->prepare($query_insert);

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
        $tarjeta_credito = $_POST['tarjeta_credito'];

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':tarjeta_credito', $tarjeta_credito);

        $stmt->execute();

        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt_log = $conn->prepare($query_logs);
        
        $accion = 'Usuario registrado: ' . json_encode(['nombre' => $nombre, 'apellidos' => $apellidos, 'dni' => $dni, 'email' => $email]);
        $stmt_log->bindParam(":query", $accion);
        $stmt_log->execute();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


    
    function infoUsuario($id){
        require 'conexionBD.php';

        $query = 'SELECT * FROM usuarios WHERE id_usuario =:id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id',$id);

        $stmt->execute();

        $resultado  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_log);
        
        $stament->bindParam(":query",$query);
        $stmt->execute();

        return $resultado;
           
    }



    function updateCliente($id_cliente){
        require 'conexionBD.php';

        $query_update = 'UPDATE usuarios SET email = :email, tarjeta_credito = :tarjeta_credito,contrasena=:contrasena
        WHERE id_usuario = :id_usuario;';

        try {
            $stament = $conn->prepare($query_update);
            $stament->bindParam(':email',$_POST['email']);
            $stament->bindParam(':contrasena',$_POST['contrasena']);
            $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);
            $stament->bindParam(':id_usuario',$id_cliente);

            $stament->execute();

        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_log);
        
        $stament->bindParam(":query",$query_update);
        $stmt->execute();

        $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

        $stmt = $conn->prepare($query_log);
        
        $stament->bindParam(":query",$query_update);
        $stmt->execute();

        }catch (Exception $e){
            echo "Error: " .$e->getMessage();
        }

    }
    
    function modificarUsuario($id_usuario){

        require 'conexionBD.php';

        
        
        try {

            if(esRecepcionista()){
                $query_update = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, dni = :dni, email = :email, tarjeta_credito = :tarjeta_credito
                WHERE id_usuario = :id_usuario;';
                $stament = $conn->prepare($query_update);
                $stament->bindParam(':nombre',$_POST['nombre']);
                $stament->bindParam(':apellidos',$_POST['apellidos']);
                $stament->bindParam(':email',$_POST['email']);
                $stament->bindParam(':dni',$_POST['dni']);
                $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);
                $stament->bindParam(':id_usuario',$id_usuario);
                $stament->execute();
            }else if(esCliente()){
                $query_update = 'UPDATE usuarios SETcontrasena=:contrasena, email = :email, tarjeta_credito = :tarjeta_credito
                WHERE id_usuario = :id_usuario;';
                $stament = $conn->prepare($query_update);
                $stament->bindParam(':email',$_POST['email']);
                $stament->bindParam(':dni',$_POST['dni']);
                $stament->bindParam(':id_usuario',$id_usuario);
                $stament->execute();
            }else{
                $query_update = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, dni = :dni, email = :email, tarjeta_credito = :tarjeta_credito,rol:=rol
                WHERE id_usuario = :id_usuario;';
                
                $stament = $conn->prepare($query_update);
                $stament->bindParam(':nombre',$_POST['nombre']);
                $stament->bindParam(':apellidos',$_POST['apellidos']);
                $stament->bindParam(':email',$_POST['email']);
                $stament->bindParam(':dni',$_POST['dni']);
                $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);
                $stament->bindParam(':rol',$_POST['rol']);
                $stament->bindParam(':id_usuario',$id_usuario);
                $stament->execute();
            }
          
            $query_logs = 'INSERT INTO logs (accion) VALUES (:query);';

            $stmt = $conn->prepare($query_log);
            
            $stament->bindParam(":query",$query_update);
            $stmt->execute();

        }catch (Exception $e){
            echo "Error: " .$e->getMessage();
        }

    }




