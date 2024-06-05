<?php


function mostrarUsuarios(){
    require 'conexionBD.php';

    $query_select = 'SELECT * FROM usuarios';
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='5'>";
    echo '<tr class="bg-custom-header text-custom-header">
                    <th class="py-2 px-10 border-b">NOMBRE</th>
                    <th class="py-2 px-10 border-b">APELLIDOS</th>
                    <th class="py-2 px-10 border-b">EMAIL</th>
                    <th class="py-2 px-10 border-b">DNI</th>
                    <th class="py-2 px-10 border-b">ROL</th>
                    <th class="py-2 px-10 border-b">Tarjeta</th>
            </tr>';

    foreach ($resultados as $fila) {
        echo "<tr>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['nombre']) . "</td>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['apellidos']) . "</td>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['email']) . "</td>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['dni']) . "</td>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['rol']) . "</td>";
            echo "<td class='py-2 px-10 border-b'>" . htmlspecialchars($fila['tarjeta_credito']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
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




