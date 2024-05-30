<?php

function login(){

    include "conexion_BD.php";
    include "crear_tablas.php";
    
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];

        $consultar_sql="SELECT * FROM usuarios WHERE email=:email AND contrasenia=:contrasena";

        $stament=$conn->prepare($consultar_sql);
        $stament->bindParam(":email",$email);
        $stament->bindParam(":contrasena", $pass);

        $stament->execute();

    if($stament->rowCount()==1){
            $usuario_log=$stament->fetch(PDO::FETCH_ASSOC);

            $_SESSION['datosUsuario']=$usuario_log;    
            
            $existe= true;
            header('Location: index.php');

            return $existe;
            

        }else {
            $existe=false;
            return $existe;
        }
    }
}

function esRecepcionista(){

    if($_SESSION['datosUsuario']['rol']=="recepcionista"){
        return true;
    }
       return false;
    
}


function registrarse(){

    try{
 
        include "conexion_BD.php";
        include "creacionTablas.php";

        $orden_sql="INSERT INTO usuarios (nombre,apellidos,email,
        dni,contrasena,tarjeta_credito) VALUES (:nombre, :apellidos, :email,
        :contrasena,:tarjeta_credito)";

        $stament= $conn->prepare($orden_sql);
        $stament->bindParam(':nombre',$_POST['nombre']);
        $stament->bindParam(':apellidos',$_POST['apellidos']);
        $stament->bindParam(':email',$_POST['email']);
        $stament->bindParam(':dni',$_POST['dni']);
        $stament->bindParam(':tarjeta_credito',$_POST['tarjeta_credito']);
        $stament->bindParam(':contrasena',$_POST['contrasena']);


        echo '<script>alert("Registro completado con éxito");</script>';
        $stament->execute(); 


    }catch(PDOException $e){

        echo "ERROR" .$e->getMessage();
    
     }

}

function cerrarSesion(){
        
    session_destroy();
    
}