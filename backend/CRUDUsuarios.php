<?php

require 'conexionBD.php';

function selectUsuarios(){

    $query_select = 'SELECT nombre, apellidos, email, dni FROM usuarios WHERE rol = "cliente"';
    
    $stmt = $conn->prepare($query_select);

    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>DNI</th></tr>";

    foreach ($resultados as $fila) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['apellidos']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['dni']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}


function deleteClient($id){
    

    $query_delete = 'DELETE FROM usuarios WHERE id_usuario = '.$id.' AND rol = "cliente" ';
    try{
        $stmt = $conn->prepare($query_select);

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

$query_delete = 'DELETE FROM usuarios WHERE id_usuario = :id AND rol = "cliente" ';

$query_update = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, dni = :dni, email = :email, tarjeta_credito = :tarjeta_credito
 WHERE id_usuario = :id_usuario;';


