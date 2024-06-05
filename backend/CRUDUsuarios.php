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
            <a class='transition-transform duration-100 hover:scale-105' href='modificarUsuario.php?id_usuario_recepcionista=".$fila['id_usuario']."'><i class='fa-regular fa-pen-to-square'></i></a>
            <h3 class='text-center color-bronce-metalico font-bold text-3xl border-b-2 border-cobre pb-2'>". $fila['nombre'] ."</h3>
            <a class='transition-transform duration-100 hover:scale-105' href='modificarUsuario.php?id_usuario_recepcionista=".$fila['id_usuario']."'><i class='fa-solid fa-trash'></i></a>
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


}


function deleteClient($id){
    
    require 'conexionBD.php';

    $query_delete = 'DELETE FROM usuarios WHERE id_usuario =:id AND rol = "cliente" ';
    try{

        $stmt = $conn->prepare($query_select);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        
    }catch (Exception $e){
        echo "Error: " . $e->getMessage();

    }
}
   
    
    function registrarUsuario(){

        require 'conexionBD.php';

        $query_insert= 'INSERT INTO usuarios (nombre, apellidos, dni, email, contrasena, tarjeta_credito) 
        VALUES (:nombre, :apellidos, :dni, :email, :contrasena, :tarjeta_credito);';
          

        try {
            $stament = $conn->prepare($query_insert);
            $stament->bindParam(':nombre',$_POST['nombre']);
            $stament->bindParam(':apellidos',$_POST['apellidos']);
            $stament->bindParam(':email',$_POST['email']);
            $stament->bindParam(':dni',$_POST['dni']);
            $stament->bindParam(':contrasena',$_POST['contrasena']);
            $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);

            $stament->execute();
        }catch (Exception $e){
            echo "Error: " .$e->getMessage();
        }
        
    }


    function filtrarUsuarios($rol){

        require 'conexionBD.php';

        $query = 'SELECT * FROM usuarios WHERE rol =:rol';
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':rol',$rol);


        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        echo "<table border='1'>";
    echo '<tr class="bg-custom-header text-custom-header">
                    <th class="py-2 px-4 border-b">NOMBRE</th>
                    <th class="py-2 px-4 border-b">APELLIDOS</th>
                    <th class="py-2 px-4 border-b">EMAIL</th>
                    <th class="py-2 px-4 border-b">DNI</th>
                    <th class="py-2 px-4 border-b">ROL</th>
                    <th class="py-2 px-4 border-b">Tarjeta</th>

                </tr>';

    foreach ($resultados as $fila) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['apellidos']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['dni']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['rol']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['tarjeta_credito']) . "</td>";


        echo "</tr>";
    }

    echo "</table>";

    }



    function infoUsario($id){

        $query = 'SELECT * FROM usuarios WHERE id =:id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id',$id);

        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado;
           
    }



    function updateCliente(){
        $query_update = 'UPDATE usuarios SET email = :email, tarjeta_credito = :tarjeta_credito,contrasena=:contrasena
        WHERE id_usuario = :id_usuario;';

        try {
            $stament = $conn->prepare($query_insert);
            $stament->bindParam(':email',$_POST['email']);
            $stament->bindParam(':contrasena',$_POST['contrasena']);
            $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);

            $stament->execute();
        }catch (Exception $e){
            echo "Error: " .$e->getMessage();
        }

    }
    
    function modificarUsuario(){
        $query_update = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, dni = :dni,contrasena=:contrasena, email = :email, tarjeta_credito = :tarjeta_credito
        WHERE id_usuario = :id_usuario;';


        try {
            $stament = $conn->prepare($query_insert);
            $stament->bindParam(':nombre',$_POST['nombre']);
            $stament->bindParam(':apellidos',$_POST['apellidos']);
            $stament->bindParam(':email',$_POST['email']);
            $stament->bindParam(':dni',$_POST['dni']);
            $stament->bindParam(':contrasena',$_POST['contrasena']);
            $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);

            $stament->execute();
        }catch (Exception $e){
            echo "Error: " .$e->getMessage();
        }

    }




